<table class="table table-bordered patients-table">
    <thead>
        <tr>    
            <th>No.</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sex = ['1' => 'male', '2' => 'female'];
            $status = ['0' => 'pending', '1' => 'active', '2' => 'inactive'];
        @endphp
        @foreach($result as $viewPatients)
            <tr>
                <td>{{ ((($result->currentPage() - 1 ) * $result->perPage() ) + $loop->iteration) . '.' }}</td>
                <td>{{ ucfirst($viewPatients->firstname) }} {{ ucfirst($viewPatients->middlename) }} {{ ucfirst($viewPatients->lastname) }}</td>
                <td>{{ $viewPatients->mobile }}</td>
                <td>{{ Carbon\Carbon::parse($viewPatients->birthdate)->diff(Carbon\Carbon::now())->y }} Year</td>
                <td>{{ $sex[$viewPatients->sex] }}</td>
                <td>
                    @switch($viewPatients->status)
                        @case(0)
                            <p class="pending mb-0">Pending</p>
                            @break
                        @case(1)
                            <p class="active mb-0">Active</p>
                            @break
                        @case(2)
                            <p class="inactive mb-0">Inactive</p>
                    @endswitch
                </td>
                <td class="table-action">
                    <a href="{{ route('patients.show',encrypt($viewPatients->id)) }}" data-id="{{ encrypt($viewPatients->id) }}" type="button" class="edit-btn btn btn-primary editpatients btn-icon"><img src="{{ asset('/images/view.png') }}" alt="icon"></a>
                </td>
                <td class="table-action">
                    <a data-id="{{ encrypt($viewPatients->id) }}" type="button" class="delete-btn btn btn-danger btn-icon" id="deletePatient"><img src="{{ asset('/images/delete.png') }}" alt="icon"></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $result->links() !!}
</div>