import React from 'react'
import NavbarCustomer from '../components/NavbarCustomer'
import TabelPinjam from '../components/TabelPinjam'
import Footer from '../components/Footer'

export default function Peminjaman({peminjaman}) {
  return (
    <div>
       <div className='bg-white'>
       <NavbarCustomer/>
        <TabelPinjam data={peminjaman}/>
        <Footer/>
       </div>
    </div>
  )
}
