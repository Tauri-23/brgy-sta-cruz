{{--
INPUTS:

FRONT:
#brgy-permit-name
#brgy-permit-address
#brgy-permit-build
#brgy-permit-renov

--}}

<div class="brgy-clearance" id="brgy-permit-canvas">
    {{-- Header --}}
    <div class="d-flex justify-content-between invisible">
        <div>
            <img class="brgy-clearance-logo" src="/assets/media/logos/brgy_logo.png" alt="">
        </div>
        <div class="text-center">
            <div class="text-l3 fw-bold" style="font-family: 'Times New Roman', Times, serif">Republic of the Philippines</div>
            <div class="text-m1">City of Makati</div>
            <div class="text-l2 fw-bold">BARANGAY STA. CRUZ</div>
            <div class="text-m1">OFFICE OF THE BARANGAY COUNCIL</div>
        </div>
        <div>
            <img class="brgy-clearance-logo" src="/assets/media/logos/makati.png" alt="">
        </div>
    </div>

    {{-- Body --}}
    <div class="d-flex mar-top-1" style="height: 7.5in;">
        <div class="d-flex flex-direction-y justify-content-between invisible">
            <div>
                <div class="text-m3 fw-bold" style="text-transform: uppercase">Kith H. Taguiang</div>
                <div class="text-m3">Punong Barangay</div>
            </div>

            <div>
                <div class="text-m3" style="text-transform: uppercase">Enrico S. Evangelista</div>
                <div class="text-m3">Kagawad</div>
            </div>
            <div>
                <div class="text-m3" style="text-transform: uppercase">John Yland M. De Ocampo</div>
                <div class="text-m3">Kagawad</div>
            </div>
            <div>
                <div class="text-m3" style="text-transform: uppercase">Maria Katrina P Alicando</div>
                <div class="text-m3">Kagawad</div>
            </div>
            <div>
                <div class="text-m3" style="text-transform: uppercase">Noel Elijah Salenga</div>
                <div class="text-m3">Kagawad</div>
            </div>
            <div>
                <div class="text-m3" style="text-transform: uppercase">Flordeliza R. Ambrosio</div>
                <div class="text-m3">Kagawad</div>
            </div>
            <div>
                <div class="text-m3" style="text-transform: uppercase">Liza Flor G. Castor</div>
                <div class="text-m3">Kagawad</div>
            </div>
            <div>
                <div class="text-m2" style="text-transform: uppercase">Nilo Jann D. Basada</div>
                <div class="text-m3">Kagawad</div>
            </div>

            <div>
                <div class="text-m3" style="text-transform: uppercase">Jerome Tristan G. Pangilinan</div>
                <div class="text-m3">Sanguniang Kabataan Chairman</div>
            </div>

            <div>
                <div class="text-m3" style="text-transform: uppercase">Ma. Victoria Silbol-Abergos</div>
                <div class="text-m3">Ingat Yaman</div>
            </div>

            <div>
                <div class="text-m3" style="text-transform: uppercase">Bayani G. Olegario</div>
                <div class="text-m3">Kalihim</div>
            </div>

        </div>
        <div class="flex-grow-1 d-flex flex-direction-y justify-content-between">
            <div class="text-l1 fw-bold text-center">CLEARANCE</div>

            <div style="margin: -50px 0 0 0;">
                <div class="text-center text-m1 fw-bold mar-top-1" id="brgy-permit-name"></div>
                <div class="text-center text-m1 fw-bold" id="brgy-permit-address"></div>
            </div>
            

            <div class="d-flex flex-direction-y gap3">
                <div class="text-m3 w-100 mar-bottom-1" style="text-align: justify">
                    <div style="text-indent: 50px">Has been issued clearance based on the plan specification,</div>
                    Request hereto attached and likewise, upon site inspection made and <br>
                    Payment or required fees for.
                </div>

                <div class="d-flex gap3">
                    <div class="brgy-clearance-check-bx" id="brgy-permit-build"></div>
                    <div class="text-m3">Building/House</div>
                </div>
                <div class="d-flex gap3">
                    <div class="brgy-clearance-check-bx" id="brgy-permit-renov"></div>
                    <div class="text-m3">Renovation Requirement</div>
                </div>
                <div class="d-flex gap3">
                    <div class="brgy-clearance-check-bx" id="brgy-permit-for-others"></div>
                    <div class="text-m3">Others (specify)</div>
                    <div class="brgy-id-input-box flex-shrink-1 w-50 fw-bold text-center" id="brgy-permit-others-in"></div>
                </div>
                <div class="text-m3 fw-bold">ISSUED THIS</div>
            </div>

            <div class="d-flex justify-content-end text-center invisible" style="margin: 0 0 50px 0;">
                <div>
                    <div class="text-m3 fw-bold" style="text-transform: uppercase">Kith M. Taguiang</div>
                    <div class="text-m3">Punong Barangay</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="invisible" style="margin: 30px auto 0 auto;">
        <div class="text-center text-m3">3580 Zapote corner Davila Street, Barangay Sta. Cruz, Makati City</div>
        <div class="text-center text-m3">Tel No. 8896-8775 (Office) / 8897-0503 (Bantay Bayan) / 7089-6599 (Disaster)</div>
        <div class="text-center text-m3">E-mail Address kap.barangaystacruz@gmail.com (Barangay Chairman)</div>
    </div>
</div>