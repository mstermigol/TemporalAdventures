document.addEventListener('DOMContentLoaded', (event) => {
    const ctx = document.getElementById('temperatureChart').getContext('2d');
    const weatherData = JSON.parse(document.getElementById('weatherData').textContent);

    const labels = weatherData.hourly.time.slice(weatherData.hourly.time.length / 2);
    const data = weatherData.hourly.temperature_2m.slice(weatherData.hourly.temperature_2m.length / 2);

    const temperatureChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Temperature (°C)',
                data: data,
                borderColor: 'rgba(255, 255, 255, 1)',
                backgroundColor: 'rgba(0, 0, 0, 0)',
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'hour',
                        tooltipFormat: 'DD HH:mm',
                        displayFormats: {
                            hour: 'DD HH:mm'
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 1)'
                        }
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 1)'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(255, 255, 255, 1)'
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 1)'
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Hourly Temperature (Second Half)',
                    color: 'rgba(255, 255, 255, 1)',
                    font: {
                        size: 18
                    }
                },
                legend: {
                    labels: {
                        color: 'rgba(255, 255, 255, 1)',
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + '°C';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});
