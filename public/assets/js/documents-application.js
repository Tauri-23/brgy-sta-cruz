// inputs
const selectDocumentIn = $('#doctype-in');

// Containers
const requirementsCont = $('#requirements-cont');

const addDocCont = $('#add-doc-cont');
const pendingCont = $('#pending-cont');
const rejectedCont = $('#rejected-cont');
const completedCont = $('#completed-cont');

// Btns
const requestDocumentBtn = $('#request-document-btn');

const navReqDocBtn = $('#req-a-doc-btn');
const pendingBtn = $('#pending-btn');
const rejectedBtn = $('#rejected-btn');
const completedBtn = $('#completed-btn');


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
    


    filteredRequirements.forEach(req => {
        requirementsCont.append(`<div>${req.requirement}</div>`)
    });
});

navReqDocBtn.click(() => {
    changeContainerAndLinkActive(addDocCont, navReqDocBtn)
});
pendingBtn.click(() => {
    changeContainerAndLinkActive(pendingCont, pendingBtn)
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
    rejectedBtn.removeClass('active');
    completedBtn.removeClass('active');

    addDocCont.addClass('d-none');
    pendingCont.addClass('d-none');
    rejectedCont.addClass('d-none');
    completedCont.addClass('d-none');

    activeCont.removeClass('d-none');
    activeLink.addClass('active');
}

requestDocumentBtn.click(() => {
    window.location.href = `/RequestDocument/${selectDocumentIn.val()}`;
});