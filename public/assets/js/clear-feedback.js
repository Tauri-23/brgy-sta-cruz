// btns
const clearFeedbackBtn = $("#clear-feedback-btn");

// modasl
const successModal = $('#success-modal');
const infoYNModal = $('#info-yn-modal');

clearFeedbackBtn.click(() => {
    infoYNModal.find('.modal1-txt-title').html('Clear Feedbacks');
    infoYNModal.find('.modal1-txt').html('Do you want to clear all feedbacks?');
    showModal(infoYNModal);
    closeModal(infoYNModal, false);
});

infoYNModal.find('.yes-btn').click(() => {
    $.ajax({
        type: "POST",
        url: "/clearFeedbacks",
        processData: false,
        contentType: false,
        // data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal-text').html('Success.');
                showModal(successModal);
                closeModal(successModal, true);
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed.');
                errorModal.find('.modal-text').html('Something went wrong');
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