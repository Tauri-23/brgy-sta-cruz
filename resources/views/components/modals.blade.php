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












{{-- Resident Profile --}}
@elseif($modalType == 'resident-edit-name')
    <div class="modal1 d-none" id="resident-edit-name-modal">
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

@elseif($modalType == 'resident-edit-email')
    <div class="modal1 d-none" id="resident-edit-email-modal">
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

@elseif($modalType == 'resident-edit-email-otp')
    <div class="modal1 d-none" id="resident-edit-email-otp-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Edit Email</div>
                
                <div>
                    <label for="email-otp-in" class="text-l2">OTP</label>
                    <div class="text-m1">We've send an OTP to your email <span id="old-email"></span></div>
                    <input type="text" class="edit-text-1 w-100" id="email-otp-in" placeholder="6-digit OTP">
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center save-btn">Save</div>
            </div>
            
        </div>
    </div>

@elseif($modalType == 'resident-edit-password')
    <div class="modal1 d-none" id="resident-edit-password-modal">
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

@elseif($modalType == 'resident-edit-phone')
    <div class="modal1 d-none" id="resident-edit-phone-modal">
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

@elseif($modalType == 'resident-edit-address')
    <div class="modal1 d-none" id="resident-edit-address-modal">
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

@elseif($modalType == "resident-edit-pfp")
    <div class="modal1 d-none" id="resident-edit-pfp-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap1 flex-direction-y">
                <div class="text-l2 text-center">Edit Picture</div>
                
                <div class="profile-pfp m-auto">
                    <img class="position-absolute h-100" src="" id="pfp-prev"/>
                </div>

                <input type="file" id="pfp-in">

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center save-btn">Save</div>
            </div>
            
        </div>
    </div>
    









{{-- Admin Doc Prev --}}
@elseif($modalType == "admin-reject-req")
    <div class="modal1 d-none" id="admin-reject-req-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap1 flex-direction-y">
                <div class="text-l2 text-center">Reject Document</div>
                
                <div>
                    <label for="reason-in">Reason</label>
                    <textarea class="edit-text-1 w-100" id="reason-in" style="width: 300px; height: 200px; resize:none;">
                    </textarea>
                </div>
                
            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center reject-btn">Reject</div>
            </div>
            
        </div>
    </div>
@elseif($modalType == "admin-accept-req")
    <div class="modal1 d-none" id="admin-accept-req-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap1 flex-direction-y">
                <div class="text-l2 text-center">Approve Document</div>
                
                <div>
                    <label for="pickup-in">Pick-up Date</label>
                    <input type="datetime-local" class="edit-text-1 w-100" id="pickup-in">
                </div>
                
            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center approve-btn">Approve</div>
            </div>
            
        </div>
    </div>





{{-- Monitor Admins navs --}}
@elseif($modalType == 'add-admin')
    <div class="modal1 d-none" id="add-admin-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Add Admin</div>

                <div>
                    <label for="name-in">Name</label>
                    <input type="text" class="edit-text-1 w-100" id="name-in" placeholder="Lastname, Firstname">
                </div>
                
                <div>
                    <label for="email-in">Email</label>
                    <input type="text" class="edit-text-1 w-100" id="email-in">
                </div>

                <div>
                    <label for="pass-in">Password</label>
                    <input type="password" class="edit-text-1 w-100" id="pass-in">
                </div>

                <div>
                    <label for="con-pass-in">Confirm Password</label>
                    <input type="password" class="edit-text-1 w-100" id="con-pass-in">
                </div>

                <div>
                    <label for="admin-type-in">Admin Type</label>
                    <select class="edit-text-1 w-100" id="admin-type-in">
                        <option value="Document Manager">Document Manager</option>
                        <option value="Announcement Manager">Announcement Manager</option>
                    </select>
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center add-btn">Add</div>
            </div>
            
        </div>
    </div>

@elseif($modalType == 'change-role-admin')
    <div class="modal1 d-none" id="change-role-admin-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Change Role Admin</div>

                <div class="d-flex gap3 text-l3">
                    <div id="admin-name-txt">Admin Name</div>
                    <div id="admin-id-txt">Admin Id</div>
                </div>
                

                <div>
                    <label for="change-admin-type-in">Admin Type</label>
                    <select class="edit-text-1 w-100" id="change-admin-type-in">
                        <option value="Document Manager">Document Manager</option>
                        <option value="Announcement Manager">Announcement Manager</option>
                    </select>
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center change-admin-role-btn">Change Role</div>
            </div>
            
        </div>
    </div>








{{-- Live stream --}}
@elseif($modalType == 'livesteam-start')
    <div class="modal1 d-none" id="livesteam-start-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 flex-direction-y">
                <div class="text-l2 text-center">Start a livestream</div>

                <div>
                    <label for="input-link-in" class="text-l3">Livestream Link</label>
                    <input type="text" class="edit-text-1 w-100" id="input-link-in">
                </div>

            </div>
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <div class="primary-btn-blue1 w-100 text-center start-live-btn">Start a live stream</div>
            </div>
            
        </div>
    </div>

@endif