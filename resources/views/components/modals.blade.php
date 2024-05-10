@if ($modalType == 'success') 
    <div class="modal1 d-none" id="success-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="d-flex gap2 align-items-center">
                
                <div class="modal1-icon">
                    <img src="/assets/media/icons/check.svg"/>
                </div>
                <div>
                    <div class="modal1-txt-title text-l3 modal-text">
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
                    <div class="modal1-txt-title text-l3 modal-text">
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
                    <div class="modal1-txt-title text-l3 modal-text">
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
    
@endif