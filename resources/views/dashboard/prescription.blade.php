<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
</head>

<body>
    <!-- Prescription Details Card -->
    <div class="card shadow mb-5">
        <div class="card-header bg-info text-white text-center">
            <h4>Prescription Information</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Illness:</h5>
                    <p>{{ $prescription->illness }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Admin Name:</h5>
                    <p>{{ $prescription->user->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5>Created At:</h5>
                    <p>{{ $prescription->created_at->format('d-m-Y H:i') }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Updated At:</h5>
                    <p>{{ $prescription->updated_at->format('d-m-Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="mb-4">{{ $prescription->illness }}</h1>



        <!-- Associated Medicines Table -->
        {{-- <h2 class="mb-4">Associated Medicines</h2> --}}

        @if ($prescription->medicines->isEmpty())
            <div class="alert alert-warning">
                No medicines associated with this prescription.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nom du médicament</th>
                            <th>Dosage</th>
                            <th>Forme</th>
                            <th>Voie d'administration</th>
                            <th>Fréquence</th>
                            <th>Durée</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prescription->medicines as $medicine)
                            <tr>
                                <td>{{ $medicine->name }}</td>



                                <td>{{ $medicine->dosage }}</td>
                                <td>{{ $medicine->form }}</td>
                                <td>{{ $medicine->route_of_administration }}</td>
                                <td>{{ $medicine->frequency }}</td>
                                <td>{{ $medicine->duration }}</td>
                                <td>{{ $medicine->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->
</body>

</html>
