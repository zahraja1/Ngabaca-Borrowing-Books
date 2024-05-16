import React from "react";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import Komentar from "./Komentar";

const Review = ({ buku, ulasan }) => {
    return (
        
        <div>
            <div>
                <Navbar />
            </div>
            <div className=" pt-5 flex flex-col justify-center pb-16 bg-[]">
                <h1 className="font-semibold text-center text-4xl  mb-8  text-white">
                    Book Reviews
                </h1>
                {buku && (
                    <div className="flex flex-wrap grid-cols-3 pb-8 gap-8 justify-center">
                        <div>
                            <img
                                src={`/storage/${buku.thumbnail}`}
                                className="w-[400px]"
                                alt=""
                            />
                        </div>
                    </div>
                )}
                 <div className="mx-[400px]">
                 <Komentar />
                 </div>
            </div>
          
           
            <div>
                <Footer />
            </div>
        </div>
    );
};

export default Review;
