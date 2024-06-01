<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Brgy Sta. Cruz Makati | Resident</title>

        {{-- Icon --}}
        <link rel="icon" href="/assets/media/logos/brgy_logo.png" type="image/x-icon" />

        <!-- Fonts -->

        <!-- Css -->
        <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="stylesheet" href="/assets/css/elements.css">
        <link rel="stylesheet" href="/assets/css/nav.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <link rel="stylesheet" href="/assets/css/announcements.css">
        <link rel="stylesheet" href="/assets/css/forms.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    </head>
    <body>
        {{-- modals --}}
        <x-modals modalType="success"/>
        <x-modals modalType="error"/>

        {{-- Navs --}}
        <x-navbar navType="resident-page" activeLink="2" pfp="{{$resident->pfp}}"/>
        <x-nav_small_option/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-l1">Announcements</div>
            </div>

            {{-- Render Announcement --}}
            {{-- Featured --}}
            <div class="d-flex flex-direction-y gap2">
                @foreach ($announcementsFt as $ann)
                    <a href="/residentViewAnnouncement/{{$ann->id}}" class="announcement-cont d-flex gap1 announcement-column text-decoration-none color-black">
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
            </div>

            <div class="d-flex gap1">
                <div class="d-flex flex-direction-y w-75 gap2" id="announcement-cont">
                    <x-resident_render_announcements :announcements="$announcements"/>
                </div>
                <div class="d-flex flex-direction-y w-75 gap2 d-none" id="result-announcement-cont">

                </div>
                <div class="long-cont d-flex align-self-start flex-direction-y w-25 gap3">
                    <input type="text" id="search-in" class="edit-text-1 w-100" placeholder="Search title">
                    <select id="sort-in" class="edit-text-1 w-100">
                        <option value="new-old">Latest - Oldest</option>
                        <option value="old-new">Oldest - Latest</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/announcement.js"></script>
    <script>
        const announcements = {!! json_encode($announcements) !!};
    </script>
    <script src="/assets/js/resident-announcement.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
