import React from "react";

const TabelPinjam = ({ data }) => {
    console.log(data);
    return (
        <div>
            <div className="">
                <div>
                    <div>
                        <h1
                            className="font-bold text-6xl pl-10 text-[#748E63]"
                            id="library"
                        >
                            My Library
                        </h1>
                    </div>
                    <div>
                        <div className="flex text-center mx-44 justify-between mt-10">
                            <a
                                href="/customer/Peminjaman"
                                className=" font-bold text-[#748E63]"
                            >
                                Peminjaman
                            </a>
                            <a
                                href="/customer/Pengembalian"
                                className="font-bold text-[#748E63]"
                            >
                                Pengembalian
                            </a>
                        </div>
                        <hr className="bg-black" />
                    </div>
                </div>
                <div>
                    <div>
                        <div className="md:max-w-[1480px] m-auto  max-w-[600px] mb-10 mt-12">
                            <div className="relative mx-24">
                                <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th
                                                scope="col"
                                                className="px-6 py-3"
                                            >
                                                Kode Peminjaman
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-6 py-3"
                                            >
                                                Tanggal Peminjaman
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-6 py-3"
                                            >
                                                Tanggal Pengambalian
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-6 py-3"
                                            >
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {data.map((peminjaman) => (
                                            <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td className="px-6 py-4">
                                                    {peminjaman.kode_peminjaman}
                                                </td>
                                                <td className="px-6 py-4">
                                                    {
                                                        peminjaman.tanggal_peminjaman
                                                    }
                                                </td>
                                                <td className="px-6 py-4">
                                                    {
                                                        peminjaman.tanggal_pengembalian
                                                    }
                                                </td>
                                                <td className="px-6 py-4 flex">
                                                    <a
                                                        href="/"
                                                        className="px-3 py-2 mt-2 rounded-md bg-[#748E63] text-white font-bold hover:bg-opacity-30"
                                                    >
                                                        Return Back
                                                    </a>
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="mt-48"></div>
        </div>
    );
};

export default TabelPinjam;
