// Modals
const imgReqModal = $('#requirement-modal-img');
const pdfReqModal = $('#requirement-modal-pdf');

// requirements
const reqirementCards = $('.req-card');

reqirementCards.click(function() {
    const file = $(this).find('#file-name').val();

    if(checkFileType(file) == "image") {
        imgReqModal.find('#req-img').attr('src', `/assets/media/requirements/${file}`);
        imgReqModal.find('#req-name').html($(this).find('#req-for').html());

        showModal(imgReqModal);
        closeModal(imgReqModal, false);
    }
    else {

    }

    
});