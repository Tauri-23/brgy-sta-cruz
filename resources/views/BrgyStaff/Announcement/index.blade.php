<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Brgy Sta. Cruz Makati | Admin</title>

        {{-- Icon --}}
        <link rel="icon" href="/assets/media/logos/brgy_logo.png" type="image/x-icon" />

        <!-- Fonts -->

        <!-- Css -->
        <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="stylesheet" href="/assets/css/elements.css">
        <link rel="stylesheet" href="/assets/css/nav.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <link rel="stylesheet" href="/assets/css/announcements.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- Modals --}}
        <x-modals modalType="info-yn"/>

        <x-modals modalType="success"/>
        <x-modals modalType="error"/>


        {{-- Navs --}}
        <x-navbar navType="admin-page" activeLink="2" pfp="null"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-l1">Announcements</div>
                <a href="/addAnnouncement" class="primary-btn-yellow1">Add Announcement</a>
            </div>

            {{-- Render Announcement --}}
            <div class="d-flex flex-direction-y gap2">
                {{-- Featured Announcement --}}
                @foreach ($announcementsFt as $ann)
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

                        
                        <div class="buttons d-flex flex-direction-y justify-content-center gap1">
                            <a href="/viewAnnouncement/{{$ann->id}}" class="centered-btns primary-btn-yellow1 w-100 d-flex"><i class="bi bi-eye mar-end-3"></i> Preview</a>
                            <a href="editAnnouncement/{{$ann->id}}" class="centered-btns primary-btn-blue1 w-100 d-flex"><i class="bi bi-pen mar-end-3"></i> Edit</a>
                            <a class="centered-btns primary-btn-red1 w-100 delete-announcement-btn d-flex" data-announcement-id="{{$ann->id}}"><i class="bi bi-trash mar-end-3"></i> Delete</a>

                            <input id="announcement-id" type="hidden" value="{{$ann->id}}"/>
                        </div>
                    </div>
                @endforeach

                {{-- Regular Announcements --}}
                <x-admin_render_announcements :announcements="$announcements"/>
            </div>
        </div>

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/announcement.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
