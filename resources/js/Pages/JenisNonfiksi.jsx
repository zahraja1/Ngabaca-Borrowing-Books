import React from 'react'
import NavbarCustomer from '../components/NavbarCustomer'
import Footer from '../components/Footer'
import NonFiksi from './NonFiksi'

const JenisNonfiksi = ({buku}) => {
  return (
    <div>
        <NavbarCustomer />
        <div>
            <NonFiksi data={buku} />
        </div>
        <div>
            <Footer />
        </div>
    </div>
  )
}

export default JenisNonfiksi