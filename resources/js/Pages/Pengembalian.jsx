import React from 'react'
import NavbarCustomer from '../components/NavbarCustomer'
import Footer from '../components/Footer'
import TableKembali from '../components/TableKembali'

export default function Pengembalian({pengembalian}) {
  return (
    <div>
        <div className='bg-white'>
        <NavbarCustomer />
        <TableKembali data={pengembalian} />
       <div className='mt-64'>
       <Footer />
       </div>
        </div>
    </div>
  )
}
