// inputs
const selectDocumentIn = $('#doctype-in');

// Containers
const requirementsCont = $('#requirements-cont');

const addDocCont = $('#add-doc-cont');
const pendingCont = $('#pending-cont');
const forPickupCont = $('#for-pickup-cont');
const rejectedCont = $('#rejected-cont');
const completedCont = $('#completed-cont');

// Btns
const requestDocumentBtn = $('#request-document-btn');

const navReqDocBtn = $('#req-a-doc-btn');
const pendingBtn = $('#pending-btn');
const forPickupBtn = $('#for-pickup-btn');
const rejectedBtn = $('#rejected-btn');
const completedBtn = $('#completed-btn');

const startHour = 7;
const endHour = 10;

selectDocumentIn.change(function() {
    const value = $(this).val();
    if(value == "invalid") {
        requirementsCont.empty();
        requestDocumentBtn.addClass('d-none');
        return;
    }

    requirementsCont.empty();
    requestDocumentBtn.removeClass('d-none');
    const filteredRequirements = docTypesRequirements.filter(req => req.document_type == value);
    
    const requirementsList = $('<ul></ul>');
        filteredRequirements.forEach(req => {
            requirementsList.append(`<li>${req.requirement}</li>`);
        });
        requirementsCont.append(requirementsList);
        timeRestriction()
});

navReqDocBtn.click(() => {
    changeContainerAndLinkActive(addDocCont, navReqDocBtn)
});
pendingBtn.click(() => {
    changeContainerAndLinkActive(pendingCont, pendingBtn)
});
forPickupBtn.click(() => {
    changeContainerAndLinkActive(forPickupCont, forPickupBtn);
});
rejectedBtn.click(() => {
    changeContainerAndLinkActive(rejectedCont, rejectedBtn)
});
completedBtn.click(() => {
    changeContainerAndLinkActive(completedCont, completedBtn)
});

function changeContainerAndLinkActive(activeCont, activeLink) {
    navReqDocBtn.removeClass('active');
    pendingBtn.removeClass('active');
    forPickupBtn.removeClass('active');
    rejectedBtn.removeClass('active');
    completedBtn.removeClass('active');

    addDocCont.addClass('d-none');
    pendingCont.addClass('d-none');
    forPickupCont.addClass('d-none')
    rejectedCont.addClass('d-none');
    completedCont.addClass('d-none');

    activeCont.removeClass('d-none');
    activeLink.addClass('active');
}

requestDocumentBtn.click(() => {
    window.location.href = `/RequestDocument/${selectDocumentIn.val()}`;
});

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