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
        {{-- modals --}}
        <x-modals modalType="success"/>
        <x-modals modalType="error"/>

        {{-- Navs --}}
        <x-navbar navType="landing-page" activeLink="6" pfp="null"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="text-l1">Contact</div>

            <div class="d-flex justify-content-center gap1">
                <div class="d-flex flex-direction-y gap2">
                    <div class="text-l2">Contact Information</div>
                    <div class="d-flex gap1">
                        <div class="text-center flex-grow-1">
                            <img src="/assets/media/icons/facebook.svg" style="width: 150px; height: 150px;">
                            <div class="text-l3">Facebook Page</div>
                        </div>
                        <div class="text-center flex-grow-1">
                            <img src="/assets/media/icons/address.svg" style="width: 150px; height: 150px;">
                            <div class="text-l3">Our Address</div>
                            <div class="text-l3">3310 Zapote, Makati City, Metro Manila</div>
                        </div>
                    </div>

                    <div class="d-flex gap1">
                        <div class="text-center flex-grow-1">
                            <img src="/assets/media/icons/landline.svg" style="width: 150px; height: 150px;">
                            <div class="text-l3">By Phone</div>
                            <div class="text-l3">Call/Text: (+63)9123456789</div>
                        </div>
                        <div class="text-center flex-grow-1">
                            <img src="/assets/media/icons/email.svg" style="width: 150px; height: 150px;">
                            <div class="text-l3">Email Us</div>
                            <div class="text-l3">barangaysantacruz01@gmail.com</div>
                        </div>
                    </div>
                </div>

                <img src="/assets/media/map.png" alt="" style="width: 500px; height: 500px;">
            </div>
        </div>



        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
