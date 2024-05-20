// Btns
const sendFeedBackBtn = $('#send-feedback-btn');

// Inputs
const feedbackIn = $('#feedback-in');

// Modals
const successModal = $('#success-modal');

sendFeedBackBtn.click(() => {
    if(isEmptyOrSpaces(feedbackIn.val())) {
        return;
    }

    let formData = new FormData();
    formData.append('content', feedbackIn.val());

    $.ajax({
        type: "POST",
        url: "/sendFeedback",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal1-txt').html('Feedback Sent.');
                showModal(successModal);
                closeModal(successModal, false);
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
});