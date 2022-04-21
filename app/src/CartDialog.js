import React, {useState} from 'react';
import ReactDOM from 'react-dom';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import DialogContent from '@material-ui/core/DialogContent';
import DialogTitle from '@material-ui/core/DialogTitle';
import CartTable from './CartTable';
import ClearIcon from '@mui/icons-material/Clear';
import CheckoutView from "./CheckoutView";
import './index.css';

const CartDialog = props => {
    const {open, onClose, cart, clearCart, setSnackbarMessage} = props
    const [tab, setTab] = useState('cartTable')


    const goToCheckout = () => {
        if(!cart.length && tab === 'cartTable') {
            return
        }
        tab === 'cartTable' ? setTab('checkout') : setTab('cartTable')
    }


        const total = cart.map(next => next.price* next.count).reduce((current, next) => current + next, 0).toFixed(2)
        return (

                <Dialog open={open} onClose={() => onClose()} disableEnforceFocus>
                    <DialogTitle><div className='market'><span>Shporta</span><Button onClick={() => onClose()}><ClearIcon/></Button></div></DialogTitle>
                    <DialogContent>
                        {tab === 'cartTable' ? <CartTable items={cart}/> : <CheckoutView items={cart} total={total} clearCart={clearCart} closeDialog={() => onClose()} setSnackbarMessage={setSnackbarMessage}/>}
                    </DialogContent>
                    <div className='cart-footer'>
                        <h4>Total: {total}</h4>
                        <Button onClick={() => goToCheckout()}>{tab === 'cartTable' ? 'Vazhdoni' : 'Kthehu mbrapa'}</Button>

                    </div>


                </Dialog>
        
        );
    
 }
 export default CartDialog;

