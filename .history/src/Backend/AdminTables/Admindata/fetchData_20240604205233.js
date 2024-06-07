document.addEventListener('DOMContentLoaded', function() {
    fetch('ComplaintReport.php')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.DateRequested);
            const counts = data.map(item => item.total);

            const ctx = document.getElementById('lineChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of Requests',
                        data: counts,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Requests'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        });
});
