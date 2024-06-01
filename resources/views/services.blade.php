<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Brgy Sta. Cruz Makati</title>

        {{-- Icon --}}
        <link rel="icon" href="/assets/media/logos/brgy_logo.png" type="image/x-icon" />

        <!-- Fonts -->

        <!-- Css -->
        <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="stylesheet" href="/assets/css/elements.css">
        <link rel="stylesheet" href="/assets/css/nav.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <link rel="stylesheet" href="/assets/css/landing-page.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- Navs --}}
        <x-navbar navType="landing-page" activeLink="3" pfp="null"/>

        {{-- Content --}}      
        <div class="content1">
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
        </div>

        {{-- footer --}}
        <x-footer/>

        
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
