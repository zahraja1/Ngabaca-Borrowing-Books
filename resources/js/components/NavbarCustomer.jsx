import React, { useState } from "react";
import DropdownJenis from "../Pages/DropdownJenis";
import DropdownGendre from "../Pages/DropdownGendre";
import ProfileCustomer from "../Pages/Profile";
const NavbarCustomer = () => {
    const [toggle, setToggle] = useState(false);
    const handleClick = () => setToggle(!toggle);
    return (
        <nav class="bg-[#F2F1EB] border-gray-200 dark:bg-gray-900 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <span class="self-center text-2xl  whitespace-nowrap text-[#748E63] font-bold">
                    NGABACA
                </span>
                <button
                    data-collapse-toggle="navbar-default"
                    onClick={handleClick}
                    type="button"
                    class="inline-flex items-center
     p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2
      focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default"
                    aria-expanded="false"
                >
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 17 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15"
                        />
                    </svg>
                </button>
                <div className="hidden md:flex">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-[#F2F1EB] md:flex-row 
  md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                    >
                        <li className="relative flex flex-col text-center">
                            <DropdownGendre />
                        </li>
                        <li className="relative flex flex-col text-center">
                            <DropdownJenis />
                        </li>
                        <li>
                           <ProfileCustomer />
                            <a href="/customer/landingcustomer " className="text-[#748E63] font-bold text-lg">library</a>
                        </li>
                        <li>
                           
                        </li>
                    </ul>
                </div>
            </div>
            <div
                className={
                    toggle
                        ? "absolute z-10 p-4 bg-[#F2F1EB] w-full px-8 md:hidden"
                        : "hidden"
                }
            >
                 <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row 
  md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                    >
                        <li className="relative flex flex-col text-center border-white">
                            <DropdownGendre />
                        </li>
                        <li className="relative flex flex-col text-center border-white">
                            <DropdownJenis />
                        </li>
                        <li className="relative flex flex-col w-full bg-[#F2F1EB] text-center font-bold text-[#748E63] border-white">
                            <a href="/">library</a>
                        </li>
                    </ul>
            </div>
           
        </nav>
    );
};

export default NavbarCustomer;
