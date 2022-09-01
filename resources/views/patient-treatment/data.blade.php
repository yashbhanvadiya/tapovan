<table class="table table-bordered treatment-table pt-view">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>    
            @foreach ($treatmentColumn as $data) 
                <th>{{ ucwords($data) }}</th>
            @endforeach
            <th colspan="2" class="table-action">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $PT)
            <tr>
                <td>{{ ((($result->currentPage() - 1 ) * $result->perPage() ) + $loop->iteration) . '.' }}</td>
                <td>{{ !empty($PT->getPatientName['firstname']) ? $PT->getPatientName['firstname'] .' '. $PT->getPatientName['middlename'] .' '. $PT->getPatientName['lastname'] : '' }}</td>
                
                {{-- @foreach($treatment as $treatmentName)             
                    @php
                        $treatment_name = str_replace(' ', '_',$treatmentName->name);
                        $ptDate = !empty($patientTreatments[$treatment_name]['date']) ? $patientTreatments[$treatment_name]['date'] :'';
                        $ptDesc = !empty($patientTreatments[$treatment_name]['desc']) ? $patientTreatments[$treatment_name]['desc'] :'';
                    @endphp
                @endforeach --}}
                
                @foreach ($treatmentColumn as $data) 
                    <td><input class="treatment-select" type="text" name="{{ str_replace(' ', '_',$data) }}" value="1"></td>
                @endforeach
                <td class="table-action">
                    <a href="{{ route('patient-treatments.show',encrypt($PT->id)) }}" type="button" class="edit-btn btn btn-primary edit-pt btn-icon"><img src="{{ asset('/images/view.png') }}" alt="icon"></a>
                </td>
                <td class="table-action">
                    <a data-id="{{ encrypt($PT->id) }}" type="button" class="delete-btn btn btn-danger btn-icon" id="deletePT"><img src="{{ asset('/images/delete.png') }}" alt="icon"></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $result->links() !!}
</div>
