// btns
const forgotPassBtn = $('#forgot-pass-btn');

// Containers
const signinCont = $('#signin-cont');
const forgotPass1 = $('#forgot-password-cont-1');
const forgotPass2 = $('#forgot-password-cont-2');
const forgotPass3 = $('#forgot-password-cont-3');

// input
const forgotPassEmailIn = $('#forgot-pass-email-in');
const forgotPassOTPIn = $('#forgot-pass-otp-in');
const forgotPassNewPassIn = $('#new-pass-in');
const forgotPassConPassIn = $('#con-pass-in');

forgotPassBtn.click(() => {
    signinCont.addClass('d-none');
    forgotPass1.removeClass('d-none');
})

forgotPass1.find('#next-btn').click(() => {
    if(isEmptyOrSpaces(forgotPassEmailIn.val())) {
        return;
    }

    if(!isEmail(forgotPassEmailIn.val())) {
        errorModal.find('.modal1-txt-title').html('Failed');
        errorModal.find('.modal1-txt').html('Invalid email.');

        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('email', forgotPassEmailIn.val());
    formData.append('processType', 'sendOTP');

    $.ajax({
        type: "POST",
        url: "/forgotPass",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                forgotPass1.addClass('d-none');
                forgotPass2.removeClass('d-none');
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html(response.message);

                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
});


forgotPass2.find('#next-btn').click(() => {
    if(isEmptyOrSpaces(forgotPassOTPIn.val())) {
        return;
    }

    let formData = new FormData();
    formData.append('email', forgotPassEmailIn.val());
    formData.append('otp', forgotPassOTPIn.val());
    formData.append('processType', 'verifyOTP');

    $.ajax({
        type: "POST",
        url: "/forgotPass",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                forgotPass2.addClass('d-none');
                forgotPass3.removeClass('d-none');
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html(response.message);

                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
});

forgotPass3.find('#next-btn').click(() => {
    if(isEmptyOrSpaces(forgotPassOTPIn.val())) {
        return;
    }

    if(forgotPassNewPassIn.val() != forgotPassConPassIn.val()) {
        errorModal.find('.modal1-txt-title').html('Failed');
        errorModal.find('.modal1-txt').html("Confirm Password doesnt match.");

        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('email', forgotPassEmailIn.val());
    formData.append('password', forgotPassNewPassIn.val());
    formData.append('processType', 'changePassword');

    $.ajax({
        type: "POST",
        url: "/forgotPass",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal1-txt').html("Password Successfully Changed Please Login Again.");

                showModal(successModal);
                closeModal(successModal, true);
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html(response.message);

                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
});