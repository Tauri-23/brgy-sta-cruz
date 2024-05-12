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
        <link rel="stylesheet" href="/assets/css/document-req-prev.css">

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

        {{-- Requirements Preview --}}
        <div class="modal1 d-none" id="requirement-modal-img">
            <div class="req-prev-pic-box position-relative">
                <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
                <div class="text-l2 mar-bottom-1" id="req-name">Requirement Name</div>
                <img class="req-img" src="" alt="" id="req-img">
            </div>
        </div>

        <div class="modal1 requirement-modal d-none" id="requirement-modal-pdf">
            <div class="pdfviewer-modal position-relative">
                <i class="bi bi-x-lg text-l1 modal-close" id="modal-close-btn"></i>
                <div class="text-l2 mar-bottom-1" id="req-name">Requirement Name</div>
                <iframe class="pdf-frame1" id="req-file" src="/assets/media/requirements/125990224.pdf" frameborder="0"></iframe>
            </div>
        </div>

        {{-- Navs --}}
        <x-navbar navType="resident-page" activeLink="3" pfp="{{$resident->pfp}}"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex align-items-center justify-content-between text-l1">
                {{$document->document_types()->first()->document_name}}
            </div>


            @if ($type == "brgyId")
                <div class="long-cont">
                    {{-- Title --}}
                    <div class="text-l1 mar-bottom-1">
                        {{$document->document_types()->first()->document_name}} 
                        @if ($document->status == "Pending")
                            <span class="badge bg-blue1 mar-start-1">{{$document->status}}</span>
                        @elseif($document->status == "For Pickup")
                            <span class="badge bg-yellow1 mar-start-1">{{$document->status}}</span>
                        @elseif($document->status == "Completed")
                            <span class="badge bg-green mar-start-1">{{$document->status}}</span>
                        @else
                            <span class="badge bg-red mar-start-1">{{$document->status}}</span>
                        @endif
                        
                    </div>

                    {{-- Information --}}
                    <div class="d-flex w-100 mar-top-1">
                        <div class="d-flex w-50 flex-direction-y gap3">
                            <div>
                                <div class="text-m2">Name:</div>
                                <div class="text-l2">{{$document->name}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Address:</div>
                                <div class="text-l2">{{$document->address}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Phone:</div>
                                <div class="text-l2">{{$document->phone}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Brith Date</div>
                                <div class="text-l2">{{$document->bdate}}</div>
                            </div>
                        </div>
                        <div class="d-flex w-50 flex-direction-y gap3">
                            
                            <div>
                                <div class="text-m2">Birth Place:</div>
                                <div class="text-l2">{{$document->bdate_place}}</div>
                            </div>
                            <div>
                                <div class="text-m2">TIN #:</div>
                                <div class="text-l2">{{$document->tin ? $document->tin : "N/A"}}</div>
                            </div>
                            <div>
                                <div class="text-m2">SSS #:</div>
                                <div class="text-l2">{{$document->sss ? $document->sss : "N/A"}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Blood Type:</div>
                                <div class="text-l2">{{$document->blood_type ? $document->blood_type : "N/A"}}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mar-top-1">
                        <div class="text-l2 mar-bottom-1">Requirements:</div>

                        <div class="d-flex flex-wrap w-100 gap2">
                            {{-- Render Requirements --}}
                            @foreach ($requirements as $req)

                                <div class="d-flex flex-direction-y gap3 req-card" id="{{$req->id}}">
                                    <div class="text-l3" id="req-for">{{$req->document_type_requirements()->first()->requirement}}</div>
                                    <div class="requirements-mini-cont d-inline-flex gap3 requirement-btn" id="requirement-btn" style="cursor: pointer;">
                                        <div class="requirements-mini-pic">
                                            <img class="h-100 position-absolute" src="/assets/media/requirements/{{$req->filename}}" alt="">
                                        </div>
                                        <div class="requirements-filename">
                                            <input type="hidden" name="" value="{{$req->filename}}" id="file-name"/>
                                            {{$req->filename}}
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>

                    </div>
                </div>
            @else
                <div class="long-cont">
                    {{-- Title --}}
                    <div class="text-l1 mar-bottom-1">
                        {{$document->document_types()->first()->document_name}} 
                        @if ($document->status == "Pending")
                            <span class="badge bg-blue1 mar-start-1">{{$document->status}}</span>
                        @elseif($document->status == "For Pickup")
                            <span class="badge bg-yellow1 mar-start-1">{{$document->status}}</span>
                        @elseif($document->status == "Completed")
                            <span class="badge bg-green mar-start-1">{{$document->status}}</span>
                        @else
                            <span class="badge bg-red mar-start-1">{{$document->status}}</span>
                        @endif
                        
                    </div>

                    {{-- Information --}}
                    <div class="d-flex w-100 mar-top-1">
                        <div class="d-flex w-50 flex-direction-y gap3">
                            <div>
                                <div class="text-m2">Name:</div>
                                <div class="text-l2">{{$document->name}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Address:</div>
                                <div class="text-l2">{{$document->address}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Phone:</div>
                                <div class="text-l2">{{$document->phone}}</div>
                            </div>
                        </div>
                        <div class="d-flex w-50 flex-direction-y gap3">
                            <div>
                                <div class="text-m2">Brith Date</div>
                                <div class="text-l2">{{$document->bdate}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Gender:</div>
                                <div class="text-l2">{{$document->gender}}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mar-top-1">
                        <div class="text-l2 mar-bottom-1">Requirements:</div>

                        <div class="d-flex flex-wrap w-100 gap2">
                            {{-- Render Requirements --}}
                            @foreach ($requirements as $req)

                                <div class="d-flex flex-direction-y gap3 req-card" id="{{$req->id}}">
                                    <div class="text-l3" id="req-for">{{$req->document_type_requirements()->first()->requirement}}</div>
                                    <div class="requirements-mini-cont d-inline-flex gap3 requirement-btn" id="requirement-btn" style="cursor: pointer;">
                                        <div class="requirements-mini-pic">
                                            <img class="h-100 position-absolute" src="/assets/media/requirements/{{$req->filename}}" alt="">
                                        </div>
                                        <div class="requirements-filename">
                                            <input type="hidden" name="" value="{{$req->filename}}" id="file-name"/>
                                            {{$req->filename}}
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>

                    </div>
                </div>    
            @endif
        </div>

        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>

    <script>
        const requirements = {!! json_encode($requirements) !!};
    </script>

    <script src="/assets/js/resident-doc-req-prev.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
