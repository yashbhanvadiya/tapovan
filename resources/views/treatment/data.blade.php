<table class="table table-bordered treatment-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Created By</th>
            <th>Date & Time</th>
            <th colspan="2" class="table-action">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $viewTreatment)
            <tr>
                <td>{{ ((($result->currentPage() - 1 ) * $result->perPage() ) + $loop->iteration) . '.' }}</td>
                <td>{{ ucwords($viewTreatment->name) }}</td>
                <td>{{ ucwords($viewTreatment->createdBy['firstname']) }}</td>
                <td>{{ $viewTreatment->created_at->format('d-m-y H:i:s') }}</td>
                <td class="table-action">
                    <button type="button" class="edit-btn btn btn-primary edittreatment btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ encrypt($viewTreatment->id) }}"><img src="{{ asset('/images/edit.png') }}" alt="icon"></button>
                </td>
                <td class="table-action">
                    <a data-id="{{ encrypt($viewTreatment->id) }}" type="button" class="delete-btn btn btn-danger btn-icon" id="deleteTreatment"><img src="{{ asset('/images/delete.png') }}" alt="icon"></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $result->links() !!}
</div>
