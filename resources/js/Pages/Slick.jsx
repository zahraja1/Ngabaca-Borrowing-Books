import Slider from 'react-slick';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Buku1 from '../../../public/images/buk1.jpg';
import Buku2 from '../../../public/images/buk2.jpg';
import Buku3 from '../../../public/images/buk3.jpg';
import Buku4 from '../../../public/images/buk4.jpg';

const App = () => {
  const settings = {
    dots: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 1000,
  };

  return (
    <div className='w-full bg-[#EEE7DA] mx-auto pb-5 pt-3'> {/* Set the component to full width and background color */}
      <h2 className='text-center text-[40px] text-[#748E63] pt-5 pb-5  font-bold '>Favorite Book</h2>
      <Slider {...settings}>
        <div >
          <img className='mx-auto' src={Buku1} alt="" style={{ width: '550px', height: '350px' }} />
        </div>
        <div >
          <img className='mx-auto' src={Buku2} alt="" style={{ width: '550px', height: '350px' }} />
        </div>
        <div >
          <img className='mx-auto' src={Buku3} alt="" style={{ width: '550px', height: '350px' }} />
        </div>
        <div >
          <img className='mx-auto' src={Buku4} alt="" style={{ width: '550px', height: '350px' }} />
        </div>
      </Slider>
    </div>
  );
};

export default App;
