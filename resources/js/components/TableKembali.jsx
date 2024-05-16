import React from "react";

const TableKembali = ({ data }) => {
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
                                className="text-[#748E63]"
                            >
                                Peminjaman
                            </a>
                            <a
                                href="/customer/Pengembalian"
                                className="text-[#748E63]"
                            >
                                Pengembalian
                            </a>
                        </div>
                        <hr />
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
                                                id Buku
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-6 py-3"
                                            >
                                                Id Peminjaman
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-6 py-3"
                                            >
                                                TanggalPengambalian
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {data.map((pengembalian) => (
                                            <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td className="px-6 py-4">
                                                    {pengembalian.buku_id}
                                                </td>
                                                <td className="px-6 py-4">
                                                    {pengembalian.peminjaman_id}
                                                </td>
                                                <td className="px-6 py-4">
                                                    {
                                                        pengembalian.tanggal_pengembalian
                                                    }
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
        </div>
    );
};

export default TableKembali;
