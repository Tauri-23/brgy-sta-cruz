@if ($docReq->count() < 1 && $docReqBrgyId->count() < 1)
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/empty1.svg">  
            <div class="text-l3 text-center">No Records</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <small class="text-m2 form-data-col">Request Id</small>
            <small class="text-m2 form-data-col">Resident Name</small>
            <small class="text-m2 form-data-col">Document</small>
            <small class="text-m2 form-data-col">{{$mode == "pending" ? "Date Requested" : ($mode == "for-pickup" ? "Pick-up Date" : ($mode == "completed" ? "Date Completed" : "Date Rejected"))}}</small>
            <small class="text-m2 form-data-col">Status</small>
        </div>


        @foreach ($docReq as $doc)
            <a href="/{{$user == "admin" ? "AdminRequestDocumentPreview" : "ResidentRequestDocumentPreview"}}/{{$doc->id}}/others" class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doc->id}}">
                <small class="form-data-col">{{$doc->id}}</small>
                <small class="form-data-col">{{$doc->name}}</small>
                <small class="form-data-col">{{$doc->document_types()->first()->document_name}}</small>
                <small class="form-data-col">{{\Carbon\Carbon::parse($doc->created_at)->format('M d, Y g:i a')}}</small>
                <small class="form-data-col">{{$doc->status}}</small>
            </a>
        @endforeach
        @foreach ($docReqBrgyId as $doc)
            <a href="/{{$user == "admin" ? "AdminRequestDocumentPreview" : "ResidentRequestDocumentPreview"}}/{{$doc->id}}/brgyId" class="table1-data {{ $loop->last ? 'last' : '' }} employee-column" id="{{$doc->id}}">
                <small class="form-data-col">{{$doc->id}}</small>
                <small class="form-data-col">{{$doc->name}}</small>
                <small class="form-data-col emp-id">{{$doc->document_types()->first()->document_name}}</small>
                <small class="form-data-col">{{\Carbon\Carbon::parse($mode == "pending" ? $doc->created_at : ($mode == "for-pickup" ? $doc->pickup_date : $doc->updated_at))->format('M d, Y g:i a')}}</small>
                <small class="form-data-col emp-dept">{{$doc->status}}</small>
            </a>
        @endforeach
    </div>
@endif