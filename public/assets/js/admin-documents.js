// Btns
const pendingBtn = $('#pending-btn');
const FPBtn = $('#FP-btn');
const rejectedBtn = $('#rejected-btn');
const completedBtn = $('#completed-btn');

// Containers
const pendingCont = $('#pending-cont');
const toBePickupCont = $('#to-be-pickup-cont');
const completedCont = $('#completed-cont');
const rejectedCont = $('#rejected-cont');


pendingBtn.click(() => {
    changeActiveContent(pendingBtn, pendingCont)
});
FPBtn.click(() => {
    changeActiveContent(FPBtn, toBePickupCont)
});
rejectedBtn.click(() => {
    changeActiveContent(rejectedBtn, completedCont)
});
completedBtn.click(() => {
    changeActiveContent(completedBtn, rejectedCont)
});

function changeActiveContent(activeBtn, activeCont) {
    pendingCont.addClass('d-none');
    toBePickupCont.addClass('d-none');
    completedCont.addClass('d-none');
    rejectedCont.addClass('d-none');

    pendingBtn.removeClass('active');
    FPBtn.removeClass('active');
    rejectedBtn.removeClass('active');
    completedBtn.removeClass('active');

    activeBtn.addClass('active');
    activeCont.removeClass('d-none');
}