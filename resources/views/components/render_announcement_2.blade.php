@if ($announcements->count() < 1)
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/empty1.svg">  
            <div class="text-l3 text-center">No Records</div>
        </div>
    </div>
@else
    @foreach ($announcements as $ann)
        @if ($userType == "Public")
            <a href="/publicViewAnnouncement/{{$ann->id}}" class="news-box text-decoration-none color-black-2">
                <div class="news-box-pfp">
                    <img class="position-absolute h-100" src="/assets/media/announcement/{{$ann->pic}}"/>
                </div>
                <div class="news-box-txt">
                    <div class="text-l2">{{$ann->title}}</div>
                    <div class="text-m1">{{\Carbon\Carbon::parse($ann->created_at)->format('M d, Y g:i a')}}</div>
                </div>
            </a>
        @elseif($userType == "Resident")
            <a href="/residentViewAnnouncement/{{$ann->id}}" class="news-box text-decoration-none color-black-2">
                <div class="news-box-pfp">
                    <img class="position-absolute h-100" src="/assets/media/announcement/{{$ann->pic}}"/>
                </div>
                <div class="news-box-txt">
                    <div class="text-l2">{{$ann->title}}</div>
                    <div class="text-m1">{{\Carbon\Carbon::parse($ann->created_at)->format('M d, Y g:i a')}}</div>
                </div>
            </a>
        @else
            <a href="/viewAnnouncement/{{$ann->id}}" class="news-box text-decoration-none color-black-2">
                <div class="news-box-pfp">
                    <img class="position-absolute h-100" src="/assets/media/announcement/{{$ann->pic}}"/>
                </div>
                <div class="news-box-txt">
                    <div class="text-l2">{{$ann->title}}</div>
                    <div class="text-m1">{{\Carbon\Carbon::parse($ann->created_at)->format('M d, Y g:i a')}}</div>
                </div>
            </a>
        @endif
    @endforeach
@endif