var cg = document.getElementById("myChart");

var chart = new Chart(cg, {
    type: 'line',
    data: {
    	labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    	datasets: [{
            label: "This Year",
            fill: false,
            lineTension: 0.1,
            backgroundColor:'rgba(255, 99, 132, 0.2)',
            borderColor:'rgba(255,99,132,1)',
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            data: [65, 59, 80, 81, 56, 55, 0, 30, 70, 56, 90, null],
        },
        {
            label: "Last Year",
            fill: true,
            backgroundColor:'rgba(54, 162, 235, 0.2)',
            borderColor:'rgba(54, 162, 235, 1)',
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            data: [40, 49, 30, 57, 66, 88, 25, 34, 27, 80, 75, 50],
        }
        ]
	},
	options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    stepSize: 20
                }
            }]
        }
    }
});