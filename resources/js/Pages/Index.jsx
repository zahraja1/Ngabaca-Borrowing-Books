import React from 'react'
import Gambar from '../../../public/images/bukuuu.png'
import  '../../css/app.css'
const Index = () => {
  return (
    <div>
      <div class="w-full ">
        <div className='md:max-w-[1480px]  m-auto grid md:grid-cols-2 max-w-[600px] '>
        <div className='bg-[#AFC8AD]'>
        <img src={Gambar} alt="zahraaaaa"  className=' md:order-last order-first  w-[600px]'/>
         
        </div>
        <div className='bg-[#AFC8AD]'>
        <h1 id='title' className=' pl-10 pb-12  pt-40 text-4xl font-bold text-white'
           >THE LIBRARY THAT'S ALWAYS OPEN.
            BORROW BOOK ONLINE WITH US.
          </h1>
          <h5 className='pb-10 pl-10 text-lg text-gray-600'>find your books:explore over 20, 
          textbooks and non-fiction in every subject. start whit two weeks Free</h5>
        </div>
        </div>
    </div>

    </div>
  )
}

export default Index