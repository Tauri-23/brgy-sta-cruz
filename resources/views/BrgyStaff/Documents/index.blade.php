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
        <link rel="stylesheet" href="/assets/css/documents.css">
        <link rel="stylesheet" href="/assets/css/tables.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- Modals --}}
        <x-modals modalType="info-yn"/>

        <x-modals modalType="success"/>
        <x-modals modalType="error"/>


        {{-- Navs --}}
        <x-navbar navType="admin-page" activeLink="4" pfp="null"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-l1">Document Requests</div>
            </div>

            <div class="long-cont-nopadding d-flex gap1">
                <div class="mini-nav-link active" id="pending-btn">Pending  ({{$docReqPending->count() + $docReqBrgyIdsPending->count()}})</div>
                <div class="mini-nav-link" id="FP-btn">On Process ({{$docReqFP->count() + $docReqBrgyIdsFP->count()}})</div>
                <div class="mini-nav-link" id="rejected-btn">Rejected</div>
                <div class="mini-nav-link" id="completed-btn">Completed</div>
            </div>
    
            {{-- Render Document Requests --}}
            <div class="long-cont d-flex align-items-center" id="pending-cont">
                <x-render_doc_req :docReq="$docReqPending" :docReqBrgyId="$docReqBrgyIdsPending" mode="pending" user="admin"/>                
            </div>

            <div class="long-cont d-flex align-items-center d-none" id="to-be-pickup-cont">
                <x-render_doc_req :docReq="$docReqFP" :docReqBrgyId="$docReqBrgyIdsFP" mode="for-pickup" user="admin"/>                
            </div>

            <div class="long-cont d-flex align-items-center d-none" id="completed-cont">
                <x-render_doc_req :docReq="$docReqRejected" :docReqBrgyId="$docReqBrgyIdsRejected" mode="rejected" user="admin"/>                
            </div>

            <div class="long-cont d-flex align-items-center d-none" id="rejected-cont">
                <x-render_doc_req :docReq="$docReqCompleted" :docReqBrgyId="$docReqBrgyIdsCompleted" mode="completed" user="admin"/>                
            </div>
        </div>

        


        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    {{-- chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  

    <script src="/assets/js/admin-documents.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
