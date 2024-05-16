import React from 'react'
import NavbarCustomer from '../components/NavbarCustomer'
import Footer from '../components/Footer'
import Buku from './Buku'

function Romance({buku}) {
  return (
    <div>
      <NavbarCustomer />
      <Buku data={buku}/>
      <Footer />
    </div>
  )
}

export default Romance