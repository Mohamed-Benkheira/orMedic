// Prescriptions.jsx
import React from "react";
import { Link } from "@inertiajs/react";
import "bootstrap/dist/css/bootstrap.min.css";

const Aside = ({ prescriptions }) => {
    // Group prescriptions by category

    const groupedByCategory = prescriptions.reduce((acc, prescription) => {
        acc[prescription.category] = acc[prescription.category] || [];
        acc[prescription.category].push(prescription);

        return acc;
    }, {});
    return (
        <aside
            className="vh-100 bg-light  "
            style={{ overflowY: "auto", overflowX: "hidden" }}
        >
            <h3 className=" m-4 ">Prescriptions</h3>
            {Object.entries(groupedByCategory).map(
                ([category, prescriptions]) => (
                    <div key={category} className="mb-3">
                        <h5 className="dashboard-aside-categories mx-4 mt-4 text-uppercase text-muted fw-ligh fs-6 ">
                            {category}
                        </h5>

                        <ul className="w-100 p-0 mx-5">
                            {prescriptions.map((prescription) => (
                                <li key={prescription.id} className="fs-6 py-1">
                                    <Link
                                        className="text-decoration-none text-dark text-break"
                                        href={`/dashboard/${prescription.id}`}
                                        preserveState
                                        preserveScroll
                                    >
                                        {prescription.illness}
                                    </Link>
                                </li>
                            ))}
                        </ul>
                    </div>
                )
            )}
        </aside>
    );
};

export default Aside;
