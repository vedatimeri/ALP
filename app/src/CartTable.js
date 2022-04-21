
import React from 'react'

import Table from '@material-ui/core/Table'
import TableBody from '@material-ui/core/TableBody'
import TableCell from '@material-ui/core/TableCell'
import TableHead from '@material-ui/core/TableHead'
import TableRow from '@material-ui/core/TableRow'


function CartTable(props) {
  const {items} = props
  
  return (
    <Table className={'cart-table'}>
      <TableHead>
        <TableRow>
            <TableCell>Imazhi</TableCell>
            <TableCell>Produkti</TableCell>
            <TableCell>Sasia</TableCell>
            <TableCell>Çmimi</TableCell>
        </TableRow>
      </TableHead>
      <TableBody>
        {items.filter((c, index, array) => array.indexOf(c) === index).map((item, i) => {
          return (
            <TableRow >
              <TableCell><img src={item.img} width='100px' height='100px'/></TableCell>
              <TableCell>{item.title}</TableCell>
              <TableCell>{item.count}</TableCell>
              <TableCell>{item.count * item.price}</TableCell>
            </TableRow>
          )
        })}
      </TableBody>
    </Table>
  )
}
export default CartTable;
