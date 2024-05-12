<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Brgy Sta. Cruz Makati | Documents</title>

        {{-- Icon --}}
        <link rel="icon" href="/assets/media/logos/brgy_logo.png" type="image/x-icon" />

        <!-- Fonts -->

        <!-- Css -->
        <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="stylesheet" href="/assets/css/elements.css">
        <link rel="stylesheet" href="/assets/css/nav.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <link rel="stylesheet" href="/assets/css/profile.css">
        <link rel="stylesheet" href="/assets/css/forms.css">

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

        <x-modals modalType="patient-edit-name"/>
        <x-modals modalType="patient-edit-email"/>
        <x-modals modalType="patient-edit-password"/>
        <x-modals modalType="patient-edit-phone"/>
        <x-modals modalType="patient-edit-address"/>

        {{-- Navs --}}
        <x-navbar navType="resident-page" activeLink="0" pfp="{{$resident->pfp}}"/>
        <x-nav_small_option/>

        {{-- Content --}}
        <div class="content1 d-flex justify-content-center">
            
            <div class="profile-cont">
                <div class="d-flex flex-direction-y gap2">
                    <div class="profile-pfp">
                        <img src="/assets/media/pfp/{{$resident->pfp}}" alt="">
                    </div>

                    <div>
                        <div class="primary-btn-blue1 text-center">Change Picture</div>
                    </div>
                </div>

                <div class="d-flex flex-direction-y gap2">
                    <div>
                        <div class="text-m2">Full Name</div>
                        <div class="d-flex w-100 justify-content-between gap1 align-items-center">
                            <div class="text-l2">{{$resident->firstname}} {{$resident->middletname}} {{$resident->lastname}}</div>
                            <i class="bi bi-pen cursor-pointer" id="edit-name-btn"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-m2">Email</div>
                        <div class="d-flex w-100 justify-content-between gap1 align-items-center">
                            <div class="text-l2">{{$resident->email}}</div>
                            <i class="bi bi-pen cursor-pointer" id="edit-email-btn"></i>
                        </div>
                    </div>

                    <div>
                        <div class="text-m2">Password</div>
                        <div class="d-flex w-100 justify-content-between gap1 align-items-center">
                            <input type="password" class="text-l2 edit-text-disabled" id="" value="{{$resident->password}}" disabled>
                            <i class="bi bi-pen cursor-pointer" id="edit-pass-btn"></i>
                        </div>
                    </div>

                    <div>
                        <div class="text-m2">Phone</div>
                        <div class="d-flex w-100 justify-content-between gap1 align-items-center">
                            <div class="text-l2">+63 {{$resident->phone}}</div>
                            <i class="bi bi-pen cursor-pointer" id="edit-phone-btn"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-m2">Address</div>
                        <div class="d-flex w-100 justify-content-between gap1 align-items-center">
                            <div class="text-l2">{{$resident->address}}</div>
                            <i class="bi bi-pen cursor-pointer" id="edit-address-btn"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-m2">Birth Date</div>
                        <div class="d-flex w-100 justify-content-between gap1 align-items-center">
                            <div class="text-l2">{{\Carbon\Carbon::parse($resident->bdate)->format('M d, Y')}}</div>
                        </div>
                    </div>
                    <div>
                        <div class="text-m2">Gender</div>
                        <div class="d-flex gap3">
                            <div class="text-l3">{{$resident->gender}}</div>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
            </div>

        </div>

        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script>
        const residentId = {!! json_encode($resident->id) !!};

        const oldFname = {!! json_encode($resident->firstname) !!};
        const oldMname = {!! json_encode($resident->middletname) !!};
        const oldLname = {!! json_encode($resident->lastname) !!};

        const oldEmail = {!! json_encode($resident->email) !!};

        const oldPass = {!! json_encode($resident->password) !!};

        const oldPhone = {!! json_encode($resident->phone) !!};

        const oldAddress = {!! json_encode($resident->address) !!};
    </script>
    <script src="/assets/js/resident-profile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</html>
