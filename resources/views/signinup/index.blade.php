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
            <form method="post">
                @csrf
                <div class="signin-box mar-bottom-1" id="signin-cont">
                    <div class="text-l1 fw-bold">Signin</div>
                    <div class="d-flex flex-direction-y gap3">
                        <div>
                            <label for="email-in" class="text-m1">Email</label>
                            <input type="text" class="edit-text-1 w-100" id="email-in">
                        </div>
                        <div>
                            <label for="password-in" class="text-m1">Password</label>
                            
                            <div class="position-relative w-100 d-flex align-items-center">
                                <input type="password" class="edit-text-1 w-100 password-input" id="password-in">
                                <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                            </div>
                        </div>
                        <div id="forgot-pass-btn" class="text-decoration-none color-black-2">Forgot Password?</div>
                    </div>
    
                    <div class="d-flex flex-direction-y gap3">
                        <div class="primary-btn-blue1 text-m1 text-center" id="signin-btn">Signin</div>
                        <a href="/signup" class="secondary-btn-blue1 text-m1 text-center color-blue1">Signup</a>
                    </div>
                </div>
            </form>

            {{-- Email Verification --}}
            <form method="post">
                @csrf
                <div class="signin-box mar-bottom-1 d-none" id="email-verification-cont">
                    <div class="text-l1 fw-bold">Email Verification</div>
                    <div class="d-flex flex-direction-y gap3">
                        <div>
                            <label for="otp-in" class="text-m1">Please check your email for the 6-digit code</label>
                            <input type="text" class="edit-text-1 w-100" id="otp-in">
                        </div>
                    </div>
        
                    <div class="d-flex flex-direction-y gap3">
                        <div class="primary-btn-blue1 text-m1 text-center" id="verify-btn">Verify</div>
                        <div class="secondary-btn-blue1 text-m1 text-center color-blue1" id="resend-otp-btn">Resend Code</div>
                    </div>
                </div>
            </form>



            {{-- Forgot Password --}}
            <form method="post">
                @csrf
                <div class="signin-box mar-bottom-1 d-none" id="forgot-password-cont-1">
                    <div class="text-l1 fw-bold">Forgot Password</div>
                    <div class="d-flex flex-direction-y gap3">
                        <div>
                            <label for="forgot-pass-email-in" class="text-m1">Email</label>
                            <input type="text" class="edit-text-1 w-100" id="forgot-pass-email-in">
                        </div>
                    </div>
        
                    <div class="d-flex flex-direction-y gap3">
                        <div class="primary-btn-blue1 text-m1 text-center" id="next-btn">Next</div>
                    </div>
                </div>
            </form>

            <form method="post">
                @csrf
                <div class="signin-box mar-bottom-1 d-none" id="forgot-password-cont-2">
                    <div class="text-l1 fw-bold">Forgot Password</div>
                    <div class="d-flex flex-direction-y gap3">
                        <div>
                            <label for="forgot-pass-otp-in" class="text-m1">Please check your email for the 6-digit code</label>
                            <input type="text" class="edit-text-1 w-100" id="forgot-pass-otp-in">
                        </div>
                    </div>
        
                    <div class="d-flex flex-direction-y gap3">
                        <div class="primary-btn-blue1 text-m1 text-center" id="next-btn">Next</div>
                    </div>
                </div>
            </form>

            <form method="post">
                @csrf
                <div class="signin-box mar-bottom-1 d-none" id="forgot-password-cont-3">
                    <div class="text-l1 fw-bold">Forgot Password</div>
                    <div class="d-flex flex-direction-y gap3">
                        <div>
                            <label for="new-pass-in" class="text-m1">New Password</label>
                            
                            <div class="position-relative w-100 d-flex align-items-center">
                                <input type="password" class="edit-text-1 w-100 password-input" id="new-pass-in">
                                <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                            </div>
                        </div>
                        <div>
                            <label for="con-pass-in" class="text-m1">Confirm Password</label>
                            
                            <div class="position-relative w-100 d-flex align-items-center">
                                <input type="password" class="edit-text-1 w-100 password-input" id="con-pass-in">
                                <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                            </div>
                        </div>
                    </div>
        
                    <div class="d-flex flex-direction-y gap3">
                        <div class="primary-btn-blue1 text-m1 text-center" id="next-btn">Next</div>
                    </div>
                </div>
            </form>
        </div>

        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>

    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/login.js"></script>
    <script src="/assets/js/forgot-password.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
