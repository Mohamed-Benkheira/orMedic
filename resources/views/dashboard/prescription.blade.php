<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .card-header {
            background: linear-gradient(45deg, #00c6ff, #0072ff);
        }

        .medicine-list {
            margin-top: 20px;
            list-style-type: disc;
            padding-left: 20px;
        }

        .medicine-item {
            margin-bottom: 10px;
        }

        .medicine-alternative {
            font-style: italic;
            color: #007bff;
        }

        .pr-separator {
            font-weight: bold;
            color: #ff4500;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <!-- Prescription Details Card -->
        <div class="card shadow-lg mb-5">
            <div class="card-header text-white text-center">
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
                <div class="row mt-3">
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

        <!-- Medicines Section -->
        <div class="medicine-details">
            <h4 class="mb-4">Associated Medicines</h4>
            @if ($prescription->medicines->isEmpty())
                <div class="alert alert-warning">
                    No medicines associated with this prescription.
                </div>
            @else
                <ol class="medicine-list">
                    @foreach ($prescription->medicines as $medicine)
                        <li class="medicine-item">
                            <strong>{{ $medicine->name }}:</strong> {{ $medicine->dosage_mg }}, {{ $medicine->form }},
                            {{ $medicine->route_of_administration }}, {{ $medicine->frequency }},
                            {{ $medicine->duration }},
                            {{ $medicine->quantity }}
                            <br>
                            <!-- Display alternatives if they exist -->
                            @if ($medicine->alternatives->isNotEmpty())
                                <span class="text-primary ">OU</span>
                                @foreach ($medicine->alternatives as $alternative)
                                    <strong>{{ $alternative->name }}:</strong> {{ $alternative->dosage_mg }},
                                    {{ $alternative->form }},
                                    {{ $alternative->route_of_administration }}, {{ $alternative->frequency }},
                                    {{ $alternative->duration }},
                                    {{ $alternative->quantity }}
                                    @if (!$loop->last)
                                        <br>
                                        <span class="text-primary">OU</span>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                    @endforeach
                </ol>
            @endif
            @if ($prescription->more_info == null)
                <p>no more infos</p>
            @else
                {!! $prescription->more_info !!}
            @endif
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
