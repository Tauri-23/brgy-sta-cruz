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
        <link rel="stylesheet" href="/assets/css/forms.css">
        <link rel="stylesheet" href="/assets/css/documents.css">
        <link rel="stylesheet" href="/assets/css/document-preview.css">

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
        <x-modals modalType="info-yn"/>
        <x-modals modalType="info-yn"/>

        {{-- Preview --}}
        <div class="document-preview-cont d-none" id="brgy-id-cont">
            <div class="brgy-id">
                <div class="text-l2 text-center mar-bottom-1">Barangay I.D. Preview</div>

                <div>
                    <img class="brgy-id-front" src="/assets/media/documents/BRGY-ID-FRONT.png" alt="">
                    <div class="text-m1 brgy-id-name">Resident Name</div>
                    <img class="brgy-id-pfp" src="/assets/media/pfp/defaultPFP.png" alt="">
                </div>
                <div>
                    <img class="brgy-id-front" src="/assets/media/documents/BRGY-ID-BACK.png" alt="">
                    <div class="text-m3 brgy-id-address"></div>
                    <div class="text-m3 brgy-id-phone"></div>
                    <div class="text-m3 brgy-id-TIN">000-000-000-000</div>
                    <div class="text-m3 brgy-id-SSS">33-7913734-2</div>
                    <div class="text-m3 brgy-id-bdate">04 23, 2003</div>
                    <div class="text-m3 brgy-id-place-bdate">Bicol</div>
                    <div class="text-m3 brgy-id-blood-type">O+</div>
                </div>
                
                <div class="d-flex gap3 mar-top-1">
                    <div class="primary-btn-yellow1 w-50 text-center cancel-btn">Cancel</div>
                    <div class="primary-btn-blue1 w-50 text-center approve-btn">Approve</div>
                </div>
            </div>
        </div>

        <div class="document-preview-cont d-none" id="brgy-clearance-cont">
            <div class="brgy-id">
                <div class="text-l2 text-center mar-bottom-1">Barangay Clearance Preview</div>

                <div>
                    <img class="brgy-clearance-front" src="/assets/media/documents/CLEARANCE-FRONT-CLEAN.png" alt="">
                    <div class="brgy-clearance-name">Resident Name</div>
                    <div class="brgy-clearance-address">Address</div>
                </div>
                
                <div class="d-flex gap3 mar-top-1">
                    <div class="primary-btn-yellow1 w-50 text-center cancel-btn">Cancel</div>
                    <div class="primary-btn-blue1 w-50 text-center approve-btn">Approve</div>
                </div>
            </div>
        </div>

        {{-- Navs --}}
        <x-navbar navType="resident-page" activeLink="3" pfp="{{$resident->pfp}}"/>
        <x-nav_small_option/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="text-l1">Request Form {{$documentType->document_name}}</div>

            <div class="long-cont d-flex flex-direction-y gap2">
                <div class="d-flex d-flex gap2">
                    {{-- Info --}}
                    @if ($documentType->id == 2)
                        <x-brgy_id_form :resident="$resident"/>
                    @else
                        <div class="w-50 d-flex flex-direction-y gap3">
                            <div>
                                <label for="name-in" class="text-l3">Name</label>
                                <input type="text" class="edit-text-1 w-100" id="name-in" value="{{$resident->firstname}} {{$resident->lastname}}" disabled>
                            </div>
                            <div>
                                <label for="address-in" class="text-l3">Address</label>
                                <input type="text" class="edit-text-1 w-100" id="address-in" value="{{$resident->address}}" disabled>
                            </div>
                            <div>
                                <label for="phone-in" class="text-l3">Phone</label>
                                <input type="text" maxlength="10" class="edit-text-1 w-100" id="phone-in" value="{{$resident->phone}}" disabled>
                            </div>
                            <div>
                                <label for="bdate-in" class="text-l3">Birth Date</label>
                                <input type="date" class="edit-text-1 w-100" id="bdate-in" value="{{$resident->bdate}}" disabled>
                            </div>
                            <div>
                                <label for="gender-in" class="text-l3">Gender</label>
                                <select class="edit-text-1 w-100" id="gender-in">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    

                    {{-- Requirements --}}
                    <div class="w-50 d-flex flex-direction-y gap3">
                        @foreach ($document_requirements as $req)
                            <div>
                                <input type="hidden" class="requirements-for" value="{{$req->id}}">
                                <label class="text-l3">{{$req->requirement}}</label>
                                <input type="file" class="edit-text-1 w-100 req-in">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="primary-btn-blue1" id="submit-form">Submit</div>
                </div>
            </div>

            
            
        </div>

        
        

        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const documentType = {!! json_encode($documentType->id) !!}
    </script>
    <script src="/assets/js/documents-form.js"></script>
</html>