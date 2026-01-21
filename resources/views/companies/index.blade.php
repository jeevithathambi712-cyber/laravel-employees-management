<!DOCTYPE html>
<html lang="en">

<head>
    <title>Companies</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Add Company Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Company</h5>
                    </div>

                    <div class="card-body">
                        <form id="companyForm" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter company name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control" accept=".jpg,.png">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" name="website" class="form-control" placeholder="https://example.com">
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                💾 Save Company
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Company List Card -->
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">🏢 Company List</h5>
                    </div>

                    <div class="card-body" id="companyTable">
                        @include('companies.table', ['companies' => $companies])
                    </div>
                </div>
<script>
    $(document).ready(function() {

        $('#companyForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('companies.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        alert('Company added successfully');
                        $('#companyForm')[0].reset();
                        loadCompanies();
                    }
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });
        });

        function loadCompanies() {
            $.ajax({
                url: "{{ route('companies.list') }}",
                type: "GET",
                success: function(data) {
                    $('#companyTable').html(data);
                }
            });
        }
    });
</script>

<script>
    $(document).on('click', '.deleteCompany', function() {

        if (!confirm('Are you sure you want to delete this company?')) return;

        let id = $(this).data('id');

        $.ajax({
            url: "/companies/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function() {
                $('#row-' + id).remove();
                alert('Company deleted successfully');
            }
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


</html>