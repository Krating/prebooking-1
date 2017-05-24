var cg = document.getElementById("myChart");
var chart = new Chart(cg, {
    type: 'bar',
    data: {
    	labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    	datasets: [{
            label: "Bookings",
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
               
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                
            ],
            borderWidth: 1,
            data: [65, 59, 80, 81, 56, 55, 40, 30, 70, 56, 90, 40],
        }]
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