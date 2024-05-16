import React from 'react'
import NavbarCustomer from '../components/NavbarCustomer'
import Buku from './Buku'
import Footer from '../components/Footer'

function Nonfiksi({buku}) {
  return (
    <div>
        <NavbarCustomer/>
        <Buku data={buku} />
        <Footer />
    </div>
  )
}

export default Nonfiksi