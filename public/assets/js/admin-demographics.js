//canvases
const reqDerDocsChart = $('#req-per-docs-chart');
const reqDerGenderChart = $('#req-per-gender-chart');

let docTypesChart = [];

documentTypes.forEach(element => {
    docTypesChart.push(element.document_name);
    console.log(element);
});

// GenerateChart
createBarChart(reqDerDocsChart, docTypesChart, [totalDocReqBrgyCert, totalDocReqBrgyId, totalDocReqPermitBuild, totalDocReqPermitReno], 'Request', 'rgba(255, 184, 0, .3)', 'rgba(255, 184, 0, 1)');
createBarChart(reqDerGenderChart, ['Male', 'Female'], [totalMaleReq, totalFemaleReq], 'Department Salary', 'rgba(67, 119, 254, .3)', 'rgb(67, 119, 254)');