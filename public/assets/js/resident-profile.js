// Btns
const editNameBtn = $('#edit-name-btn');
const editEmailBtn= $('#edit-email-btn');
const editPassBtn = $('#edit-pass-btn');
const editPhoneBtn = $('#edit-phone-btn');
const editAddressBtn = $('#edit-address-btn');
const editPfpBtn = $('#change-pfp-btn');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

const editNameModal = $('#resident-edit-name-modal');
const editEmailModal = $('#resident-edit-email-modal');
const editEmailModalOTP = $('#resident-edit-email-otp-modal');
const editPasswordModal = $('#resident-edit-password-modal');
const editPhoneModal = $('#resident-edit-phone-modal');
const editAddressModal = $('#resident-edit-address-modal');
const editPfpModal = $('#resident-edit-pfp-modal');

// Inputs
const fnameIn = $('#fname-in');
const mnameIn = $('#mname-in');
const lnameIn = $('#lname-in');

const emailIn = $('#email-in');
const emailOTPIn = $('#email-otp-in');

const newPassIn = $('#new-pass-in');
const conPassIn = $('#con-pass-in');
const oldPassIn = $('#old-pass-in');

const phoneIn = $('#phone-in');

const addressIn = $('#address-in');

const pfpIn = $('#pfp-in');


const pfpPrev = $('#pfp-prev');



formatPhoneNumIn(phoneIn);

editNameBtn.click(() => {
    // assign values
    fnameIn.val(oldFname);
    mnameIn.val(oldMname);
    lnameIn.val(oldLname);

    showModal(editNameModal);
    closeModal(editNameModal, false)


    let saveBtn = editNameModal.find('.save-btn');

    saveBtn.click(() => {      

        if(isEmptyOrSpaces(fnameIn.val()) || isEmptyOrSpaces(lnameIn.val())) {
            return;
        }
        if(checkTheChanges([fnameIn, mnameIn, lnameIn], [oldFname, oldMname, oldLname]) > 0) {
            let formData = new FormData();
            formData.append('residentId', residentId);
            formData.append('fname', fnameIn.val());
            formData.append('mname', mnameIn.val());
            formData.append('lname', lnameIn.val());
            formData.append('editType', "name");

            closeModalNoEvent(editNameModal);
            editProfileDb(formData);
        }
    });
});

editEmailBtn.click(() => {
    // 
    emailIn.val(oldEmail);

    showModal(editEmailModal);
    closeModal(editEmailModal, false);

    let saveBtn = editEmailModal.find('.save-btn');

    saveBtn.click(() => {
        if(isEmptyOrSpaces(emailIn.val())) {
            return;
        }
    
        if(checkTheChanges([emailIn], [oldEmail]) > 0) {
            let formData = new FormData();
            formData.append('residentId', residentId);
            formData.append('oldEmail', oldEmail);
            formData.append('editType', "email");

            editEmailModalOTP.find('#old-email').html(oldEmail);

    
            closeModalNoEvent(editEmailModal);
            editProfileDb(formData);
            showModal(editEmailModalOTP);
            closeModal(editEmailModalOTP);

        }
    });
});

editEmailModalOTP.find('.save-btn').click(() => {
    let formData = new FormData();
    formData.append('residentId', residentId);
    formData.append('email', emailIn.val());
    formData.append('otp', emailOTPIn.val());
    formData.append('editType', "emailOTP");
    editProfileDb(formData);
});

editPassBtn.click(() => {
    newPassIn.val('');
    conPassIn.val('');
    oldPassIn.val('');

    showModal(editPasswordModal);
    closeModal(editPasswordModal, false);

    let saveBtn = editPasswordModal.find('.save-btn');

    saveBtn.click(() => {
        if(isEmptyOrSpaces(newPassIn.val()) || isEmptyOrSpaces(conPassIn.val()) || isEmptyOrSpaces(oldPassIn.val())) {
            return;
        }

        if(newPassIn.val() !== conPassIn.val()) {
            closeModalNoEvent(editPasswordModal);
            errorModal.find('.modal1-txt-title').html('Failed.');
            errorModal.find('.modal-text').html(`Confirm password doesn't match.`);
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(oldPassIn.val() !== oldPass) {
            closeModalNoEvent(editPasswordModal);
            errorModal.find('.modal1-txt-title').html('Failed.');
            errorModal.find('.modal-text').html(`Old password incorrect.`);
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(checkTheChanges([newPassIn], [oldPass]) > 0) {
            let formData = new FormData();
            formData.append('residentId', residentId);
            formData.append('password', newPassIn.val());
            formData.append('editType', "pass");

            closeModalNoEvent(editPasswordModal);
            editProfileDb(formData);
        }
    });
    
});

editPhoneBtn.click(() => {
    phoneIn.val(oldPhone);
    showModal(editPhoneModal);
    closeModal(editPhoneModal, false)

    let saveBtn = editPhoneModal.find('.save-btn');

    saveBtn.click(() => {
        if(isEmptyOrSpaces(phoneIn.val())) {
            return;
        }
    
        if(checkTheChanges([phoneIn], [oldPhone]) > 0) {
            let formData = new FormData();
            formData.append('residentId', residentId);
            formData.append('phone', phoneIn.val());
            formData.append('editType', "phone");
    
            closeModalNoEvent(editPhoneModal);
            editProfileDb(formData);
        }
    });
}); 

editAddressBtn.click(() => {
    addressIn.val(oldAddress);
    showModal(editAddressModal);
    closeModal(editAddressModal, false)

    let saveBtn = editAddressModal.find('.save-btn');

    saveBtn.click(() => {
        if(isEmptyOrSpaces(addressIn.val())) {
            return;
        }
    
        if(checkTheChanges([addressIn], [oldAddress]) > 0) {
            let formData = new FormData();
            formData.append('residentId', residentId);
            formData.append('address', addressIn.val());
            formData.append('editType', "address");
    
            closeModalNoEvent(editAddressModal);
            editProfileDb(formData);
        }
    });
});

editPfpBtn.click(() => {
    pfpIn.val('');
    pfpPrev.attr('src', `/assets/media/pfp/${oldPfp}`);
    showModal(editPfpModal);
    closeModal(editPfpModal, false)

    pfpIn.change(function() {
        if (this.files && this.files[0]) {
            const src = URL.createObjectURL(this.files[0]);
            pfpPrev.attr('src', src);
        }
    });

    let saveBtn = editPfpModal.find('.save-btn');

    saveBtn.click(() => {
        if(isEmptyOrSpaces(pfpIn.val())) {
            return;
        }
    
        let formData = new FormData();
        formData.append('residentId', residentId);
        formData.append('file', pfpIn[0].files[0]);
        formData.append('editType', "pfp");
    
        closeModalNoEvent(editPfpModal);
        editProfileDb(formData);
    });
});

function editProfileDb(formData) {
    $.ajax({
        type: "POST",
        url: "/editResidentProfile",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal-text').html('Saved Changes.');
                showModal(successModal);
                closeModal(successModal, true);
            } 
            else if(response.status == 201) {

            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed.');
                errorModal.find('.modal-text').html(response.message);
                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
}