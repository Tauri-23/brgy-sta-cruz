// Btns
const submitBtn = $('#submit-form');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNs = $('.info-yn-modal');

const brgyIdPrev = $('#brgy-id-cont');
const brgyClearancePrev = $('#brgy-clearance-cont');
const brgyConRenPrev = $('#brgy-con-ren-cont');


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
else if(documentType == 1) { // IF BRGY CLEARANCE
    const nameIn = $('#name-in');
    const addressIn = $('#address-in');
    const phoneIn = $('#phone-in');
    const bdateIn = $('#bdate-in');
    const genderIn = $('#gender-in');
    const purposeIn = $('#purpose-in');
    const otherPurposeIn = $('#other-purpose-in');

    let purpose = 'Employement';

    purposeIn.change(function() {
        purpose = $(this).val();

        if(purpose === 'Others') {
            otherPurposeIn.removeClass('d-none');
        }
        else {
            otherPurposeIn.addClass('d-none');
        }
    });

    submitBtn.click(() => {
        let isCompleteReq = false;

        if(isEmptyOrSpaces(nameIn.val()) || 
            isEmptyOrSpaces(addressIn.val()) || 
            isEmptyOrSpaces(phoneIn.val()) || 
            isEmptyOrSpaces(bdateIn.val()) || 
            (purpose === 'Others' && isEmptyOrSpaces(otherPurposeIn.val())) ||
            (purpose !== 'Others' && isEmptyOrSpaces(purposeIn.val()))) {
            
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

        const brgyclearancename = $('.brgy-clearance-name');
        const brgyclearanceaddress = $('.brgy-clearance-address');
        const brgyClearanceForWork = $('.brgy-clearance-for-work');
        const brgyClearanceForSchool = $('.brgy-clearance-for-school');
        const brgyClearanceForOthers = $('.brgy-clearance-for-others');
        const brgyClearanceForOthersSpecify = $('.brgy-clearance-for-others-specify');

        const brgyClearanceForWork2 = $('.brgy-clearance-for-work2');
        const brgyClearanceForSchool2 = $('.brgy-clearance-for-school2');
        const brgyClearanceForOthers2 = $('.brgy-clearance-for-others2');
        const brgyClearanceForOthersSpecify2 = $('.brgy-clearance-for-others-specify2');

            
        brgyclearancename.html(nameIn.val());
        brgyclearanceaddress.html(addressIn.val());
        if(purpose == "Employement") { //Check what will check depending on purpose
            brgyClearanceForWork.removeClass('d-none');
            brgyClearanceForSchool.addClass('d-none');
            brgyClearanceForOthers.addClass('d-none');
            brgyClearanceForOthersSpecify.addClass('d-none');

            brgyClearanceForWork2.removeClass('d-none');
            brgyClearanceForSchool2.addClass('d-none');
            brgyClearanceForOthers2.addClass('d-none');
            brgyClearanceForOthersSpecify2.addClass('d-none');
        }
        else if(purpose == "School Requirement") {
            brgyClearanceForWork.addClass('d-none');
            brgyClearanceForSchool.removeClass('d-none');
            brgyClearanceForOthers.addClass('d-none');
            brgyClearanceForOthersSpecify.addClass('d-none');

            brgyClearanceForWork2.addClass('d-none');
            brgyClearanceForSchool2.removeClass('d-none');
            brgyClearanceForOthers2.addClass('d-none');
            brgyClearanceForOthersSpecify2.addClass('d-none');
        }
        else {
            brgyClearanceForOthersSpecify.html(otherPurposeIn.val());

            brgyClearanceForWork.addClass('d-none');
            brgyClearanceForSchool.addClass('d-none');
            brgyClearanceForOthers.removeClass('d-none');
            brgyClearanceForOthersSpecify.removeClass('d-none');

            brgyClearanceForOthersSpecify2.html(otherPurposeIn.val());

            brgyClearanceForWork2.addClass('d-none');
            brgyClearanceForSchool2.addClass('d-none');
            brgyClearanceForOthers2.removeClass('d-none');
            brgyClearanceForOthersSpecify2.removeClass('d-none');
        }


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
        formData.append('purpose', purpose == "Others" ? otherPurposeIn.val() : purpose);
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
else { // IF RENOVATION OR BUILDING HOUSE CLEARANCE
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

        const brgyConREnName= $('.brgy-con-ren-name');
        const brgyConRenBuild = $('.brgy-for-build');
        const brgyConRenRenovate = $('.brgy-for-renovation');

            
        brgyConREnName.html(nameIn.val());
        $('.brgy-clearance-name-2').html(nameIn.val());
        $('.brgy-clearance-address-2').html(addressIn.val());

        if(documentType == 3) { // Building Permit
            brgyConRenBuild.removeClass('d-none');
            brgyConRenRenovate.addClass('d-none');
        }
        else if(documentType == 4) { // Renovation Permit
            brgyConRenBuild.addClass('d-none');
            brgyConRenRenovate.removeClass('d-none');
        }



        let cancelBtn = brgyConRenPrev.find('.cancel-btn');
        let approveBtn = brgyConRenPrev.find('.approve-btn');
        showModal(brgyConRenPrev);

        cancelBtn.click(() => {
            closeModalNoEvent(brgyConRenPrev);
        });

        approveBtn.click(() => {
            closeModalNoEvent(brgyConRenPrev);
            showModal(infoYNs.eq(0));
            closeModal(infoYNs.eq(0), false);
        });
        
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