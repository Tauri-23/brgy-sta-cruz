// Modals
const imgReqModal = $('#requirement-modal-img');
const pdfReqModal = $('#requirement-modal-pdf');
const rejectRequestModal = $('#admin-reject-req-modal');
const approveRequestModal = $('#admin-accept-req-modal');

const adminCompleteReqModal = $('#admin-complete-req-modal');
const infoYNModals = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// requirements
const reqirementCards = $('.req-card');

// inputs
const reasonIn = $('#reason-in');
const pickupDateIn = $('#pickup-in');

// Btns
const rejectBtn = $('#reject-btn');
const approveBtn = $('#approve-btn');
const markASCompleteBtn = $('#mark-as-complete-btn');

const downloadImageBtn = $('#dwnld-image-btn');

reqirementCards.click(function() {
    const file = $(this).find('#file-name').val();
    const fileUrl = `/assets/media/requirements/${file}`;

    if(checkFileType(file) == "image") {
        imgReqModal.find('#req-img').attr('src', fileUrl);
        imgReqModal.find('#req-name').html($(this).find('#req-for').html());

        downloadImageBtn.attr('href', fileUrl);
        downloadImageBtn.attr('download', file);

        showModal(imgReqModal);
        closeModal(imgReqModal, false);
    }
    else {
        pdfReqModal.find('#req-file').attr('src', `/assets/media/requirements/${file}`);
        pdfReqModal.find('#req-name').html($(this).find('#req-for').html());

        showModal(pdfReqModal);
        closeModal(pdfReqModal, false);
    }

    
});

// Reject
rejectBtn.click(() => {
    showModal(rejectRequestModal);
    closeModal(rejectRequestModal, false)
})
rejectRequestModal.find('.reject-btn').click(() => {
    infoYNModals.eq(0).find('.modal1-txt-title').html('Reject Application?');
    infoYNModals.eq(0).find('.modal1-txt').html('Do you want to reject this application?');
    showModal(infoYNModals.eq(0));
    closeModal(infoYNModals.eq(0));
});

infoYNModals.eq(0).find('.yes-btn').click(() => {

    if(isEmptyOrSpaces(reasonIn.val())) {
        return;
    }
    
    let formData = new FormData();
    formData.append('type', type);
    formData.append('id', reqId);
    formData.append('reason', reasonIn.val());

    $.ajax({
        type: "POST",
        url: "/RejectDocumentApplication",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal1-txt').html('Document Application Rejected.');

                showModal(successModal);
                closeModalRedirect(successModal, '/AdminDocuments');
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html('Failed, Try again later.');

                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
})


// Approve
approveBtn.click(() => {
    showModal(approveRequestModal);
    closeModal(approveRequestModal, false);
});
approveRequestModal.find('.approve-btn').click(() => {
    infoYNModals.eq(1).find('.modal1-txt-title').html('Approve Application?');
    infoYNModals.eq(1).find('.modal1-txt').html('Do you want to approve this application?');
    showModal(infoYNModals.eq(1));
    closeModal(infoYNModals.eq(1));
});

infoYNModals.eq(1).find('.yes-btn').click(() => {

    if(isEmptyOrSpaces(pickupDateIn.val())) {
        return;
    }
    
    let formData = new FormData();
    formData.append('type', type);
    formData.append('id', reqId);
    formData.append('pickupDate', pickupDateIn.val());

    $.ajax({
        type: "POST",
        url: "/ApproveDocumentApplication",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal1-txt').html('Document Application Accepted and its for pickup.');

                showModal(successModal);
                closeModalRedirect(successModal, '/AdminDocuments');
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html('Failed, Try again later.');

                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
})

// Mark as complete
const referenceNumIn = adminCompleteReqModal.find('#reference-in');
const completeReqBtn = adminCompleteReqModal.find('.complete-btn');
markASCompleteBtn.click(() => {

    onlyNumericInput(referenceNumIn);
    showModal(adminCompleteReqModal);
    closeModal(adminCompleteReqModal, false);
    
})

completeReqBtn.click(() => {
    if(isEmptyOrSpaces(referenceNumIn.val())) {
        return;
    }

    infoYNModals.eq(2).find('.modal1-txt-title').html('Complete Application?');
    infoYNModals.eq(2).find('.modal1-txt').html('Do you want to mark as complete this application?');
    showModal(infoYNModals.eq(2));
    closeModal(infoYNModals.eq(2));
});

infoYNModals.eq(2).find('.yes-btn').click(() => {
    
    let formData = new FormData();
    formData.append('type', type);
    formData.append('refNum', referenceNumIn.val());
    formData.append('id', reqId);

    $.ajax({
        type: "POST",
        url: "/CompleteDocumentApplication",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal1-txt').html('Document Application Completed.');

                showModal(successModal);
                closeModalRedirect(successModal, '/AdminDocuments');
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html('Failed, Try again later.');

                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
})
