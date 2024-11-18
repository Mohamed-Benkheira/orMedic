// src/components/Navbar.js
import React from "react";

import { Link } from "@inertiajs/react";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min";

const Navbar = ({ user }) => {
    return (
        <header
            className="d-flex align-items-center justify-content-between px-5 "
            style={{ backgroundColor: "#000", color: "#fff", height: "60px" }}
        >
            <Link href="/" className="fs-2 text-decoration-none text-white  ">
                OrMedic.
            </Link>

            {/* Search Bar */}
            <div className=" d-flex align-items-center ">
                <input
                    className=" rounded-5 bg-white"
                    type="text"
                    placeholder="Search"
                />
            </div>

            {/* Profile */}
            <div className="dropdown">
                <div
                    className="d-flex align-items-center dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <div
                        style={{
                            width: "30px",
                            height: "30px",
                            borderRadius: "50%",
                            border: "1px solid #fff",
                            marginRight: "8px",
                        }}
                    ></div>
                    <span> {user}</span>
                </div>
                <ul className="dropdown-menu">
                    <li>
                        <Link
                            href={route("profile.edit")}
                            className="dropdown-item"
                        >
                            Profile
                        </Link>
                    </li>
                    <li>
                        <Link
                            href={route("logout")}
                            method="post"
                            as="button"
                            className="dropdown-item"
                        >
                            Logout
                        </Link>
                    </li>
                </ul>
            </div>
        </header>
    );
};

export default Navbar;
