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
        
        {{-- Navs --}}
        <x-navbar navType="landing-page" activeLink="7" pfp="null"/>

        {{-- Content --}}
        <div class="d-flex justify-content-center padding-top-1 padding-bottom-1">

            {{-- Signup --}}
            <div class="signup-box mar-bottom-1" id="signup-box">
                <div class="text-l1 fw-bold">Sign Up</div>
                <div class="d-flex flex-direction-y gap3">

                    <div class="d-flex gap3 w-100">
                        <div class="flex-grow-1">
                            <label for="fname-in" class="text-m1">Firstname</label>
                            <input type="text" class="edit-text-1 w-100" id="fname-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="mname-in" class="text-m1">Middlename <span class="text-m3">(optional)</span></label>
                            <input type="text" class="edit-text-1 w-100" id="mname-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="lname-in" class="text-m1">Lastname</label>
                            <input type="text" class="edit-text-1 w-100" id="lname-in">
                        </div>
                    </div>

                    <div class="d-flex gap3 w-100">
                        <div class="flex-grow-1">
                            <label for="email-in" class="text-m1">Email</label>
                            <input type="text" class="edit-text-1 w-100" id="email-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="phone-in" class="text-m1">Contact</label>
                            <input type="text" maxlength="10" class="edit-text-1 w-100" id="phone-in">
                        </div>
                    </div>

                    <div class="d-flex gap3 w-100">
                        <div class="flex-grow-1">
                            <label for="bdate-in" class="text-m1">Birthdate</label>
                            <input type="date" class="edit-text-1 w-100" id="bdate-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="gender-in" class="text-m1">Gender</label>
                            <select class="edit-text-1 w-100" id="gender-in">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap3 w-100">
                        <div class="flex-grow-1">
                            <label for="pass-in" class="text-m1">Password</label>
                            
                            <div class="position-relative w-100 d-flex align-items-center">
                                <input type="password" class="edit-text-1 w-100 password-input" id="pass-in">
                                <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <label for="con-pass-in" class="text-m1">Confirm Password</label>
                            
                            <div class="position-relative w-100 d-flex align-items-center">
                                <input type="password" class="edit-text-1 w-100 password-input" id="con-pass-in">
                                <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap3 w-100">
                        <div class="flex-grow-1">
                            <label for="address-in" class="text-m1">Address</label>
                            <input type="text" class="edit-text-1 w-100" id="address-in">
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-direction-y gap3">
                    <div class="primary-btn-blue1 text-m1 text-center" id="signup-btn1">Sign Up</div>
                    <div class="text-center">Already have an account? <a class="text-decoration-none fw-bold color-black-2" href="/signin">Sign In</a></div>
                </div>
            </div>

        </div>
        

        {{-- footer --}}
        <x-footer/>

        
    </body>

    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
