import React from "react";

function Buku({ data, route, buku, search }) {
    return (
        <div>
            <div className="min-h-screen flex flex-col justify-center lg:px-32  bg-[#F2F1EB]">
                <h1 className=" text-center text-[#3A4D39] font-bold text-[70px] pb-24 text-4xl mt-24 mb-8">
                    Our Collection
                </h1>
                <div className="flex flex-wrap pb-8 gap-8 justify-center">
                    {data.map((buku) => (
                        <div className=" lg:m-1/4 w-[170px] h-[250]">
                            <img
                                className=" h-[250px] w-full"
                                src={`/storage/${buku.thumbnail}`}
                                alt=""
                            />
                            <div className="">
                                <div>
                                    <h1 className="text-[17px] text-[#3A4D39] font-bold">
                                        {buku.judul}
                                    </h1>
                                    <h1 className="font-semibold text-gray-500 text-sm">
                                        {buku.author}
                                    </h1>
                                </div>
                                <div className="flex flex-row justify-between mt-3">
                                    <div className="flex gap-2">
                                        <a
                                            href={`/customer/review/${buku.id}`}
                                            className="px-3 text-sm  transition-all "
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                fill="#748E63"
                                            >
                                                <path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-6-6h-9.667l-5.333 4v-4h-3v-14.001h18v14.001zm-9-4.084h-5v1.084h5v-1.084zm5-2.916h-10v1h10v-1zm0-3h-10v1h10v-1z" />
                                            </svg>
                                        </a>
                                        <a
                                            href="/customer/Borrow"
                                            className="px-3 text-sm text-[#748E63] transition-all  bg-[#EEE7DA]"
                                        >
                                          Borrow
                                        </a>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}

export default Buku;
