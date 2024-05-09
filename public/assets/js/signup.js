// Containers
const signinContainer = $('#signup-box');

// inputs
const fnameIn = $('#fname-in');
const mnameIn = $('#mname-in');
const lnameIn = $('#lname-in');

const emailIn = $('#email-in');
const phoneIn = $('#phone-in');

const bdateIn = $('#bdate-in');
const genderIn = $('#gender-in');

const passIn = $('#pass-in');
const conPassIn = $('#con-pass-in');

const addressIn = $('#address-in');

// Btns
const signinBtn = $('#signup-btn1');
const verifyBtn =$('#verify-btn');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

formatPhoneNumIn(phoneIn);

signinBtn.click(function() {
    if(isEmptyOrSpaces(fnameIn.val()) ||isEmptyOrSpaces(lnameIn.val()) || isEmptyOrSpaces(emailIn.val()) ||
        isEmptyOrSpaces(phoneIn.val()) || isEmptyOrSpaces(bdateIn.val()) || isEmptyOrSpaces(genderIn.val()) ||
        isEmptyOrSpaces(passIn.val()) || isEmptyOrSpaces(conPassIn.val()) || isEmptyOrSpaces(addressIn.val())) {
        
            errorModal.find('.modal1-txt-title').html('Failed');
            errorModal.find('.modal1-txt').html('Please fill up all the required fields.');

            showModal(errorModal);
            closeModal(errorModal, false);
        return;
    }

    if(passIn.val() != conPassIn.val()) {
        errorModal.find('.modal1-txt-title').html('Failed');
        errorModal.find('.modal1-txt').html("Password and Confirm password doesn't match.");

        showModal(errorModal);
        closeModal(errorModal, false);
        
        return;
    }

    let formData = new FormData();
    formData.append('fname', fnameIn.val());
    formData.append('mname', mnameIn.val());
    formData.append('lname', lnameIn.val());
    formData.append('email', emailIn.val());
    formData.append('phone', phoneIn.val());
    formData.append('bdate', bdateIn.val());
    formData.append('gender', genderIn.val());
    formData.append('password', passIn.val());
    formData.append('address', addressIn.val());

    createResident(formData);

    
});

function createResident(formData) {
    $.ajax({
        type: "POST",
        url: "/signupPost",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal1-txt').html('Account successfuly created');

                showModal(successModal);
                closeModalRedirect(successModal, '/signin');
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html('Something went wrong.');

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

//TODO:: email checker