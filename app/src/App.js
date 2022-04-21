import React, {useState} from 'react';
import Menu from './Menu';
import Categories from './Categories';
import items from './data';
import logo from './logo.svg';
import Button from '@mui/material/Button';
import LocalMallIcon from '@mui/icons-material/LocalMall';

import CartDialog from './CartDialog';
import {Snackbar} from "@mui/material";

const allCategories = ['all', ...new Set(items.map((item) => item.category))];

function App() {
    const [menuItems, setMenuItems] = useState([]);
    const [categories, setCategories] = useState(allCategories);
    const [cart, addToCart] = useState([])
    const [isDialogOpen, setIsDialogOpen] = useState(false)
    const [snackbarMessage, setSnackbarMessage] = useState("")
    const url = 'http://localhost/dashboard-administrator/productsapi.php'
    React.useEffect(() => {
        fetch(url)
            .then(res => res.json())
            .then(
                (result) => {
                   // setIsLoaded(true);
                    console.log("the items", result)
                    const data = result.map(next=> ({...next, price: Number(next.price)}))
                    setMenuItems(data);
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
    const filterItems = (category) => {
        if (category === 'all') {
            setMenuItems(items);
            return;
        }
        const newItems = items.filter((item) => item.category === category);
        setMenuItems(newItems);
    };

    const addItemToCart = (item, operation) => {
        const found = cart.find(next => next.id === item.id)
        if(operation === "INCREASE"){
            const items = !!found ? cart.map((next) => next.id === found.id ? {...next, count: next.count + 1} : next)
                : [...cart, {...item, count: 1}]
            addToCart(items)
        }
        else {
            if (found) {
                const items = cart
                    .map((next) =>  next.id === found.id && next.count > 0 ? {...next, count: next.count - 1} : next)
                    .filter(next => next.count > 0)
                addToCart(items)
            }
        }





    }

    const onOpenCart = () =>{
        if(!cart.length){
            setSnackbarMessage("Nuk mund te hyni ne shporte pa pasur artikuj!");
        }
        else {
            setIsDialogOpen(true);
        }


    }


    return (
        <main>
            <section className="menu section">
                <div className="title">
                    <img src={logo}></img><h2>Menu</h2>
                    <div className="underline"></div>
                </div>
                <div className='market'>
                    <Categories categories={categories} filterItems={filterItems}/>
                    <Button  onClick={onOpenCart}><LocalMallIcon/><h3>{cart.reduce((acc, next) => acc + next.count, 0)}</h3></Button>
                </div>
                <Menu cart={cart} items={menuItems} addToCart={(item, operation) => addItemToCart(item, operation)}/>
            </section>
            <section>
                {/*{JSON.stringify(cart)}*/}
            </section>
            <CartDialog open={isDialogOpen} onClose={() => setIsDialogOpen(false)} cart={cart} clearCart={() => addToCart([])} setSnackbarMessage={setSnackbarMessage}/>
            <Snackbar
                open={!!snackbarMessage}
                autoHideDuration={3000}
                onClose={() => setSnackbarMessage('')}
                message={snackbarMessage}
                anchorOrigin={{ vertical: 'bottom', horizontal: 'center' }}
            />
        </main>
    );
}

export default App;
