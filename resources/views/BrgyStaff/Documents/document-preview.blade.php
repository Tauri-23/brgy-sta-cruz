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
        <link rel="stylesheet" href="/assets/css/forms.css">
        <link rel="stylesheet" href="/assets/css/document-req-prev.css">
        <link rel="stylesheet" href="/assets/css/document-preview.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- modals --}}
        <x-modals modalType="admin-reject-req"/>
        <x-modals modalType="admin-accept-req"/>
        <x-modals modalType="info-yn"/>
        <x-modals modalType="info-yn"/>
        <x-modals modalType="info-yn"/>

        <x-modals modalType="success"/>
        <x-modals modalType="error"/>

        {{-- Requirements Preview --}}
        <div class="modal1 d-none" id="requirement-modal-img">
            <div class="req-prev-pic-box position-relative">
                <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
                <div class="text-l2 mar-bottom-1" id="req-name">Requirement Name</div>
                <img class="req-img" src="" alt="" id="req-img">
                <div class="mar-top-1 d-flex justify-content-center">
                    <a class="primary-btn-blue1" id="dwnld-image-btn">Donwload</a>
                </div>
            </div>
        </div>

        <div class="modal1 requirement-modal d-none" id="requirement-modal-pdf">
            <div class="pdfviewer-modal position-relative">
                <i class="bi bi-x-lg text-l1 modal-close" id="modal-close-btn"></i>
                <div class="text-l2 mar-bottom-1" id="req-name">Requirement Name</div>
                <iframe class="pdf-frame1" id="req-file" src="/assets/media/requirements/125990224.pdf" frameborder="0"></iframe>
            </div>
        </div>

        {{-- Finished Product Preview --}}
        {{-- Brgy Id Preview --}}
        <div class="modal1 document-preview-cont d-none" id="brgy-id-cont">
            <div class="brgy-id">
                <div class="text-l2 text-center mar-bottom-1">Barangay I.D. Preview</div>
                <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>

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
            </div>
        </div>

        {{-- Brgy Clearance Preview --}}
        <div class="modal1 document-preview-cont d-none" id="brgy-clearance-cont">
            <div class="brgy-id">
                <div class="text-l2 text-center mar-bottom-1">Barangay Clearance Preview</div>
                <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
                <div>
                    <img class="brgy-clearance-front" src="/assets/media/documents/CLEARANCE-FRONT-CLEAN.png" alt="">
                    <div class="brgy-clearance-name">Resident Name</div>
                    <div class="brgy-clearance-address">Address</div>
                    <div class="brgy-clearance-for-work">x</div>
                    <div class="brgy-clearance-for-school">x</div>
                    <div class="brgy-clearance-for-others">x</div>
                    <div class="brgy-clearance-for-others-specify">Other requirement</div>
                </div>
            </div>
        </div>

        {{-- Brgy Renovation Construction Permit Preview --}}
        <div class="modal1 document-preview-cont d-none" id="brgy-con-ren-cont">
            <div class="brgy-id">
                <div class="text-l2 text-center mar-bottom-1">Document Preview</div>
                <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>

                <div class="d-flex gap3">
                    <div>
                        <div class="text-l3">Front Page</div>
                        <img class="brgy-clearance-front" src="/assets/media/documents/CLEARANCE-FRONT-CLEAN.png" alt="">
                        <div class="brgy-clearance-name-2">Resident Name</div>
                        <div class="brgy-clearance-address-2">Address</div>
                    </div>
    
                    <div>
                        <div class="text-l3">Back Page</div>
                        <img class="brgy-clearance-front" src="/assets/media/documents/CON-REN.png" alt="">
                        <div class="brgy-con-ren-name">Resident Name</div>
                        <div class="brgy-for-build">x</div>
                        <div class="brgy-for-renovation">x</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Navs --}}
        <x-navbar navType="admin-page" activeLink="3" pfp="null"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="d-flex align-items-center justify-content-start text-l3">
                <a href="/AdminDocuments" class="text-decoration-none color-black" href=""><i class="bi bi-arrow-left cursor pointer"></i> Back</a>
            </div>


            <div class="long-cont d-flex flex-direction-y gap1">
                {{-- Title --}}
                <div class="text-l1">
                    {{$document->document_types()->first()->document_name}} 
                    @if ($document->status == "Pending")
                        <span class="badge bg-blue1 mar-start-1">{{$document->status}}</span>
                    @elseif($document->status == "For Pickup")
                        <span class="badge bg-yellow1 mar-start-1">{{$document->status}}</span>
                    @elseif($document->status == "Completed")
                        <span class="badge bg-green1 mar-start-1">{{$document->status}}</span>
                    @else
                        <span class="badge bg-red1 mar-start-1">{{$document->status}}</span>
                    @endif
                    
                </div>

                {{-- Information --}}
                @if ($type == "brgyId")
                    <div class="d-flex w-100 mar-top-1">
                        <div class="d-flex w-50 flex-direction-y gap3">
                            <div>
                                <div class="text-m2">Name:</div>
                                <div class="text-l3">{{$document->name}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Address:</div>
                                <div class="text-l3">{{$document->address}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Phone:</div>
                                <div class="text-l3">{{$document->phone}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Brith Date</div>
                                <div class="text-l3">{{$document->bdate}}</div>
                            </div>
                        </div>
                        <div class="d-flex w-50 flex-direction-y gap3">
                            
                            <div>
                                <div class="text-m2">Birth Place:</div>
                                <div class="text-l3">{{$document->bdate_place}}</div>
                            </div>
                            <div>
                                <div class="text-m2">TIN #:</div>
                                <div class="text-l3">{{$document->tin ? $document->tin : "N/A"}}</div>
                            </div>
                            <div>
                                <div class="text-m2">SSS #:</div>
                                <div class="text-l3">{{$document->sss ? $document->sss : "N/A"}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Blood Type:</div>
                                <div class="text-l3">{{$document->blood_type ? $document->blood_type : "N/A"}}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex w-100 mar-top-1">
                        <div class="d-flex w-50 flex-direction-y gap3">
                            <div>
                                <div class="text-m2">Name:</div>
                                <div class="text-l3">{{$document->name}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Address:</div>
                                <div class="text-l3">{{$document->address}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Phone:</div>
                                <div class="text-l3">{{$document->phone}}</div>
                            </div>
                        </div>
                        <div class="d-flex w-50 flex-direction-y gap3">
                            <div>
                                <div class="text-m2">Brith Date</div>
                                <div class="text-l3">{{$document->bdate}}</div>
                            </div>
                            <div>
                                <div class="text-m2">Gender:</div>
                                <div class="text-l3">{{$document->gender}}</div>
                            </div>

                            @if ($document->document_type == 1)
                                <div>
                                    <div class="text-m2">Purpose:</div>
                                    <div class="text-l3">{{$document->brgy_clearance_purpose}}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                
                
                <div class="mar-top-1">
                    <div class="text-l2 mar-bottom-1">Requirements:</div>

                    <div class="d-flex flex-wrap w-100 gap2">
                        {{-- Render Requirements --}}
                        @foreach ($requirements as $req)

                            <div class="d-flex flex-direction-y gap3 req-card" id="{{$req->id}}">
                                <div class="text-l3" id="req-for">{{$req->document_type_requirements()->first()->requirement}}</div>
                                <div class="requirements-mini-cont d-inline-flex gap3 requirement-btn" id="requirement-btn" style="cursor: pointer;">
                                    <div class="requirements-mini-pic">
                                        <img class="h-100 position-absolute" src="/assets/media/icons/google-docs.svg" alt="">
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

                <div class="mar-top-1 d-flex gap3 justify-content-end">
                    <div class="primary-btn-blue1 d-flex align-items-center gap3" id="preview-document-btn"><i class="bi bi-eye"></i> See Preview</div>
                    @if ($document->status == 'Pending')
                            <div class="primary-btn-red1" id="reject-btn">Reject</div>
                            <div class="primary-btn-blue1" id="approve-btn">Approve</div>                        
                        </div>
                    @elseif($document->status == 'Rejected')
                        <div class="text-l2">Reason: </div>
                        <div class="text-l3">{{$document->reason}}</div>
                    @elseif($document->status == 'For Pickup')
                        <div class="primary-btn-green1" id="mark-as-complete-btn">Mark as Completed</div>                
                        
                    @endif
                </div>
            </div>

            
            
        </div>

        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>

    <script>
        const requirements = {!! json_encode($requirements) !!};
        const reqId = {!! json_encode($document->id) !!};
        const type = {!! json_encode($type) !!};
        const documentType = {!! json_encode($document->document_type) !!};
        const documentInfo = {!! json_encode($document) !!};
    </script>

    <script src="/assets/js/doc-req-prev.js"></script>
    <script src="/assets/js/document-request-preview.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
