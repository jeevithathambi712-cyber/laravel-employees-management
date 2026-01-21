<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th style="width: 18%;">Name</th>
                <th style="width: 20%;">Email</th>
                <th style="width: 12%;">Logo</th>
                <th style="width: 20%;">Website</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($companies as $company)
            <tr id="row-{{ $company->id }}">
                <td class="fw-semibold">{{ $company->name }}</td>

                <td>{{ $company->email ?? '—' }}</td>

                <td>
                    @if($company->logo)
                    <img src="{{ asset('storage/'.$company->logo) }}"
                        class="img-thumbnail"
                        style="width: 60px; height: 60px; object-fit: contain;">
                    @else
                    —
                    @endif
                </td>

                <td>
                    @if($company->website)
                    <a href="{{ $company->website }}" target="_blank" class="text-decoration-none">
                        {{ $company->website }}
                    </a>
                    @else
                    —
                    @endif
                </td>

                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <!-- VIEW -->
                        <a href="{{ route('companies.show', $company->id) }}"
                            class="btn btn-outline-info btn-sm">
                            👁 View
                        </a>

                        <!-- EDIT -->
                        <a href="{{ route('companies.edit', $company->id) }}"
                            class="btn btn-outline-warning btn-sm">
                            ✏ Edit
                        </a>

                        <!-- DELETE -->
                        <button class="btn btn-outline-danger btn-sm deleteCompany"
                            data-id="{{ $company->id }}">
                            🗑 Delete
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-3">
    {{ $companies->links() }}
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).on('click', '.deleteCompany', function() {
        let companyId = $(this).data('id');

        if (!confirm('Are you sure?')) return;

        $.ajax({
            url: "{{ url('companies') }}/" + companyId,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                if (res.success) {
                    $('#row-' + companyId).remove();
                    alert(res.message);
                } else {}
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>



{{ $companies->links() }}