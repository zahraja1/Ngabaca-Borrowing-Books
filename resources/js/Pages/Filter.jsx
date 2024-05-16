import React from 'react'
import Buku from './Buku'
import NavbarCustomer from '../components/NavbarCustomer'
import Footer from '../components/Footer'

export default function Filter({buku}) {
  return (
    <div>
      <NavbarCustomer/>
      <Buku data={buku} />
      <Footer/>
    </div>
  )
}
