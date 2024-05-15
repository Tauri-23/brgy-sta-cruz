// columns
const residentColumns = $('.resident-column');

// modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNModal = $('#info-yn-modal');


let IdtoDel = "";
residentColumns.find('.del-res-btn').click(function() {
    IdtoDel = $(this).attr('id');

   
    infoYNModal.find('.modal1-txt-title').html('Delete Resident');
    infoYNModal.find('.modal1-txt').html(`Do you want to delete this resident (${IdtoDel})?`);

    showModal(infoYNModal);
    closeModal(infoYNModal, false);
});

infoYNModal.find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('resId', IdtoDel);
    
    $.ajax({
        type: "POST",
        url: "/deleteResidentPost",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal-text').html('Resident Successfully Deleted.');
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