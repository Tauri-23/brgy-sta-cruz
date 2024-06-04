@if ($announcements->count() < 1)
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/empty1.svg">  
            <div class="text-l3 text-center">No Records</div>
        </div>
    </div>
@else
    @foreach ($announcements as $ann)
        <div class="announcement-cont d-flex gap1 announcement-column">
            <div class="pic-square1 d-flex justify-content-center">
                <img class="position-absolute h-100" src="/assets/media/announcement/{{$ann->pic}}"/>
            </div>


            <div class="announcement-prev-text">
                <div class="">
                    <small class="text-l3 fw-bold">{{$ann->title}}</small>
                    {!!$ann->featured ? '<span class="badge mar-start-4 bg-yellow1">Featured</span>' : ''!!}
                    <div class="text-m3">{{\Carbon\Carbon::parse($ann->created_at)->format('M d, Y g:i a')}}</div>
                </div>
                <div class="announcement-prev-content text-m2">{!! $ann->content !!}</div>
            </div>

            
            <div class="buttons d-flex flex-direction-y justify-content-center gap2">
                <a href="/viewAnnouncement/{{$ann->id}}" class="centered-btns primary-btn-yellow1 w-100 d-flex"><i class="bi bi-eye mar-end-3"></i> Preview</a>
                <a href="editAnnouncement/{{$ann->id}}" class="centered-btns primary-btn-blue1 w-100 d-flex"><i class="bi bi-pen mar-end-3"></i> Edit</a>
                <a class="centered-btns primary-btn-red1 w-100 delete-announcement-btn d-flex" data-announcement-id="{{$ann->id}}"><i class="bi bi-trash mar-end-3"></i> Delete</a>

                <input id="announcement-id" type="hidden" value="{{$ann->id}}"/>
            </div>
        </div>
    @endforeach
@endif