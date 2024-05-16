import React from 'react'
import NavbarCustomer from '../components/NavbarCustomer'
import Landpadge from './Landpadge'
import Footer from '../components/Footer'

function Arsip() {
  return (
    <div>
       <div>
        <NavbarCustomer />
       </div>
       <div>
        <Landpadge />
       </div>
       <div>
       <div className='md:max-w-[1480px] m-auto  max-w-[600px] mb-10 mt-12'>

<div className='relative mx-24'>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Judul
            </th>
            <th scope="col" class="px-6 py-3">
                Kode Peminjaman
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal Pengembalian
            </th>
            <th scope="col" class="px-6 py-3">
                Pengambalian
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Maripossa
            </th>
            <td class="px-6 py-4">
               A102BA
            </td>
            <td class="px-6 py-4">
                12 Desemaber 2023
            </td>
            <td class="px-6 py-4 flex">
                <a href="/" className='px-3 py-2 mt-2 rounded-md bg-[#e37f22] text-white font-bold hover:bg-amber-500'>Return Back</a>
            </td>
        </tr>
    </tbody>
</table>
</div>
  </div>
       </div>
       <div className='pt-40'>
        <Footer />
       </div>
    </div>
  )
}

export default Arsip