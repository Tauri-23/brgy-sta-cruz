@if ($residents->count() < 1) 
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Residents</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <div class="form-data-col">
                <small class="text-m2">Name</small>
                <div class="table1-PFP-small-cont mar-end-1"></div>
            </div>
            <small class="text-m2 form-data-col">ID</small>
            <small class="text-m2 form-data-col">Email</small>
            <small class="text-m2 form-data-col">status</small>
            <small class="text-m2 form-data-col">Actions</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($residents as $res)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} resident-column" id="{{$res->id}}">
                <div class="form-data-col">
                    <div class="table1-PFP-small mar-end-1">
                        <img class="" src="/assets/media/pfp/{{ $res->pfp }}" alt="">
                    </div>
                    <small class="text-m2">{{ $res->firstname }} {{ $res->lastname }}</small>
                </div>
                <small class="form-data-col">{{ $res->id }}</small>
                <small class="form-data-col">{{ $res->email }}</small>
                <small class="form-data-col">{{ $res->is_activated ? "Verified" : "Not Verified" }}</small>
                <div class="form-data-col d-flex gap3">
                    <div class="primary-btn-red1 del-res-btn" id="{{$res->id}}"><i class="bi bi-trash3"></i></div>
                    <a href="/AdminViewResidentProfile/{{$res->id}}" class="primary-btn-blue1"><i class="bi bi-eye"></i></a>
                </div>
            </div>
        @endforeach
    </div>
@endif
