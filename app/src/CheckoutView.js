import React, {useState} from "react";
import './checkout.css'
import {
    Avatar, Button, Dialog, DialogActions, DialogContent,
    DialogTitle, InputLabel, ListItem, Select, TextField
} from "@material-ui/core";
import {FormControl, FormControlLabel, Radio, RadioGroup, Snackbar} from "@mui/material";

const tables = [
    {id: 0, name: 'None'},
    {id: 1, name: 'Tavolina 1'},
    {id: 2, name: 'Tavolina 2'},
    {id: 3, name: 'Tavolina 3'},
    {id: 4, name: 'Tavolina 4'},
    {id: 5, name: 'Tavolina 5'}
]
const payments = [
    {id: "MD", name: "Paguaj me para në dorë"}, {id: "PB", name: "Paguaj permes bankes"}
]

const Tables = props => {
    const {table, payment, handleChangeTable, handleChangePayment, busyTables} = props

    return (
        <FormControl sx={{minWidth: 300}}>
            <InputLabel id="tavolina-label">Zgjedhni tavolinen qe jeni ulur</InputLabel>
            <Select
                labelId="tavolina-label"
                //id="demo-simple-select"
                value={table}
                onChange={handleChangeTable}
                label="Zgjedhni tavolinen qe jeni ulur"
            >
                {tables.map(table => {
                    console.log("busyTables ", busyTables, "tableId", table.id.toString())
                    if (table.id === 0) {
                        return <ListItem key={table.id} value={table.id} disabled
                                         name={table.name}><em>{table.name}</em></ListItem>
                    }
                    return <ListItem
                        key={table.id}
                        value={table.id}
                        disabled={busyTables.includes(table.id)}
                        name={table.name}>{table.name} </ListItem>
                })}
            </Select>
            <RadioGroup
                aria-labelledby="demo-controlled-radio-buttons-group"
                name="Menyra e pageses"
                value={payment}
                row
                onChange={handleChangePayment}
                style={{marginTop: 50}}
            >
                {payments.map((payment, i) => {
                    return <FormControlLabel value={payment.id} control={<Radio/>} label={payment.name}/>
                })}


            </RadioGroup>
        </FormControl>
    );
}
const ProductRow = props => {
    const {product} = props
    return (
        <div className={'product-row'}>
            <div className={'product-row-name'}>{product.title}</div>
            <div className={'product-row-price'}>{(product.price * product.count).toFixed(2)}</div>
        </div>
    )
}

const CheckoutView = props => {
    const {items, total, clearCart, closeDialog, setSnackbarMessage} = props
    const [table, setTable] = useState(0);
    const [payment, setPayment] = useState('MD')
    const [cartItems, setCartItems] = React.useState([])
    const url = 'http://localhost/dashboard-administrator/getcartapi.php'
    React.useEffect(() => {
        fetch(url)
            .then(res => res.json())
            .then(
                (result) => {
                    // setIsLoaded(true);
                    console.log("the items", result)
                    const data = result.map(next=> ({...next, price: Number(next.price)}))
                    setCartItems(data);
                },
                // Note: it's important to handle errors here
                // instead of a catch() block so that we don't swallow
                // exceptions from actual bugs in components.
                (error) => {
                    /*setIsLoaded(true);
                    setError(error);*/
                    console.log("error => ", error)
                }
            )
    }, [])
    const busyTables = cartItems.map(next => parseInt(next.tavolina))
    const handleChangeTable = event => {
        // console.log("theEvent", event.target)
        setTable(event.target.value);
    }
    const handleChangePayment = event => {
        // console.log("theEvent", event.target)
        setPayment(event.target.value);
    }
    const checkout = () => {
        if(items.length === 0) {

            setSnackbarMessage("Nuk mund te besh porosi pa bere porosi!")
            return;
        }
        if(busyTables.includes(table)){
            console.log("busyTables", busyTables, "the table", table)
            console.log("the table is busy......")
            setSnackbarMessage("Tavolina eshte e zene")
            return;
        }
        const products = items.map(next => next.title + " x" + next.count).join(", ")
        console.log("the cart", products, 'payment',payment, 'table', table, 'total', total)
        const data = new FormData()

        data.append("product", products)
        data.append("payment", payment)
        data.append("tavolina", table.toString())
        data.append("total", total)
        fetch('http://localhost/dashboard-administrator/postcart.php', { method: 'POST', body: data })
            .then(res => setSnackbarMessage("Porosia u krye me sukses! Së shpejti do vie porosia."), error => setSnackbarMessage("Porosia deshtoi"))


        clearCart()
        closeDialog() //TODO
    }
    return (
        <div className='checkout-root'>
            <div className={'checkout-top'}>
                {items.map(item => <ProductRow product={item}/>)}
            </div>
            <div className={'display'}>
                <Tables table={table} handleChangeTable={handleChangeTable} payment={payment} handleChangePayment={handleChangePayment} busyTables={busyTables}/>
            </div>
            <div className={'button-wrapper'}>
                <Button onClick={() => checkout()}>Beje porosine</Button>
            </div>

        </div>
    )
}
export default CheckoutView