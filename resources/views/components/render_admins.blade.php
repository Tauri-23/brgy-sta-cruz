@if ($admins->count() < 1) 
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Admins</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <small class="text-m2 form-data-col">ID</small>
            <small class="text-m2 form-data-col">Name</small>            
            <small class="text-m2 form-data-col">Email</small>
            <small class="text-m2 form-data-col">Type</small>
            <small class="text-m2 form-data-col">Actions</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($admins as $adm)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} resident-column" id="{{$adm->id}}">
                <small class="form-data-col">{{ $adm->id }}</small>
                <small class="form-data-col">{{ $adm->name }}</small>                
                <small class="form-data-col">{{ $adm->email }}</small>
                <small class="form-data-col">{{ $adm->admin_type}}</small>
                <div class="form-data-col d-flex gap3">
                    <div class="primary-btn-red1 del-adm-btn" id="{{$adm->id}}"><i class="bi bi-trash3"></i></div>
                    <div class="primary-btn-blue1 change-role-btn" id="{{$adm->id}}">Change Role</div>
                </div>
            </div>
        @endforeach
    </div>
@endif
