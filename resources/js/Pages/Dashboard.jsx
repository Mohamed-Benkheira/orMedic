import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import Aside from "@/Layouts/Aside";
import Details from "@/Layouts/Details";

export default function Dashboard({
    auth,
    prescriptions_aside,
    prescription_details,
}) {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Dashboard" />
            <div className="row w-100">
                <div className="col-md-3">
                    <Aside prescriptions={prescriptions_aside} />
                </div>
                <div className="col-md-8 mt-5">
                    <Details prescriptions={prescription_details} />
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
