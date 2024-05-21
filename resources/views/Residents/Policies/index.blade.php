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
        <x-navbar navType="resident-page" activeLink="5" pfp="{{$resident->pfp}}"/>
        <x-nav_small_option/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="text-l1">Policies and Ordinances</div>

            <div class="d-flex flex-direction-y gap1" style="padding: 0 100px;">

                <div class="d-flex justify-content-between">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">Barangay Policies and Ordinances</div>
                            <div class="text-l3">The barangay's policies and ordinances that ensure a well-sustained and peaceful community.</div>
                        </div>
                    </div>
                    <img src="/assets/media/illustrations/security1.svg" class="w-25" alt="">
                </div>

                <div class="d-flex justify-content-between">
                    <img src="/assets/media/illustrations/electric-car1.svg" class="w-25" alt="">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">ORDINANCE NO. 01-06</div>
                            <div class="text-l3">
                                June 05, 2006 - An ordinance requiring car stickers on vehicles of 
                                Barangay Santa Cruz residents for proper control and identification with penalties thereof.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">ORDINANCE NO. 01-10</div>
                            <div class="text-l3">
                                February 04, 2010 - An ordinance increasing the dues/fees of Barangay clearances.
                            </div>
                        </div>
                    </div>
                    <img src="/assets/media/illustrations/man-receipt1.svg" class="w-25" alt="">
                </div>

                <div class="d-flex justify-content-between">
                    <img src="/assets/media/illustrations/girl-notify1.svg" class="w-25" alt="">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">ORDINANCE NO. 009-2013</div>
                            <div class="text-l3">
                                December 07, 2013 - An ordinance re-affirming ordinance No. 002-2012 passed, 
                                an ordinance declaring Panama Street as "One Side Parking" and charging corresponding fees for the use thereof.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">ORDINANCE NO. 002-2015</div>
                            <div class="text-l3">
                                February 10, 2015 - An ordinance reaffirming Ordinance No. 004-2012, 
                                an ordinance enacting the charging of fees for the use of facilities of the Barangay.
                            </div>
                        </div>
                    </div>
                    <img src="/assets/media/illustrations/home1.svg" class="w-25" alt="">
                </div>

                <div class="d-flex justify-content-between">
                    <img src="/assets/media/illustrations/woman-throw-down1.svg" class="w-25" alt="">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">ORDINANCE NO. 015-2017</div>
                            <div class="text-l3">
                                December 4, 2017 - An ordinance establishing the dues/fees for Issurance of Demolition, 
                                Excavation and Building New Construction & Renovation Permits.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">ORDINANCE NO. 001-2018</div>
                            <div class="text-l3">
                                February 5, 2018 - An ordinance standardalizing the Barangay Clearance of all legitimate 
                                cooperatives operating within Barangay Santa Cruz in the amount of One Hundred Fifty Pesos (150.00php), 
                                persuant to City Resolution No. 2017-039.
                            </div>
                        </div>
                    </div>
                    <img src="/assets/media/illustrations/man-receipt1.svg" class="w-25" alt="">
                </div>

                <div class="d-flex justify-content-between">
                    <img src="/assets/media/illustrations/man-contract1.svg" class="w-25" alt="">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">ORDINANCE NO. 003-2019</div>
                            <div class="text-l3">
                                March 4, 2019 - An ordinance to increase the filing fees due 
                                filing of formal complaint under the Lupon Tagapamayapa Cases filed.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="long-cont w-50 text-center d-flex align-items-center">
                        <div>
                            <div class="text-l1 fw-bold">CITY ORDINANCE NO. 2018-090</div>
                            <div class="text-l3">
                                AN ORDINANCE PROHIBITING EXCESSIVE, UNNECESSARY, AND UNUSUALLY LOUD SOUNDS GENERATED FROM NOISE PRODUCING EQUIPMENT AND CONTRIVANCES, 
                                AND OTHER FORMS OF NOISE POLLUTION WITHIN THE CITY OF MAKATI, AND FURTHER PROVIDING PENALTIES FOR VIOLATIONS THEREOF, 
                                SUBJECT TO ALL LAWS AND EXISTING LEGAL RULES AND REGULATIONS.
                            </div>
                        </div>
                    </div>
                    <img src="/assets/media/illustrations/partying1.svg" class="w-25" alt="">
                </div>

            </div>

        </div>

        {{-- footer --}}
        <x-footer/>

        
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
