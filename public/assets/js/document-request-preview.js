// Modals
const brgyIdPreview = $('#brgy-id-prev-cont');
const brgyClearancePrev = $('#brgy-clearance-prev-cont');
const brgyConRenoPrev = $('#brgy-permit-prev-cont');
const requestPrevCont = $('#request-cont');

// Btns
const prevDocBtn = $('#preview-document-btn');


prevDocBtn.click(() => {
    if(documentType == 1) { // Brgy CLEARANCE
        console.log(documentInfo);
        const brgyclearancename = $('#brgy-clearance-name');
        const brgyclearanceaddress = $('#brgy-clearance-address');
        const brgyClearanceForWork = $('#brgy-clearance-for-emp');
        const brgyClearanceForSchool = $('#brgy-clearance-for-school-req');
        const brgyClearanceForOthers = $('#brgy-clearance-for-others');
        const brgyClearanceForOthersSpecify = $('#brgy-clearance-others-in');

        brgyclearancename.html(documentInfo.name);
        brgyclearanceaddress.html(documentInfo.address);

        if(documentInfo.brgy_clearance_purpose == "Employement") {
            brgyClearanceForWork.html('X');
            brgyClearanceForSchool.html('');
            brgyClearanceForOthers.html('');
            brgyClearanceForOthersSpecify.html('');
        }
        else if(documentInfo.brgy_clearance_purpose == "School Requirement") {
            brgyClearanceForWork.html('');
            brgyClearanceForSchool.html('X');
            brgyClearanceForOthers.html('');
            brgyClearanceForOthersSpecify.html('');
        }
        else {
            brgyClearanceForWork.html('');
            brgyClearanceForSchool.html('');
            brgyClearanceForOthers.html('X');
            brgyClearanceForOthersSpecify.html(documentInfo.brgy_clearance_purpose);
        }
        requestPrevCont.addClass('d-none');
        brgyClearancePrev.removeClass('d-none');

        brgyClearancePrev.find('.close-btn').click(() => {
            requestPrevCont.removeClass('d-none');
            brgyClearancePrev.addClass('d-none');
        });
    }
    else if(documentType == 2) { // BRGY ID
        console.log(documentInfo);
        console.log(requirements);

        const brgyidname = $('#brgy-id-name');
        const brgyidpfp = $('#brgy-id-pic');
        const brgyidaddress = $('#brgy-id-address');
        const brgyidphone = $('#brgy-id-contact');
        const brgyidTIN = $('#brgy-id-tin');
        const brgyidSSS = $('#brgy-id-sss');
        const brgyidbdate = $('#brgy-id-bdate');
        const brgyidplacebdate = $('#brgy-id-bdate-place');
        const brgyidbloodtype = $('#brgy-id-blood');

        brgyidname.html(documentInfo.name);
        brgyidpfp.attr('src', `/assets/media/requirements/${requirements[0].filename}`);
        brgyidaddress.html(documentInfo.address);
        brgyidphone.html(`0${documentInfo.phone}`);
        brgyidTIN.html(documentInfo.tin);
        brgyidSSS.html(documentInfo.sss);
        brgyidbdate.html(documentInfo.bdate);
        brgyidplacebdate.html(documentInfo.bdate_place);
        brgyidbloodtype.html(documentInfo.blood_type);

        requestPrevCont.addClass('d-none');
        brgyIdPreview.removeClass('d-none');

        brgyIdPreview.find('.close-btn').click(() => {
            requestPrevCont.removeClass('d-none');
            brgyIdPreview.addClass('d-none');
        });
    }
    else { // Brgy Build and Renovation
        const brgyConREnName= $('#brgy-permit-name');
        const brgyConREnAddress= $('#brgy-permit-address');
        const brgyConRenBuild = $('#brgy-permit-build');
        const brgyConRenRenovate = $('#brgy-permit-renov');

        brgyConREnName.html(documentInfo.name);
        brgyConREnAddress.html(documentInfo.address);


        if(documentType == 3) { // Building Permit
            brgyConRenBuild.html('X');
            brgyConRenRenovate.html('');
        }
        else if(documentType == 4) { // Renovation Permit
            brgyConRenBuild.html('');
            brgyConRenRenovate.html('X');
        }

        requestPrevCont.addClass('d-none');
        brgyConRenoPrev.removeClass('d-none');

        brgyConRenoPrev.find('.close-btn').click(() => {
            requestPrevCont.removeClass('d-none');
            brgyConRenoPrev.addClass('d-none');
        });
    }
});