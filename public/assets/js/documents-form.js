// Btns
const submitBtn = $('#submit-form');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNs = $('.info-yn-modal');

const brgyIdPrev = $('#brgy-id-cont');
const brgyClearancePrev = $('#brgy-clearance-cont');


const requirementsIn = $('.req-in');
const requirementsFor = $('.requirements-for');



if(documentType == 2) { // If Brgy Id
    const nameIn = $('#name-in');
    const addressIn = $('#address-in');
    const phoneIn = $('#phone-in');
    const tinIn = $('#tin-in'); // optional
    const sssIn = $('#sss-in'); // optional
    const bdateIn = $('#bdate-in');
    const bdatePlaceIn = $('#bdate-place-in');
    const bloodTypeIn = $('#blood-type-in'); // optional


    // Preview
    const brgyidname = $('.brgy-id-name');
    const brgyidpfp = $('.brgy-id-pfp');
    const brgyidaddress = $('.brgy-id-address');
    const brgyidphone = $('.brgy-id-phone');
    const brgyidTIN = $('.brgy-id-TIN');
    const brgyidSSS = $('.brgy-id-SSS');
    const brgyidbdate = $('.brgy-id-bdate');
    const brgyidplacebdate = $('.brgy-id-place-bdate');
    const brgyidbloodtype = $('.brgy-id-blood-type');

    formatPhoneNumIn(phoneIn);

    submitBtn.click(() => {
        let isCompleteReq = false;

        if(isEmptyOrSpaces(nameIn.val()) || isEmptyOrSpaces(addressIn.val()) || isEmptyOrSpaces(phoneIn.val()) ||
            isEmptyOrSpaces(bdateIn.val()) || isEmptyOrSpaces(bdatePlaceIn.val())) {
            
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

        brgyidname.html(nameIn.val());
        brgyidpfp.attr('src', URL.createObjectURL(requirementsIn[0].files[0]));
        brgyidaddress.html(addressIn.val());
        brgyidphone.html(`0${phoneIn.val()}`);
        brgyidTIN.html(tinIn.val());
        brgyidSSS.html(sssIn.val());
        brgyidbdate.html(bdateIn.val());
        brgyidplacebdate.html(bdatePlaceIn.val());
        brgyidbloodtype.html(bloodTypeIn.val());

        let cancelBtn = brgyIdPrev.find('.cancel-btn');
        let approveBtn = brgyIdPrev.find('.approve-btn');
        showModal(brgyIdPrev);

        cancelBtn.click(() => {
            closeModalNoEvent(brgyIdPrev);
        });

        approveBtn.click(() => {
            closeModalNoEvent(brgyIdPrev);
            showModal(infoYNs.eq(0));
            closeModal(infoYNs.eq(0), false);
        });

        
    });


    // Brgy Id Confirmation Modal
    let yesBtn = infoYNs.eq(0).find('.yes-btn');
    infoYNs.eq(0).find('.modal1-txt-title').html('Submit Application');
    infoYNs.eq(0).find('.modal1-txt').html('Do you want to submit this application?');
    yesBtn.click(() => {
        let formData = new FormData();
        formData.append('documentType', documentType);
        formData.append('name', nameIn.val());
        formData.append('address', addressIn.val());
        formData.append('phone', phoneIn.val());
        formData.append('tin', tinIn.val());
        formData.append('sss', sssIn.val());
        formData.append('bdate', bdateIn.val());
        formData.append('bdatePlace', bdatePlaceIn.val());
        formData.append('bloodType', bloodTypeIn.val());

        $.each(requirementsIn, function(i, file) {
            let files = requirementsIn[i].files[0];
            let reqFor = requirementsFor.eq(i).val();

            formData.append('requirements[]', files);
            formData.append('fileReqFor[]', reqFor);
        });
        

        addApplicationToDb(formData);
    });

}
else {
    const nameIn = $('#name-in');
    const addressIn = $('#address-in');
    const phoneIn = $('#phone-in');
    const bdateIn = $('#bdate-in');
    const genderIn = $('#gender-in');

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

        if(documentType == 1) {
            const brgyclearancename= $('.brgy-clearance-name');
            const brgyclearanceaddress= $('.brgy-clearance-address');

            
            brgyclearancename.html(nameIn.val());
            brgyclearanceaddress.html(addressIn.val());


            let cancelBtn = brgyClearancePrev.find('.cancel-btn');
            let approveBtn = brgyClearancePrev.find('.approve-btn');
            showModal(brgyClearancePrev);

            cancelBtn.click(() => {
                closeModalNoEvent(brgyClearancePrev);
            });

            approveBtn.click(() => {
                closeModalNoEvent(brgyClearancePrev);
                showModal(infoYNs.eq(0));
                closeModal(infoYNs.eq(0), false);
            });
        }
        else {
            showModal(infoYNs.eq(0));
            closeModal(infoYNs.eq(0), false);
        }
        
    });

    // Others Confirmation Modal
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
}

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