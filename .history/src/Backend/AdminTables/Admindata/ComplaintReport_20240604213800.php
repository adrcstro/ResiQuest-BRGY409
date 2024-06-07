<!DOCTYPE html>
<html>
<head>
    <title>Document Request Line Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 75%;">
        <canvas id="requestChart"></canvas>
    </div>

    <script>
        // Get the data from the PHP script
        var dates = <?php echo $dates_json; ?>;
        var counts = <?php echo $counts_json; ?>;

        // Create the chart
        var ctx = document.getElementById('requestChart').getContext('2d');
        var requestChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Number of Requests',
                    data: counts,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day',
                            tooltipFormat: 'MMM DD, YYYY'
                        },
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Requests'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
