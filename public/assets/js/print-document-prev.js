// Btns
const printBarangayCertBtn = $('#print-brgy-cert-btn');
const printBarangayIdBtn = $('#print-brgy-id-btn');

printBarangayCertBtn.click(() => {
    printElement($('#brgy-clearance-canvas'), `brgy_clearance.pdf`);
});
printBarangayIdBtn.click(() => {
    printElement($('#brgy-id-canvas'), `Brgy_id.pdf`);
});




function printElement(elements, filename) {
    // Print the container
    elements.printThis({
        pageTitle: filename,
        importCSS: true,
        importStyle: true,
        loadCSS: ['/assets/css/app.css', '/assets/css/elements.css', '/assets/css/document-preview.css', '/assets/css/document-req-prev.css'],
        beforePrint: function () {
            document.title = filename;
        }
    });
}