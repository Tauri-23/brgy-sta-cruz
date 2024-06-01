// Btns
const addAnnouncementBtn = $('#post-announcement');
const editAnnouncementBtn = $('#save-announcement');
const deleteAnnouncementBtn = $('.delete-announcement-btn');

// Inputs
const announcementTitleIn = $('#announcement-title-in');
const announcementPic = $('#announcement-cover');
const announcementContent = $('#text-editor-content');
const featuredCb = $('#featured-checkbox');


// Columns
const announcementColumns = $('.announcement-column');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNModal = $('#info-yn-modal');


addAnnouncementBtn.click(() => {
    if(isEmptyOrSpaces(announcementTitleIn.val()) || isEmptyOrSpaces(announcementContent.html())
        || isEmptyOrSpaces(announcementPic.val())) {
        return;
    }

    let formData = new FormData();
    formData.append('title', announcementTitleIn.val());
    formData.append('file', announcementPic[0].files[0]);
    formData.append('content', announcementContent.html());
    formData.append('featured', featuredCb.prop('checked') ? 1 : 0);

    $.ajax({
        type: "POST",
        url: "/addAnnouncementPost",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal-text').html('Announcement added successfully.');
                showModal(successModal);
                closeModalRedirect(successModal, '/AdminAnnouncements');
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

editAnnouncementBtn.click(() => {
    if(isEmptyOrSpaces(announcementTitleIn.val()) || isEmptyOrSpaces(announcementContent.html())) {
        return;
    }

    if(checkTheChanges([announcementTitleIn, announcementContent], 
        [oldTitle, oldContent]) > 0 || featuredCb.prop('checked') != oldFeatured) {
        let formData = new FormData();

        formData.append('id', annId);
        formData.append('title', announcementTitleIn.val());
        formData.append('file', announcementPic[0].files[0]);
        formData.append('content', announcementContent.html());
        formData.append('featured', featuredCb.prop('checked') ? 1 : 0);

        $.ajax({
            type: "POST",
            url: "/editAnnouncementPost",
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                if(response.status == 200) {
                    successModal.find('.modal1-txt-title').html('Success');
                    successModal.find('.modal-text').html('Changes Saved.');
                    showModal(successModal);
                    closeModalRedirect(successModal, '/AdminAnnouncements');
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
    }

    
})
let annIdDel = "";
deleteAnnouncementBtn.click(function() {
    annIdDel = $(this).data('announcement-id');

    infoYNModal.find('.modal1-txt-title').html('Warning');
    infoYNModal.find('.modal-text').html(`Do you want do remove this announcement (${annIdDel})?`);

    showModal(infoYNModal);
    closeModal(infoYNModal, false);
    
})

infoYNModal.find('.modal-close-btn').click(() => {
    closeModalNoEvent(infoYNModal);
});

infoYNModal.find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('annId', annIdDel);

    $.ajax({
        type: "POST",
        url: "/deleteAnnouncementPost",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal-text').html('Announcement Successfully Deleted.');
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