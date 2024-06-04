@if ($feedbacks->count() < 1) 
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/empty1.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Feedbacks</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <small class="text-m2 form-data-col">ID</small>
            <small class="text-m2 form-data-col">Feedback</small>
            <small class="text-m2 form-data-col">Date</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($feedbacks as $fdbk)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} resident-column" id="{{$fdbk->id}}">
                <small class="form-data-col">{{ $fdbk->id }}</small>
                <small class="form-data-col">{{ $fdbk->content }}</small>
                <small class="form-data-col">{{ \Carbon\Carbon::parse($fdbk->created_at)->format('M d, Y g:i a') }}</small>
            </div>
        @endforeach
    </div>
@endif
