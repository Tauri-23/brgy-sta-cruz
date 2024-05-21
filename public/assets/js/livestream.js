// btns
const startStreamingBtn = $('#start-streaming-btn');
const stopStreamingBtn = $('#stop-streaming-btn');

// modals
const livesteamStartModal = $('#livesteam-start-modal');
const infoYNModal = $('#info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// inputs
const liveLinkIn = $('#input-link-in');


startStreamingBtn.click(() => {
    showModal(livesteamStartModal);
    closeModal(livesteamStartModal, false);
});
livesteamStartModal.find('.start-live-btn').click(() => {
    if(isEmptyOrSpaces(liveLinkIn.val())) {
        return;
    }

    let formData = new FormData();
    formData.append('link', liveLinkIn.val());

    updateLiveStreamDb(formData, '/startLivestream');
});


stopStreamingBtn.click(() => {
    infoYNModal.find('.modal1-txt-title').html('Stop Streaming');
    infoYNModal.find('.modal1-txt').html(`Do you want to stop the livestream?`);
    showModal(infoYNModal);
    closeModal(infoYNModal, false);
});
infoYNModal.find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('id', 1);
    updateLiveStreamDb(formData, '/stopLivestream');
});



function updateLiveStreamDb(formData, link) {
    $.ajax({
        type: "POST",
        url: link,
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal-text').html(response.message);
                showModal(successModal);
                closeModal(successModal, true);
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