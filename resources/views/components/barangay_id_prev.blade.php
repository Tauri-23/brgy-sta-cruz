{{--
INPUTS:

FRONT:
#brgy-id-pic
#brgy-id-name

BACK:
#brgy-id-address
#brgy-id-contact
#brgy-id-tin
#brgy-id-sss
#brgy-id-bdate
#brgy-id-bdate-place
#brgy-id-blood

--}}

@if ($position == "front")
    <div class="brgy-id m-auto d-flex flex-direction-y justify-content-between">
        {{-- Header --}}
        <div class="d-flex justify-content-between">
            <div>
                <img class="brgy-id-logo" src="/assets/media/logos/brgy_logo.png" alt="">
            </div>
            <div class="text-center">
                <div class="text-l2 fw-bold">City of <span class="makati-brgy-id">Makati</span></div>
                <div class="brgy-id-head-txt-2">METROPOLITAN MANILA, PHILIPPINES</div>
                <div class="text-m3 fw-bold">BARANGAY STA. CRUZ</div>
            </div>
            <div>
                <img class="brgy-id-logo" src="/assets/media/logos/makati.png" alt="">
            </div>
        </div>

        {{-- Body --}}
        <div class="d-flex gap2">
            <div class="brgy-id-pic-box">
                <img class="brgy-id-pfp" src="/assets/media/pfp/defaultPFP.png" alt="" id="brgy-id-pic">
            </div>

            <div class="d-flex flex-direction-y justify-content-between flex-grow-1">
                <div class="txt-m3 text-center fw-bold">This is to certify that</div>
                <div class="brgy-id-input-box text-center" id="brgy-id-name"></div>
                <div class="text-m3 text-center fw-bold">
                    (name)
                </div>
                <div class="text-m3 fw-bold text-center brgy-outline-yellow">
                    is a resident of this Barangay
                </div>
            </div>

        </div>

        {{-- Footer --}}
        <div class="d-flex mar-bottom-2 gap2">
            <div class="" style="font-size: 10px">
                <div class="">Control No: __________</div>
                <div class="">Date issued: _________</div>
                <div class="">Valid until: __________</div>
            </div>
            <div class="flex-grow-1">
                <div class="brgy-id-punong-brgy text-m2 text-center fw-bold" style="text-transform: uppercase;">{{$brgyCapt}}</div>
                <div class="text-center fw-bold text-m3" style="color: #eec621;filter:drop-shadow(0 0 1px black)">Punong Barangay</div>
            </div>
        </div>

    </div>
@else
    <div class="brgy-id-back m-auto d-flex flex-direction-y justify-content-between">
        {{-- Header --}}
        <div class="d-flex justify-content-between gap3">
            <div class="text-m2 fw-bold">Address:</div>
            <div class="flex-grow-1 position-relative">
                <div class="position-absolute w-100 h-100" id="brgy-id-address"></div>
                <div class="brgy-id-input-box"></div>
                <div class="brgy-id-input-box"></div>
            </div>
        </div>
        <div class="d-flex justify-content-between gap3">
            <div class="text-m2 fw-bold">Contact Information:</div>
            <div class="flex-grow-1">
                <div class="brgy-id-input-box" id="brgy-id-contact"></div>
            </div>
        </div>

        <div class="d-flex justify-content-between gap3">
            <div class="w-100 d-flex gap3">
                <div class="text-m2 fw-bold">TIN:</div>
                <div class="flex-grow-1">
                    <div class="brgy-id-input-box" id="brgy-id-tin"></div>
                </div>
            </div>
            <div class="w-100 d-flex gap3">
                <div class="text-m2 fw-bold">SSS:</div>
                <div class="flex-grow-1">
                    <div class="brgy-id-input-box" id="brgy-id-sss"></div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between gap3">
            <div class="w-100 d-flex gap3">
                <div class="text-m2 fw-bold">Date of Birth:</div>
                <div class="flex-grow-1">
                    <div class="brgy-id-input-box" id="brgy-id-bdate"></div>
                </div>
            </div>
            <div class="w-100 d-flex gap3">
                <div class="text-m2 fw-bold">Place of Birth:</div>
                <div class="flex-grow-1">
                    <div class="brgy-id-input-box" id="brgy-id-bdate-place"></div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between gap3">
            <div class="w-50 d-flex gap3">
                <div class="text-m2 fw-bold">Blood Type:</div>
                <div class="flex-grow-1">
                    <div class="brgy-id-input-box" id="brgy-id-blood"></div>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-between gap3 align-items-center">
            <div class="w-100">
                <div class="brgy-id-input-box"></div>
                <i><div class="text-m3 text-center" style="color: #eec621;filter:drop-shadow(0 0 1px black)">Signature of Holder</div></i>                        
            </div>
            <div class="w-100">
                <div class="brgy-id-thumb-box m-auto">

                </div>
                <div class="text-m3 text-center">THUMBPRINT</div>
            </div>
        </div>

        <div class="d-flex justify-content-between gap3 align-items-center">
            <ul>
                <i><li style="font-size: 12px">if found, please return to Barangay sta. Cruz Hall, Davila st. Makati.</li></i>
            </ul>
        </div>

    </div>
@endif