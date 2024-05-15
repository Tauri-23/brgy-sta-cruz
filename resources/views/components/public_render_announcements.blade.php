@if ($announcements->count() < 1)
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/empty1.svg">  
            <div class="text-l3 text-center">No Records</div>
        </div>
    </div>
@else
    @foreach ($announcements as $ann)
        <a href="/publicViewAnnouncement/{{$ann->id}}" class="announcement-cont d-flex gap1 announcement-column text-decoration-none color-black">
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
        </a>
    @endforeach
@endif