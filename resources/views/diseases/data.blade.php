<table class="table table-bordered disease-table">
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
        @foreach($result as $viewDisease)
            <tr>
                <td>{{ ((($result->currentPage() - 1 ) * $result->perPage() ) + $loop->iteration) . '.' }}</td>
                <td>{{ $viewDisease->name }}</td>
                <td>{{ ucfirst($viewDisease->createdBy['firstname']) }}</td>
                <td>{{ $viewDisease->created_at->format('d-m-y H:i:s') }}</td>
                <td class="table-action">
                    <button type="button" class="edit-btn btn btn-primary editdisease btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ encrypt($viewDisease->id) }}"><img src="{{ asset('/images/edit.png') }}" alt="icon"></button>
                </td>
                <td class="table-action"> 
                    {{-- <form action="{{ URL::to('diseases/'.$viewDisease->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn btn btn-danger btn-icon"><img src="{{ asset('/images/delete.png') }}" alt="icon"></button>
                    </form> --}}
                    <a data-id="{{ encrypt($viewDisease->id) }}" type="button" class="delete-btn btn btn-danger btn-icon" id="deleteDisease"><img src="{{ asset('/images/delete.png') }}" alt="icon"></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $result->links() !!}
</div>
