import React, { useState } from "react";
import axios from "axios";
import NavbarCustomer from "../components/NavbarCustomer";
import Footer from "../components/Footer";

const Borrow = () => {
    const [user_id, setUser_id] = useState("");
    const [buku_id, setBuku_id] = useState("");
    const [kode_peminjaman, setKode_peminjaman] = useState("");
    const [tanggal_peminjaman, setTanggal_peminjaman] = useState("");
    const [tanggal_pengembalian, setTanggal_pengembalian] = useState("");

    const onSubmit = async (e) => {
        e.preventDefault();

        try {
            const newPeminjaman = {
                user_id,
                buku_id,
                kode_peminjaman,
                tanggal_peminjaman,
                tanggal_pengembalian,
            };
            const response = await axios.post(
                "http://127.0.0.1:8000/api/peminjaman/tambah",
                newPeminjaman
            );
            alert("Data berhasil ditambahkan");
            console.log(response.data);
        } catch (error) {
            console.error(error);
        }
    };

    return (
        <div>
            <div className="flex flex-col h-screen bg-[#AFC8AD]">
                <div>
                    <NavbarCustomer />
                </div>
                <div className="container w-full">
                    <h1 className="font-semibold  text-[#EEE7DA] text-center text-4xl mb-5">
                        Borrow Form
                    </h1>
                    <div className="flex justify-center">
                        <form
                            onSubmit={onSubmit}
                            className="bg-white p-4 w-[440px] border-gray-950 rounded-lg"
                        >
                            <div className="form-group mb-3">
                                <label className="block text-sm font-semibold mb-1">
                                    User ID:
                                </label>
                                <input
                                    type="text"
                                    className="form-control w-[400px] border border-black rounded px-2 py-1"
                                    value={user_id}
                                    onChange={(e) => setUser_id(e.target.value)}
                                />
                            </div>
                            <div className="form-group mb-3">
                                <label className="block text-sm font-semibold mb-1">
                                    Buku ID:
                                </label>
                                <input
                                    type="text"
                                    className="form-control w-[400px] border border-black rounded px-2 py-1"
                                    value={buku_id}
                                    onChange={(e) => setBuku_id(e.target.value)}
                                />
                            </div>
                            <div className="form-group mb-3">
                                <label className="block text-sm font-semibold mb-1">
                                    Kode Peminjaman:
                                </label>
                                <input
                                    type="text"
                                    className="form-control w-[400px] border border-black rounded px-2 py-1"
                                    value={kode_peminjaman}
                                    onChange={(e) =>
                                        setKode_peminjaman(e.target.value)
                                    }
                                />
                            </div>
                            <div className="form-group mb-3">
                                <label className="block text-sm font-semibold mb-1">
                                    Tanggal Peminjaman:
                                </label>
                                <input
                                    type="date"
                                    className="form-control w-[400px] border border-black rounded px-2 py-1"
                                    value={tanggal_peminjaman}
                                    onChange={(e) =>
                                        setTanggal_peminjaman(e.target.value)
                                    }
                                />
                            </div>
                            <div className="form-group mb-3">
                                <label className="block text-sm font-semibold mb-1">
                                    Tanggal Pengembalian:
                                </label>
                                <input
                                    type="date"
                                    className="form-control w-[400px] border border-black rounded px-2 py-1"
                                    value={tanggal_pengembalian}
                                    onChange={(e) =>
                                        setTanggal_pengembalian(e.target.value)
                                    }
                                />
                            </div>
                            <button type="submit" className="btn btn-primary  rounded-md bg-[#748E63] text-white font-bold hover:bg-opacity-20 px-3">
                                Submit
                            </button> 
                        </form>
                    </div>
                </div>
                <div className="mt-5">
                    <Footer />
                </div>
            </div>
        </div>
    );
};

export default Borrow;
