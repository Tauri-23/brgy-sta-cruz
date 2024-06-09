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
        <link rel="stylesheet" href="/assets/css/tables.css">

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
        <x-navbar navType="resident-page" activeLink="3" pfp="{{$resident->pfp}}"/>
        <x-nav_small_option/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-l1">Document Applications</div>
            </div>
            <div class="long-cont-nopadding d-flex gap1">
                <div class="mini-nav-link active" id="req-a-doc-btn">Request a Document</div>
                <div class="mini-nav-link" id="pending-btn">Pending</div>
                <div class="mini-nav-link" id="for-pickup-btn">On Process</div>
                <div class="mini-nav-link" id="rejected-btn">Rejected</div>
                <div class="mini-nav-link" id="completed-btn">Completed</div>
            </div>

            {{-- Request a Document --}}
            <div class="long-cont d-flex align-items-center" id="add-doc-cont">
                <div class="req-a-doc-illustration">
                    <img class="" src="/assets/media/illustrations/form-select.svg" alt="">
                </div>
                <div class="req-a-doc-form d-flex flex-direction-y gap2">

                    <select class="edit-text-1 w-100" id="doctype-in">
                        <option value="invalid">Select Document</option>
                        @foreach ($documentTypes as $doc)
                            <option value="{{$doc->id}}">{{$doc->document_name}}</option>
                        @endforeach
                    </select>

                    <div class="reqssec d-flex">
                        <div>
                            <div class="text-l2" style="font-weight:600; margin-bottom:1rem;">Requirements</div>
                            <div id="requirements-cont">
                                
                            </div>
                        </div>
                    </div>

                    <div class="primary-btn-blue1 text-center d-none" id="request-document-btn">Request Document Now</div>
                </div>
            </div>



            {{-- Pending Documents --}}
            <div class="long-cont d-flex align-items-center d-none" id="pending-cont">
                <x-render_doc_req :docReq="$docReqPending" :docReqBrgyId="$docReqBrgyIdsPending" mode="pending" user="resident"/>             
            </div>

            {{-- On Process Documents --}}
            <div class="long-cont d-flex align-items-center d-none" id="for-pickup-cont">
                <x-render_doc_req :docReq="$docReqFP" :docReqBrgyId="$docReqBrgyIdsFP" mode="for-pickup" user="resident"/>
            </div>

            {{-- Rejected Documents --}}
            <div class="long-cont d-flex align-items-center d-none" id="rejected-cont">
                <x-render_doc_req :docReq="$docReqRejected" :docReqBrgyId="$docReqBrgyIdsRejected" mode="rejected" user="resident"/>    
            </div>

            {{-- Completed Documents --}}
            <div class="long-cont d-flex align-items-center d-none" id="completed-cont">
                <x-render_doc_req :docReq="$docReqCompleted" :docReqBrgyId="$docReqBrgyIdsCompleted" mode="completed" user="resident"/>
            </div>



        </div>

        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const docTypesRequirements = {!! json_encode($document_requirements) !!}
    </script>
    <script src="/assets/js/documents-application.js"></script>
</html>
