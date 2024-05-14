// Containers
const signinContainer = $('#signin-cont');
const emailConfirmContainer = $('#email-verification-cont');

// Inputs
const emailIn = $('#email-in');
const passIn = $('#password-in');
const otpIn = $('#otp-in');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// Btns
const signinBtn = $('#signin-btn');
const verifyBtn = $('#verify-btn');


signinBtn.click(() => {
    let formData = new FormData();
    formData.append('email', emailIn.val());
    formData.append('password', passIn.val());
    $.ajax({
        type: "POST",
        url: "/signinPost",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                window.location.href="/ResidentDashboard"
            }
            else if(response.status == 201) {
                setUpOTPForm();
            }
            else if(response.status == 202) {
                window.location.href="/AdminDashboard"
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html("Credentials doesn't match.");

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
                window.location.href="/ResidentDashboard"
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