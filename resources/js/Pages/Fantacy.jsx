import React from 'react'
import NavbarCustomer from '../components/NavbarCustomer'
import Footer from '../components/Footer'
import Buku from './Buku'

export default function Fantacy({buku}) {
  return (
    <div>
        <NavbarCustomer />
        <Buku data={buku} />
        <Footer />
    </div>
  )
}
