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
        <link rel="stylesheet" href="/assets/css/tables.css">
        <link rel="stylesheet" href="/assets/css/forms.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- Modals --}}
        <x-modals modalType="add-admin"/>
        <x-modals modalType="change-role-admin"/>
        <x-modals modalType="info-yn"/>

        <x-modals modalType="success"/>
        <x-modals modalType="error"/>


        {{-- Navs --}}
        <x-navbar navType="admin-page" activeLink="6" pfp="null"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-l1">Admins</div>
                <div class="primary-btn-blue1" id="add-admin-btn">Add Admin</div>
            </div>

            {{-- Render Residents --}}
            <div class="d-flex flex-direction-y gap2">
                <x-render_admins :admins="$admins"/>
            </div>
        </div>

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script>
        const admins = {!! json_encode($admins) !!};
    </script>
    <script src="/assets/js/monitor-admins.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
