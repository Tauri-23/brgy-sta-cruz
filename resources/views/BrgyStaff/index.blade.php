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
        <link rel="stylesheet" href="/assets/css/landing-page.css">
        <link rel="stylesheet" href="/assets/css/forms.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- Modals --}}
        <x-modals modalType="livesteam-start"/>
        <x-modals modalType="info-yn"/>

        <x-modals modalType="success"/>
        <x-modals modalType="error"/>
        

        {{-- Navs --}}
        <x-navbar navType="admin-page" activeLink="1" pfp="null"/>

        {{-- Content --}}
        <div class="banner-cont">

            {{-- Embed Live --}}
            @if ($livestream->is_live)
                <div class="live-cont-main">
                    <iframe
                    class="live-cont"
                    src="https://www.facebook.com/plugins/video.php?href={{$livestream->link}}&controls=1"
                    frameborder="0"
                    scrolling="no"
                    allowfullscreen="true"
                    height="1000px"
                    width="100%">
                    </iframe>
                    
                    <div class="d-flex gap3">
                        <div class="primary-btn-red1" id="stop-streaming-btn"><i class="bi bi-stop-circle"></i> Stop Streaming</div>
                    </div>
                </div>
            @else
            <div class="live-cont-main">
                <div class="primary-btn-blue1 d-flex gap3 align-items-center" id="start-streaming-btn"><i class="bi bi-cast"></i>Start Streaming</div>
            </div>
                
            @endif
            

            <div class="mySlides fade">
                <img src="/assets/media/home-cover/brgy_hall.png" class='banners'>
            </div>
            <div class="mySlides fade">
                <img src="/assets/media/home-cover/2.jpg" class='banners'>
            </div>
            <div class="mySlides fade">
                <img src="/assets/media/home-cover/3.jpg" class='banners'>
            </div>  
          
        </div>


        {{-- News --}}
        <div class="news-cont">
            <div class="text-l1">Barangay Sta. Cruz Latest News</div>

            {{-- Render Announcements here --}}
            <div class="news-cont1">
                <x-render_announcement_2 :announcements="$announcementsFt" userType="Admin"/>
                <x-render_announcement_2 :announcements="$announcements" userType="Admin"/>              
            </div>

            <a href="" class="primary-btn-blue1 text-l3 m-auto">See More</a>
            
        </div>

        <div class="line1"></div>

        {{-- Services --}}
        <div class="services-cont">
            <div class="text-l1">Services</div>

            {{-- Render Services Here --}}
            <div class="services-cont1">
                <div class="service-box">
                    <div class="service-pfp">
                        <img class="position-absolute h-100" src="/assets/media/services-img/VAW.jpg" alt="service-picture">
                    </div>
                    <div class="service-txt">
                        Violence Against Women and Children
                    </div>
                </div>

                <div class="service-box">
                    <div class="service-pfp">
                        <img class="position-absolute h-100" src="/assets/media/services-img/stonino.jpg" alt="service-picture">
                    </div>
                    <div class="service-txt">
                        Santo Nino
                    </div>
                </div>

                <div class="service-box">
                    <div class="service-pfp">
                        <img class="position-absolute h-100" src="/assets/media/services-img/4ps.png" alt="service-picture">
                    </div>
                    <div class="service-txt">
                        4 P's
                    </div>
                </div>

                <div class="service-box">
                    <div class="service-pfp">
                        <img class="position-absolute h-100" src="/assets/media/services-img/katarungan.jpg" alt="service-picture">
                    </div>
                    <div class="service-txt">
                        Katarungan
                    </div>
                </div>
            </div>
        </div>

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/landing-page.js"></script>
    <script src="/assets/js/livestream.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
