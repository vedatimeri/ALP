import React from 'react';
import Button from '@mui/material/Button';
import LocalGroceryStoreIcon from '@mui/icons-material/LocalGroceryStore';
import {Tooltip} from "@mui/material";


const Menu = (props) => {
  const {items, addToCart, cart} = props;
  
  return <div className="section-center">
    {items.map((menuItem) =>{
      const {id, title, img,desc, price} = menuItem;
      return (
      
      <article key={id} className='menu-item'>
        <img src={img} alt={title} className='photo'/>
        <div className='item-info'>
          <header>
            <h4>{title}</h4>
            <h4 className='price'>{price.toFixed(2)} €</h4>
          </header>
          <p className='item-text'>{desc}</p>
          <div className="buttoni">
            <Tooltip title="Shtoje në shportë" placement="top">
              <Button   onClick={() => addToCart(menuItem, "INCREASE")}>+</Button>
            </Tooltip>
            <LocalGroceryStoreIcon/>
            <Tooltip title="Shtoje në shportë" placement="top">
              <Button   onClick={() => addToCart(menuItem, "DECREASE")}>-</Button>
            </Tooltip>

          </div>
        </div>

      </article>);
    })}
  </div>;
};

export default Menu;
