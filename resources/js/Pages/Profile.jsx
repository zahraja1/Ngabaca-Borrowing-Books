import { Fragment } from "react";
import { Menu, Transition } from "@headlessui/react";

function classNames(...classes) {
    return classes.filter(Boolean).join(" ");
}

export default function ProfileCustomer() {
    return (
        <Menu as="div" className="relative inline-block text-left">
            <div>
                <Menu.Button className="inline-flex justify-center w-full px-4 py-2  text-[#748E63] font-bold text-lg">
                    Profile
                </Menu.Button>
            </div>

            <Transition
                as={Fragment}
                enter="transition ease-out duration-100"
                enterFrom="transform opacity-0 scale-95"
                enterTo="transform opacity-100 scale-100"
                leave="transition ease-in duration-75"
                leaveFrom="transform opacity-100 scale-100"
                leaveTo="transform opacity-0 scale-95"
            >
                <Menu.Items className="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div className="py-1">
                        <Menu.Item>
                            {({ active }) => (
                               <a
                               href="/home"
                               className={classNames(
                                   active
                                       ? "bg-gray-100 text-black"
                                       : " text-[#748E63]",
                                   "block px-4 py-2 text-sm"
                               )}
                           >
                               Backend
                           </a>
                            )}
                        </Menu.Item>
                        <Menu.Item>
                            {({ active }) => (
                               <a
                               href="/customer/Peminjaman"
                               className={classNames(
                                   active
                                       ? "bg-gray-100 text-black"
                                       : " text-[#748E63]",
                                   "block px-4 py-2 text-sm"
                               )}
                           >
                               MY LIBRARY
                           </a>
                            )}
                        </Menu.Item>
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    );
}