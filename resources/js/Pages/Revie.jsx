import React from 'react'

const Revie = ({ulasan}) => {
  return (
    <div>
        <div>
        {ulasan &&(
 <p>
 {ulasan.komentar}
</p>
        )}
       
    </div>
    </div>
  )
}

export default Revie