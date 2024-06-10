//canvases
const reqDerDocsChart = $('#req-per-docs-chart');
const reqDerGenderChart = $('#req-per-gender-chart');
const reqDerAgeChart = $('#req-per-age-chart');

let docTypesChart = [];

documentTypes.forEach(element => {
    docTypesChart.push(element.document_name);
    console.log(element);
});

// GenerateChart
createBarChart(reqDerDocsChart, docTypesChart, [totalDocReqBrgyCert, totalDocReqBrgyId, totalDocReqPermitBuild, totalDocReqPermitReno], 'Document Requests Made', 'rgba(255, 184, 0, .3)', 'rgba(255, 184, 0, 1)');
createBarChart(reqDerGenderChart, ['Male', 'Female'], [totalMaleReq, totalFemaleReq], 'Document Requests Made', 'rgba(67, 119, 254, .3)', 'rgb(67, 119, 254)');
createBarChart(reqDerAgeChart, ['Young Adult', 'Middle Age', 'Elderly'], [totalYoungReq, totalMiddleReq, totalElderlyReq], 'Document Requests Made', 'rgba(255, 108, 71, 0.5)', 'rgb(255,182,163)');