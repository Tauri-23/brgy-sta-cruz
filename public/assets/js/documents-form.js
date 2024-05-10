// inputs
const nameIn = $('#name-in');
const addressIn = $('#address-in');
const phoneIn = $('#phone-in');
const bdateIn = $('#bdate-in');
const genderIn = $('#gender-in');

const requirementsIn = $('.req-in');
const requirementsFor = $('.requirements-for');

// Btns
const submitBtn = $('#submit-form');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNs = $('.info-yn-modal');


formatPhoneNumIn(phoneIn);

submitBtn.click(() => {
    let isCompleteReq = false;

    if(isEmptyOrSpaces(nameIn.val()) || isEmptyOrSpaces(addressIn.val()) || isEmptyOrSpaces(phoneIn.val()) ||
        isEmptyOrSpaces(bdateIn.val())) {
        
        errorModal.find('.modal1-txt-title').html('Failed');
        errorModal.find('.modal1-txt').html('Please fill up all the required fields.');

        showModal(errorModal);
        closeModal(errorModal, false);
        
        return;
    }

    requirementsIn.each(function() {
        if(isEmptyOrSpaces($(this).val())) {
            isCompleteReq = false;
            return
        }
        isCompleteReq = true;
    });

    if(!isCompleteReq) {
        errorModal.find('.modal1-txt-title').html('Failed');
        errorModal.find('.modal1-txt').html('Please fill up all the required fields.');

        showModal(errorModal);
        closeModal(errorModal, false);
        
        return;
    }

    showModal(infoYNs.eq(0));
    closeModal(infoYNs.eq(0), false);
});

let yesBtn = infoYNs.eq(0).find('.yes-btn');
infoYNs.eq(0).find('.modal1-txt-title').html('Submit Application');
infoYNs.eq(0).find('.modal1-txt').html('Do you want to submit this application?');
yesBtn.click(() => {
    let formData = new FormData();
    formData.append('documentType', documentType);
    formData.append('name', nameIn.val());
    formData.append('address', addressIn.val());
    formData.append('phone', phoneIn.val());
    formData.append('bdate', bdateIn.val());
    formData.append('gender', genderIn.val());

    $.each(requirementsIn, function(i, file) {
        let files = requirementsIn[i].files[0];
        let reqFor = requirementsFor.eq(i).val();

        formData.append('requirements[]', files);
        formData.append('fileReqFor[]', reqFor);
    });

    addApplicationToDb(formData);
});

function addApplicationToDb(formData) {
    $.ajax({
        type: "POST",
        url: "/RequestDocumentPost",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt-title').html('Success');
                successModal.find('.modal1-txt').html('Document application success.');

                closeModalNoEvent(infoYNs.eq(0));
                showModal(successModal);
                closeModalRedirect(successModal, '/ResidentDocuments');
            }
            else {
                errorModal.find('.modal1-txt-title').html('Failed');
                errorModal.find('.modal1-txt').html(response.message);

                closeModalNoEvent(infoYNs.eq(0));
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

function setupProductPreview() {

}