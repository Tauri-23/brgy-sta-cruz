// Btns
const addAdminBtn = $('#add-admin-btn');

// modals
const addAdminModal = $('#add-admin-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNModal = $('#info-yn-modal');

// inputs
const nameIn = $('#name-in');
const emailIn = $('#email-in');
const passIn = $('#pass-in');
const conPassIn = $('#con-pass-in');
const adminTypeIn = $('#admin-type-in');



// Add Admins
addAdminBtn.click(() => {
    showModal(addAdminModal);
    closeModal(addAdminModal, false);
});
addAdminModal.find('.add-btn').click(() => {
    if(isEmptyOrSpaces(nameIn.val()) || isEmptyOrSpaces(emailIn.val()) || isEmptyOrSpaces(passIn.val()) || 
        isEmptyOrSpaces(conPassIn.val()) || isEmptyOrSpaces(adminTypeIn.val())) {
        errorModal.find('.modal1-txt-title').html('Failed.');
        errorModal.find('.modal-text').html(`Please fill up all the fields.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(passIn.val() !== conPassIn.val()) {
        errorModal.find('.modal1-txt-title').html('Failed.');
        errorModal.find('.modal-text').html(`Password and Confirm Doesn't Match.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('name', nameIn.val());
    formData.append('email', emailIn.val());
    formData.append('pass', passIn.val());
    formData.append('adminType', adminTypeIn.val());

    $.ajax({
        type: "POST",
        url: "/addAdmin",
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
});

