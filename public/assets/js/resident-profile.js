// Btns
const editNameBtn = $('#edit-name-btn');
const editEmailBtn= $('#edit-email-btn');
const editPassBtn = $('#edit-pass-btn');
const editPhoneBtn = $('#edit-phone-btn');
const editAddressBtn = $('#edit-address-btn');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

const editNameModal = $('#patient-edit-name-modal');
const editEmailModal = $('#patient-edit-email-modal');
const editPasswordModal = $('#patient-edit-password-modal');
const editPhoneModal = $('#patient-edit-phone-modal');
const editAddressModal = $('#patient-edit-address-modal');

// Inputs
const fnameIn = $('#fname-in');
const mnameIn = $('#mname-in');
const lnameIn = $('#lname-in');

const emailIn = $('#email-in');

const newPassIn = $('#new-pass-in');
const conPassIn = $('#con-pass-in');
const oldPassIn = $('#old-pass-in');

const phoneIn = $('#phone-in');

const addressIn = $('#address-in');

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
    closeModal(editEmailModal, false)
});

editPassBtn.click(() => {
    showModal(editPasswordModal);
    closeModal(editPasswordModal, false)
});

editPhoneBtn.click(() => {
    phoneIn.val(oldPhone);
    showModal(editPhoneModal);
    closeModal(editPhoneModal, false)
}); 

editAddressBtn.click(() => {
    addressIn.val(oldAddress);
    showModal(editAddressModal);
    closeModal(editAddressModal, false)
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
            } else {
                errorModal.find('.modal-text').html('Failed saving changes please try again later.');
                showModal(errorModal);
                closeModal(errorModal, false);
                alert('appointment failed to add');
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
}