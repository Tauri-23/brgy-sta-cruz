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

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-l1">Document Applications</div>
            </div>
            <div class="long-cont-nopadding d-flex gap1">
                <div class="mini-nav-link active" id="req-a-doc-btn">Request a Document</div>
                <div class="mini-nav-link" id="pending-btn">Pending</div>
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

                    <div class="d-flex">
                        <div>
                            <div class="text-l3">Requirements</div>
                            <div id="requirements-cont">
                                
                            </div>
                        </div>
                    </div>

                    <div class="primary-btn-blue1 text-center d-none" id="request-document-btn">Request Document Now</div>
                </div>
            </div>

            {{-- Pending Documents --}}
            <div class="long-cont d-flex align-items-center" id="pending-cont">
                @if ($documentsPending->count() < 1 && $documentsBrgyIdPending->count() < 1)
                    <div class="placeholder-illustrations">
                        <div class="d-flex flex-direction-y gap2">
                            <img src="/assets/media/illustrations/empty1.svg">  
                            <div class="text-l3 text-center">No Records</div>
                        </div>
                    </div>
                @else
                    <div class="table1">
                        <div class="table1-header">
                            <small class="text-m2 form-data-col">Resident Name</small>
                            <small class="text-m2 form-data-col">Document</small>
                            <small class="text-m2 form-data-col">Date Requested</small>
                            <small class="text-m2 form-data-col">Status</small>
                        </div>
                
                
                        @foreach ($documentsPending as $doc)
                            <a href="/ResidentRequestDocumentPreview/{{$doc->id}}/others" class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doc->id}}">
                                <small class="form-data-col">{{$doc->name}}</small>
                                <small class="form-data-col">{{$doc->document_types()->first()->document_name}}</small>
                                <small class="form-data-col">{{$doc->created_at}}</small>
                                <small class="form-data-col">{{$doc->status}}</small>
                            </a>
                        @endforeach
                        @foreach ($documentsBrgyIdPending as $doc)
                            <a href="/ResidentRequestDocumentPreview/{{$doc->id}}/brgyId" class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doc->id}}">
                                <small class="form-data-col">{{$doc->name}}</small>
                                <small class="form-data-col">{{$doc->document_types()->first()->document_name}}</small>
                                <small class="form-data-col">{{$doc->created_at}}</small>
                                <small class="form-data-col">{{$doc->status}}</small>
                            </a>
                        @endforeach
                    </div>
                @endif                
            </div>





            {{-- Rejected Documents --}}
            <div class="long-cont d-flex align-items-center" id="rejected-cont">
                @if ($documentsPending->count() < 1 && $documentsBrgyIdPending->count() < 1)
                    <div class="placeholder-illustrations">
                        <div class="d-flex flex-direction-y gap2">
                            <img src="/assets/media/illustrations/empty1.svg">  
                            <div class="text-l3 text-center">No Records</div>
                        </div>
                    </div>
                @else
                    <div class="table1">
                        <div class="table1-header">
                            <small class="text-m2 form-data-col">Resident Name</small>
                            <small class="text-m2 form-data-col">Document</small>
                            <small class="text-m2 form-data-col">Date Rejected</small>
                            <small class="text-m2 form-data-col">Status</small>
                        </div>
                
                
                        @foreach ($documentsRejected as $doc)
                            <div  class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doc->id}}">
                                <small class="form-data-col">{{$doc->name}}</small>
                                <small class="form-data-col">{{$doc->document_types()->first()->document_name}}</small>
                                <small class="form-data-col">{{$doc->updated_at}}</small>
                                <small class="form-data-col">{{$doc->status}}</small>
                            </div>
                        @endforeach
                        @foreach ($documentsBrgyIdPending as $doc)
                            <div  class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doc->id}}">
                                <small class="form-data-col">{{$doc->name}}</small>
                                <small class="form-data-col">{{$doc->document_types()->first()->document_name}}</small>
                                <small class="form-data-col">{{$doc->created_at}}</small>
                                <small class="form-data-col">{{$doc->status}}</small>
                            </div>
                        @endforeach
                    </div>
                @endif                
            </div>

            {{-- Completed Documents --}}
            <div class="long-cont d-flex align-items-center" id="completed-cont">
                @if ($documentsPending->count() < 1 && $documentsBrgyIdPending->count() < 1)
                    <div class="placeholder-illustrations">
                        <div class="d-flex flex-direction-y gap2">
                            <img src="/assets/media/illustrations/empty1.svg">  
                            <div class="text-l3 text-center">No Records</div>
                        </div>
                    </div>
                @else
                    <div class="table1">
                        <div class="table1-header">
                            <small class="text-m2 form-data-col">Resident Name</small>
                            <small class="text-m2 form-data-col">Document</small>
                            <small class="text-m2 form-data-col">Date Rejected</small>
                            <small class="text-m2 form-data-col">Status</small>
                        </div>
                
                
                        @foreach ($documentsCompleted as $doc)
                            <div  class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doc->id}}">
                                <small class="form-data-col">{{$doc->name}}</small>
                                <small class="form-data-col">{{$doc->document_types()->first()->document_name}}</small>
                                <small class="form-data-col">{{$doc->updated_at}}</small>
                                <small class="form-data-col">{{$doc->status}}</small>
                            </div>
                        @endforeach
                        @foreach ($documentsBrgyIdPending as $doc)
                            <div  class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doc->id}}">
                                <small class="form-data-col">{{$doc->name}}</small>
                                <small class="form-data-col">{{$doc->document_types()->first()->document_name}}</small>
                                <small class="form-data-col">{{$doc->created_at}}</small>
                                <small class="form-data-col">{{$doc->status}}</small>
                            </div>
                        @endforeach
                    </div>
                @endif  
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
