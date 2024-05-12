@if ($modalType == 'success') 
    <div class="modal1 d-none" id="success-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 align-items-center">
                
                <div class="modal1-icon">
                    <img src="/assets/media/icons/check.svg"/>
                </div>
                <div>
                    <div class="modal1-txt-title text-l3">
                        Title
                    </div>
                    <div class="modal1-txt text-m1 modal-text">
                        text
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@elseif($modalType == 'error')
    <div class="modal1 d-none" id="error-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 align-items-center">
                
                <div class="modal1-icon">
                    <img src="/assets/media/icons/x-mark.svg"/>
                </div>
                <div>
                    <div class="modal1-txt-title text-l3">
                        Title
                    </div>
                    <div class="modal1-txt text-m1 modal-text">
                        text
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@elseif($modalType == 'info-yn')
    <div class="modal1 d-none info-yn-modal" id="info-yn-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 align-items-center">
                
                <div class="modal1-icon">
                    <img src="/assets/media/icons/info.svg"/>
                </div>
                <div>
                    <div class="modal1-txt-title text-l3">
                        Title
                    </div>
                    <div class="modal1-txt text-m1 modal-text">
                        text
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <a class="primary-btn-blue2" id="modal-close-btn">No</a>
                <a class="yes-btn primary-btn-yellow1">Yes</a>
            </div>
            
        </div>
    </div>












{{-- Patient Profile --}}
@elseif($modalType == 'patient-edit-name')
    <div class="modal1 d-none" id="patient-edit-name-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Edit Name</div>
                
                <div>
                    <label for="fname-in">Firstname</label>
                    <input type="text" class="edit-text-1 w-100" id="fname-in">
                </div>

                <div>
                    <label for="mname-in">Middlename</label>
                    <input type="text" class="edit-text-1 w-100" id="mname-in">
                </div>

                <div>
                    <label for="lname-in">Lastname</label>
                    <input type="text" class="edit-text-1 w-100" id="lname-in">
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center save-btn">Save</div>
            </div>
            
        </div>
    </div>

@elseif($modalType == 'patient-edit-email')
    <div class="modal1 d-none" id="patient-edit-email-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Edit Email</div>
                
                <div>
                    <label for="email-in">Email</label>
                    <input type="text" class="edit-text-1 w-100" id="email-in">
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center save-btn">Save</div>
            </div>
            
        </div>
    </div>

@elseif($modalType == 'patient-edit-password')
    <div class="modal1 d-none" id="patient-edit-password-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Edit Password</div>
                
                <div>
                    <label for="new-pass-in">New Password</label>
                    <input type="password" class="edit-text-1 w-100" id="new-pass-in">
                </div>

                <div>
                    <label for="con-pass-in">Confirm Password</label>
                    <input type="password" class="edit-text-1 w-100" id="con-pass-in">
                </div>

                <div>
                    <label for="old-pass-in">Old Password</label>
                    <input type="password" class="edit-text-1 w-100" id="old-pass-in">
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center save-btn">Save</div>
            </div>
            
        </div>
    </div>

@elseif($modalType == 'patient-edit-phone')
    <div class="modal1 d-none" id="patient-edit-phone-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Edit Phone</div>
                
                <div>
                    <label for="phone-in">Phone</label>
                    <input type="text" class="edit-text-1 w-100" id="phone-in">
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center save-btn">Save</div>
            </div>
            
        </div>
    </div>

@elseif($modalType == 'patient-edit-address')
    <div class="modal1 d-none" id="patient-edit-address-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Edit Address</div>
                
                <div>
                    <label for="address-in">Address</label>
                    <input type="text" class="edit-text-1 w-100" id="address-in">
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center save-btn">Save</div>
            </div>
            
        </div>
    </div>
    
@endif