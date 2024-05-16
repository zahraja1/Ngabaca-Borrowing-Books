import React, { useState } from 'react';
import Index from './Index';
import Buku from './Buku';
import Footer from '../components/Footer';
import NavbarCustomer from '../components/NavbarCustomer';
import Slick from '../../js/Pages/Slick'

const LandingCustomer = ({buku}) => {
    return (
       <div>
        <div >
        <NavbarCustomer />
         <Index />
        </div>
        <div className='mx-auto'>
        <Slick/>
        </div>
        <div>
        <Buku data={buku}/>
        </div>
      
        <div>
            <Footer/>
        </div>
</div>   
    )
}

export default LandingCustomer