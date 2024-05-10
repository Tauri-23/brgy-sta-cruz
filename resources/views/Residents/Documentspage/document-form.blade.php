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

        {{-- Navs --}}
        <x-navbar navType="resident-page" activeLink="3" pfp="{{$resident->pfp}}"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="text-l1">Request Form {{$documentType->document_name}}</div>

            <div class="long-cont d-flex flex-direction-y gap2">
                <div class="d-flex d-flex gap2">
                    {{-- Info --}}
                    <div class="w-50 d-flex flex-direction-y gap3">
                        <div>
                            <label for="name-in" class="text-l3">Name</label>
                            <input type="text" class="edit-text-1 w-100" id="name-in">
                        </div>
                        <div>
                            <label for="address-in" class="text-l3">Address</label>
                            <input type="text" class="edit-text-1 w-100" id="address-in">
                        </div>
                        <div>
                            <label for="phone-in" class="text-l3">Phone</label>
                            <input type="text" maxlength="10" class="edit-text-1 w-100" id="phone-in">
                        </div>
                        <div>
                            <label for="bdate-in" class="text-l3">Birth Date</label>
                            <input type="date" class="edit-text-1 w-100" id="bdate-in">
                        </div>
                        <div>
                            <label for="gender-in" class="text-l3">Gender</label>
                            <select class="edit-text-1 w-100" id="gender-in">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

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
