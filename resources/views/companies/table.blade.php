<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($companies as $company)
        <tr id="row-{{ $company->id }}">
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>

            <td>
                @if($company->logo)
                <img src="{{ asset('storage/'.$company->logo) }}" width="60">
                @else
                —
                @endif
            </td>

            <td>{{ $company->website }}</td>

            <td>
                <!-- VIEW -->
                <a href="{{ route('companies.show', $company->id) }}"
                    class="btn btn-info btn-sm">
                    View
                </a>

                <!-- EDIT -->
                <a href="{{ route('companies.edit', $company->id) }}"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <!-- DELETE (AJAX) -->
                <button class="btn btn-danger btn-sm deleteCompany"
                    data-id="{{ $company->id }}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).on('click', '.deleteCompany', function () {
    let companyId = $(this).data('id');

    if (!confirm('Are you sure?')) return;

    $.ajax({
        url: "{{ url('companies') }}/" + companyId,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            if (res.success) {
                $('#row-' + companyId).remove();
                alert(res.message);
            } else {
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});
</script>



{{ $companies->links() }}