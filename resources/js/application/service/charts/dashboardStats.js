import Chart from "chart.js";

export default (responseData) => {
    let camembertFacturation = document.querySelector('#statsFacturation');
    var chartFacturation;

    var ctx = camembertFacturation.getContext('2d');
    var color = Chart.helpers.color;

    chartFacturation = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                backgroundColor: [
                    color('yellow').alpha(0.6).rgbString(),
                    color('orange').alpha(0.6).rgbString(),
                ],
                label: "Suivi facturations",
                data: responseData,
            }],
            labels: ["Payées", "Non payées"],
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Proportion des facturations payées ou non'
            }
        }
    });
}