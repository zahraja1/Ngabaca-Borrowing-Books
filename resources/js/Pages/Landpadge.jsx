import React from 'react'
import Footer from '../components/Footer'

function Landpadge() {
  return (
    <div >
        <div className='bg-[#AFC8AD]'>
        <div>
            <h1 className='font-bold text-6xl pl-10 text-[#748E63]' id='library' >My Library</h1>
        </div>
        <div>
            <div className='flex text-center mx-44 justify-between mt-10'>
               <a href="/customer/Peminjaman" className='Atext-[#748E63]'>Peminjaman</a>
              <a href="/customer/Pengembalian" className='text-[#748E63]'>Pengembalian</a>
            </div>
            <hr />
        </div>
        </div>
    </div>
  )
}

export default Landpadge