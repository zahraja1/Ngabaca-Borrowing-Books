import React, { useState } from 'react';
import Navbar from '../components/Navbar'
import Index from './Index';
import Buku from './Buku';
import Footer from '../components/Footer';
import Slick from '../../js/Pages/Slick'
import (Navbar)
import (Index)

const Test = ({buku}) => {
    return (
       <div>
        <div >
        <Navbar />
        <Index/>
        <Slick />
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

export default Test