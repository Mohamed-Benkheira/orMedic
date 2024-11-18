const Details = ({ prescriptions }) => {
    if (!prescriptions) {
        return (
            <div className="ps-4">
                <h2>Select a prescription from the sidebar</h2>
            </div>
        );
    }

    return (
        <>
            <h2 className="ps-4"> {prescriptions.illness}</h2>
            <p className="text-muted fs-5 ps-4"> {prescriptions.category}</p>
            <ul className="ps-1">
                {prescriptions.medicines.map((medicine) => (
                    <li key={medicine.id} className="ps-4">
                        • <span className="fw-bold ps-2">{medicine.name}:</span>{" "}
                        {medicine.dosage_mg} mg, {medicine.form}{" "}
                        {medicine.frequancy},{medicine.duration},
                        {medicine.quantity}.
                        <ul>
                            {medicine.alternatives.length > 0 ? (
                                medicine.alternatives.map((alternative) => (
                                    <li key={alternative.id}>
                                        OU{" "}
                                        <span className="fw-bold">
                                            {alternative.name}:
                                        </span>{" "}
                                        {alternative.dosage_mg} mg{" "}
                                        {alternative.form}
                                        {""}
                                        {alternative.frequancy},{" "}
                                        {alternative.duration},{" "}
                                        {alternative.quantity}.
                                    </li>
                                ))
                            ) : (
                                <span></span>
                            )}
                        </ul>
                    </li>
                ))}
            </ul>
            <div
                className="ps-4"
                dangerouslySetInnerHTML={{
                    __html: prescriptions.more_info,
                }}
            />
        </>
    );
};

export default Details;
