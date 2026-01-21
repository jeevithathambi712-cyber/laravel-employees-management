<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Company</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-warning d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">✏ Edit Company</h5>
                        <a href="{{ route('companies.index') }}" class="btn btn-dark btn-sm">
                            ← Back
                        </a>
                    </div>

                    <div class="card-body">

                        <form method="POST"
                              action="{{ route('companies.update', $company->id) }}"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ $company->name }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ $company->email }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Current Logo</label>
                                @if($company->logo)
                                    <img src="{{ asset('storage/'.$company->logo) }}"
                                         class="img-thumbnail mb-2"
                                         style="max-width: 150px;">
                                @else
                                    <span class="text-muted">No logo uploaded</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Change Logo</label>
                                <input type="file"
                                       name="logo"
                                       class="form-control"
                                       accept=".jpg,.png">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Website</label>
                                <input type="text"
                                       name="website"
                                       class="form-control"
                                       value="{{ $company->website }}">
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-success">
                                    💾 Update
                                </button>
                                <a href="{{ route('companies.index') }}"
                                   class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
