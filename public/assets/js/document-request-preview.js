// Modals
const brgyIdPreview = $('#brgy-id-cont');
const brgyClearancePrev = $('#brgy-clearance-cont');
const brgyConRenoPrev = $('#brgy-con-ren-cont');

// Btns
const prevDocBtn = $('#preview-document-btn');


prevDocBtn.click(() => {
    if(documentType == 1) { // Brgy ID
        console.log(documentInfo);
        const brgyclearancename = $('.brgy-clearance-name');
        const brgyclearanceaddress = $('.brgy-clearance-address');
        const brgyClearanceForWork = $('.brgy-clearance-for-work');
        const brgyClearanceForSchool = $('.brgy-clearance-for-school');
        const brgyClearanceForOthers = $('.brgy-clearance-for-others');
        const brgyClearanceForOthersSpecify = $('.brgy-clearance-for-others-specify');

        brgyclearancename.html(documentInfo.name);
        brgyclearanceaddress.html(documentInfo.address);

        if(documentInfo.brgy_clearance_purpose == "Employement") {
            brgyClearanceForWork.removeClass('d-none');
            brgyClearanceForSchool.addClass('d-none');
            brgyClearanceForOthers.addClass('d-none');
            brgyClearanceForOthersSpecify.addClass('d-none');
        }
        else if(documentInfo.brgy_clearance_purpose == "School Requirement") {
            brgyClearanceForWork.addClass('d-none');
            brgyClearanceForSchool.removeClass('d-none');
            brgyClearanceForOthers.addClass('d-none');
            brgyClearanceForOthersSpecify.addClass('d-none');
        }
        else {
            brgyClearanceForOthersSpecify.html(documentInfo.brgy_clearance_purpose);

            brgyClearanceForWork.addClass('d-none');
            brgyClearanceForSchool.addClass('d-none');
            brgyClearanceForOthers.removeClass('d-none');
            brgyClearanceForOthersSpecify.removeClass('d-none');
        }

        showModal(brgyClearancePrev);
        closeModal(brgyClearancePrev, false);
    }
    else if(documentType == 2) { // BRGY Clearance
        console.log(documentInfo);
        console.log(requirements);
        const brgyidname = $('.brgy-id-name');
        const brgyidpfp = $('.brgy-id-pfp');
        const brgyidaddress = $('.brgy-id-address');
        const brgyidphone = $('.brgy-id-phone');
        const brgyidTIN = $('.brgy-id-TIN');
        const brgyidSSS = $('.brgy-id-SSS');
        const brgyidbdate = $('.brgy-id-bdate');
        const brgyidplacebdate = $('.brgy-id-place-bdate');
        const brgyidbloodtype = $('.brgy-id-blood-type');

        brgyidname.html(documentInfo.name);
        brgyidpfp.attr('src', `/assets/media/requirements/${requirements[0].filename}`);
        brgyidaddress.html(documentInfo.address);
        brgyidphone.html(`0${documentInfo.phone}`);
        brgyidTIN.html(documentInfo.tin);
        brgyidSSS.html(documentInfo.sss);
        brgyidbdate.html(documentInfo.bdate);
        brgyidplacebdate.html(documentInfo.bdate_place);
        brgyidbloodtype.html(documentInfo.blood_type);

        showModal(brgyIdPreview);
        closeModal(brgyIdPreview, false);
    }
    else { // Brgy Build and Renovation
        const brgyConREnName= $('.brgy-con-ren-name');
        const brgyConRenBuild = $('.brgy-for-build');
        const brgyConRenRenovate = $('.brgy-for-renovation');

        brgyConREnName.html(documentInfo.name);


        if(documentType == 3) { // Building Permit
            brgyConRenBuild.removeClass('d-none');
            brgyConRenRenovate.addClass('d-none');
        }
        else if(documentType == 4) { // Renovation Permit
            brgyConRenBuild.addClass('d-none');
            brgyConRenRenovate.removeClass('d-none');
        }

        showModal(brgyConRenoPrev);
        closeModal(brgyConRenoPrev, false);
    }
});