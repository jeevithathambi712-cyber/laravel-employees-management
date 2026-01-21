<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Company</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">🏢 Company Details</h5>
                        <a href="{{ route('companies.index') }}" class="btn btn-light btn-sm">
                            ← Back
                        </a>
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Company Name</div>
                            <div class="col-8">{{ $company->name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Email</div>
                            <div class="col-8">{{ $company->email ?? '—' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4 fw-bold">Website</div>
                            <div class="col-8">
                                @if($company->website)
                                    <a href="{{ $company->website }}" target="_blank">
                                        {{ $company->website }}
                                    </a>
                                @else
                                    —
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 fw-bold">Logo</div>
                            <div class="col-8">
                                @if($company->logo)
                                    <img src="{{ asset('storage/'.$company->logo) }}"
                                         class="img-thumbnail"
                                         style="max-width: 150px;">
                                @else
                                    —
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-end">
                            
                        <a href="{{ route('companies.index') }}"
                           class="btn btn-secondary btn-sm">
                            Back to List
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
