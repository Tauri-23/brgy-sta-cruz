// Btns
const submitBtn = $('#submit-form');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');
const infoYNs = $('.info-yn-modal');

const brgyIdPrev = $('#brgy-id-prev-cont');
const brgyClearancePrev = $('#brgy-clearance-prev-cont');
const brgyConRenPrev = $('#brgy-permit-prev-cont');


const requirementsIn = $('.req-in');
const requirementsFor = $('.requirements-for');


const formCont = $('#form-cont');


const startHour = 8;
const endHour = 10;

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
    const brgyidname = $('#brgy-id-name');
    const brgyidpfp = $('#brgy-id-pic');
    const brgyidaddress = $('#brgy-id-address');
    const brgyidphone = $('#brgy-id-contact');
    const brgyidTIN = $('#brgy-id-tin');
    const brgyidSSS = $('#brgy-id-sss');
    const brgyidbdate = $('#brgy-id-bdate');
    const brgyidplacebdate = $('#brgy-id-bdate-place');
    const brgyidbloodtype = $('#brgy-id-blood');

    formatPhoneNumIn(phoneIn);

    submitBtn.click(() => {
        let isCompleteReq = false;

        const currentHour = new Date().getHours();
        console.log(`Current Hour: ${currentHour}`);
        if (currentHour < startHour || currentHour >= endHour) {
            
            errorModal.find('.modal1-txt-title').html('Failed');
            errorModal.find('.modal1-txt').html('Requesting is only available from 8am to 10pm. Please try again later.');

            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

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

        formCont.addClass('d-none');
        brgyIdPrev.removeClass('d-none');


        cancelBtn.click(() => {
            formCont.removeClass('d-none');
            brgyIdPrev.addClass('d-none');
        });

        approveBtn.click(() => {
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

        const currentHour = new Date().getHours();
        console.log(`Current Hour: ${currentHour}`);
        if (currentHour < startHour || currentHour >= endHour) {
            
            errorModal.find('.modal1-txt-title').html('Failed');
            errorModal.find('.modal1-txt').html('Requesting is only available from 8am to 10pm. Please try again later.');

            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }
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

        const brgyclearancename = $('#brgy-clearance-name');
        const brgyclearanceaddress = $('#brgy-clearance-address');
        const brgyClearanceForWork = $('#brgy-clearance-for-emp');
        const brgyClearanceForSchool = $('#brgy-clearance-for-school-req');
        const brgyClearanceForOthers = $('#brgy-clearance-for-others');
        const brgyClearanceForOthersSpecify = $('#brgy-clearance-others-in');  
        
        const brgyClearanceForWork2 = $('.brgy-clearance-for-work2');
        const brgyClearanceForSchool2 = $('.brgy-clearance-for-school2');
        const brgyClearanceForOthers2 = $('.brgy-clearance-for-others2');
        const brgyClearanceForOthersSpecify2 = $('.brgy-clearance-for-others-specify2');

            
        brgyclearancename.html(nameIn.val());
        brgyclearanceaddress.html(addressIn.val());
        if(purpose == "Employement") { //Check what will check depending on purpose

            brgyClearanceForWork.html('X');
            brgyClearanceForSchool.html();
            brgyClearanceForOthers.html();
            brgyClearanceForOthersSpecify.html();

        }
        else if(purpose == "School Requirement") {
            brgyClearanceForWork.html();
            brgyClearanceForSchool.html('X');
            brgyClearanceForOthers.html();
            brgyClearanceForOthersSpecify.html();
        }
        else {
            brgyClearanceForWork.html();
            brgyClearanceForSchool.html();
            brgyClearanceForOthers.html('X');
            brgyClearanceForOthersSpecify.html(otherPurposeIn.val());
        }


        let cancelBtn = brgyClearancePrev.find('.cancel-btn');
        let approveBtn = brgyClearancePrev.find('.approve-btn');
        formCont.addClass('d-none');
        brgyClearancePrev.removeClass('d-none');

        cancelBtn.click(() => {
            formCont.removeClass('d-none');
            brgyClearancePrev.addClass('d-none');
        });

        approveBtn.click(() => {
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

        const currentHour = new Date().getHours();
        console.log(`Current Hour: ${currentHour}`);
        if (currentHour < startHour || currentHour >= endHour) {
            
            errorModal.find('.modal1-txt-title').html('Failed');
            errorModal.find('.modal1-txt').html('Requesting is only available from 8am to 10pm. Please try again later.');

            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }
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

        

        const brgyConREnName= $('#brgy-permit-name');
        const brgyConREnAddress= $('#brgy-permit-address');
        const brgyConRenBuild = $('#brgy-permit-build');
        const brgyConRenRenovate = $('#brgy-permit-renov');

            
        brgyConREnName.html(nameIn.val());
        brgyConREnAddress.html(addressIn.val());

        if(documentType == 3) { // Building Permit
            brgyConRenBuild.html('X');
            brgyConRenRenovate.html('');
        }
        else if(documentType == 4) { // Renovation Permit
            brgyConRenBuild.html('');
            brgyConRenRenovate.html('X');
        }



        let cancelBtn = brgyConRenPrev.find('.cancel-btn');
        let approveBtn = brgyConRenPrev.find('.approve-btn');
        formCont.addClass('d-none');
        brgyConRenPrev.removeClass('d-none');

        cancelBtn.click(() => {
            formCont.removeClass('d-none');
            brgyConRenPrev.addClass('d-none');
        });

        approveBtn.click(() => {
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



function timeRestriction() {
    const currentHour = new Date().getHours();
    console.log(`Current Hour: ${currentHour}`);
    if (currentHour < startHour || currentHour >= endHour) {
        console.log('Button disabled');
        requestDocumentBtn.css('pointer-events', 'none');
        requestDocumentBtn.text('OPEN FROM 8AM to 10AM');
    } else {
        console.log('Button enabled');
        requestDocumentBtn.prop('disabled', false);
        requestDocumentBtn.text('Request Document Now')
    }
}