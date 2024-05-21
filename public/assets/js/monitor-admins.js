// Btns
const addAdminBtn = $('#add-admin-btn');
const changeRoleBtns = $('.change-role-btn');
const delAdminBtns = $('.del-adm-btn');

// modals
const addAdminModal = $('#add-admin-modal');
const changeRoleAdminModal = $('#change-role-admin-modal');

const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNModal = $('#info-yn-modal');

// inputs
const nameIn = $('#name-in');
const emailIn = $('#email-in');
const passIn = $('#pass-in');
const conPassIn = $('#con-pass-in');
const adminTypeIn = $('#admin-type-in');

const changeRoleAdminIn = $('#change-admin-type-in');



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

    updateAdminDb(formData, "/addAdmin");
});



// Change Admin Role
let filteredAdmins = [];

changeRoleBtns.click(function() {
    filteredAdmins = admins.filter(adm => adm.id == $(this).attr('id'));

    changeRoleAdminModal.find('#admin-name-txt').html(filteredAdmins[0].name);
    changeRoleAdminModal.find('#admin-id-txt').html(`(${filteredAdmins[0].id})`);
    changeRoleAdminIn.val(filteredAdmins[0].admin_type);

    showModal(changeRoleAdminModal);
    closeModal(changeRoleAdminModal, false);
});

changeRoleAdminModal.find('.change-admin-role-btn').click(() => {

    if(filteredAdmins[0].admin_type == changeRoleAdminIn.val()) {
        return;
    }

    let formData = new FormData();
    formData.append('id', filteredAdmins[0].id);
    formData.append('newRole', changeRoleAdminIn.val());

    updateAdminDb(formData, "/changeRoleAdmin");
});


// Del Admin
let adminToDelId = '';
delAdminBtns.click(function() {
    adminToDelId = $(this).attr('id');

    infoYNModal.find('.modal1-txt-title').html('Delete Admin');
    infoYNModal.find('.modal1-txt').html(`Do you delete admin ${adminToDelId}?`);
    showModal(infoYNModal);
    closeModal(infoYNModal, false);
});
infoYNModal.find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('id', adminToDelId);

    updateAdminDb(formData, "/delAdmin");
});




function updateAdminDb(formData, link) {
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
