// Chart Display
const chart1 = document.getElementById('adminChart1');
const chart2 = document.getElementById('adminChart2');
const chart3 = document.getElementById('adminChart3');
const chart4 = document.getElementById('adminChart4');

//  Chart 1
fetch("./resource/php/charts/chart-display1.php", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        "ngrok-skip-browser-warning": "1",
    }
})
.then((Response) => {
    return Response.json();
})
.then((data) =>{
    chartMake1(chart1, 'pie', data)
});

//  Chart 2
fetch("./resource/php/charts/chart-display2.php", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        "ngrok-skip-browser-warning": "1",
    }
})
.then((Response) => {
    return Response.json();
})
.then((data) =>{
    chartMake2(chart2, 'pie', data)
});

// Chart 3
fetch("./resource/php/charts/chart-display3.php", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        "ngrok-skip-browser-warning": "1",
    }
})
.then((Response) => {
    return Response.json();
})
.then((data) =>{
    chartMake3(chart3, 'bar', data)
});

// Chart 4
fetch("./resource/php/charts/chart-display4.php", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        "ngrok-skip-browser-warning": "1",
    }
})
.then((Response) => {
    return Response.json();
})
.then((data) =>{
    chartMake4(chart4, 'line', data)
});




function chartMake1(chartName, chartType, chartData,) {
    new Chart(chartName, {
        type: chartType,
        data: {
            labels: chartData.map(row => row.status),
            datasets: [{
                data: chartData.map(row => row.count), 
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function chartMake2(chartName, chartType, chartData) {
    new Chart(chartName, {
        type: chartType,
        data: {
            labels: chartData.map(row => row.role),
            datasets: [{
                data: chartData.map(row => row.count), 
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function chartMake3(chartName, chartType, chartData) {
    new Chart(chartName, {
        type: chartType,
        data: {
            labels: chartData.map(row => row.product),
            datasets: [{
                label: 'Current Month',
                axis: 'y',
                data: chartData.map(row => row.quantity),
                fill: false,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
        }
    });
}

function chartMake4(chartName, chartType, chartData) {
    new Chart(chartName, {
        type: chartType,
        data: {
            labels: chartData.map(row => row.day),
            datasets: [{
                label: 'Amount Earned Per Day (₱)',
                data: chartData.map(row => row.amount),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)'
                ],
                borderWidth: 1
            }]
        }
    });
}