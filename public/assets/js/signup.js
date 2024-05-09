// Containers
const signinContainer = $('#signup-box');
const emailConfirmContainer = $('#email-verification-cont');

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

const otpIn = $('#otp-in');

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
            closeModalRedirect(errorModal, false);
        return;
    }

    if(passIn.val() != conPassIn.val()) {
        errorModal.find('.modal1-txt-title').html('Failed');
        errorModal.find('.modal1-txt').html("Password and Confirm password doesn't match.");

        showModal(errorModal);
        closeModalRedirect(errorModal, false);
        
        return;
    }

    let formData = new FormData();
    formData.append('fname', fnameIn.val());
    formData.append('mname', mnameIn.val());
    formData.append('lname', lnameIn.val());
    formData.append('email', emailIn.val());
    formData.append('address', phoneIn.val());
    formData.append('phone', bdateIn.val());
    formData.append('gender', genderIn.val());
    formData.append('bdate', passIn.val());
    formData.append('password', addressIn.val());

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
                closeModalRedirect(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
}

function setUpOTPForm() {
    signinContainer.addClass('d-none');
    emailConfirmContainer.removeClass('d-none');

    verifyBtn.click(() => {
        let formData = new FormData();
        formData.append('email', emailIn.val());
        formData.append('otp', otpIn.val());
        verifyEmail(formData);
    });
}

function verifyEmail(formData) {
    $.ajax({
        type: "POST",
        url: "/verifyEmail",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                alert('success');
            }
            else {
                alert(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
}