<table class="table table-bordered users-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Designation</th>
            <th class="user-status">Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $viewUser)
            <tr>
                <td>{{ ((($result->currentPage() - 1 ) * $result->perPage() ) + $loop->iteration) . '.' }}</td>
                <td>{{ ucfirst($viewUser->firstname) }} {{ ucfirst($viewUser->middlename) }} {{ ucfirst($viewUser->lastname) }}</td>
                <td>{{ !empty($viewUser->mobile) ? $viewUser->mobile : '-' }}</td>
                <td>
                    @switch($viewUser->role)
                        @case(1)
                            Super Admin
                            @break
                    
                        @case(2)
                            Doctor
                            @break

                        @case(3)
                            Nurse
                            @break

                        @case(4)
                            Reception
                            @break
                    
                        @case(5)
                            Kitchen
                            @break

                        @case(6)
                            Supervisor
                            @break

                        @default
                            -
                    @endswitch
                </td>
                <td class="{{ $viewUser->status == 0 ? 'active' : 'inactive'  }}">
                    @if($viewUser->status == 0)
                        <p class="mb-0">Active</p>
                    @else
                        <p class="mb-0">Inactive</p>
                    @endif
                </td>
                <td class="table-action">
                    <button type="button" class="edit-btn btn btn-primary edituser btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ encrypt($viewUser->id) }}"><img src="{{ asset('/images/edit.png') }}" alt="icon"></button>
                </td>
                <td class="table-action">
                    {{-- <form action="{{ URL::to('users/'.$viewUser->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn btn btn-danger btn-icon"><img src="{{ asset('/images/delete.png') }}" alt="icon"></button>
                    </form> --}}
                    <a data-id="{{ encrypt($viewUser->id) }}" type="button" class="delete-btn btn btn-danger btn-icon" id="deleteUsers"><img src="{{ asset('/images/delete.png') }}" alt="icon"></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $result->links() !!}
</div>