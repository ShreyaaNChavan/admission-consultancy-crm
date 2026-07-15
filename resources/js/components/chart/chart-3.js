export const initChartThree = () => {

    const chartElement = document.querySelector('#chartThree');

    if (!chartElement) return;

    const chartThreeOptions = {

        series: [
            {
                name: "Revenue",
                data: [42000, 38000, 51000, 48000, 56000, 62000, 59000, 68000, 71000, 75000, 82000, 90000],
            },
            {
                name: "Fee Collection",
                data: [22000, 25000, 28000, 31000, 34000, 38000, 36000, 43000, 47000, 52000, 56000, 61000],
            }
        ],

        colors: [
            "#465FFF",
            "#9CB9FF",
        ],

        chart: {
            fontFamily: "Outfit, sans-serif",
            type: "area",
            height: 340,
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false,
            },
        },

        legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
            fontSize: "14px",
            markers: {
                radius: 50,
            },
        },

        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [0, 100],
            },
        },

        stroke: {
            curve: "smooth",
            width: 3,
        },

        markers: {
            size: 0,
            hover: {
                size: 6,
            },
        },

        dataLabels: {
            enabled: false,
        },

        grid: {
            borderColor: "#E5E7EB",
            strokeDashArray: 5,
        },

        xaxis: {

            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],

            axisBorder: {
                show: false,
            },

            axisTicks: {
                show: false,
            },

            labels: {
                style: {
                    fontSize: "13px",
                },
            },

        },

        yaxis: {

            labels: {

                formatter: function (value) {

                    return "₹" + (value / 1000) + "K";

                }

            }

        },

        tooltip: {

            shared: true,

            intersect: false,

            y: {

                formatter: function (value) {

                    return "₹ " + value.toLocaleString();

                }

            }

        }

    };

    const chart = new ApexCharts(chartElement, chartThreeOptions);

    chart.render();

    return chart;

};

export default initChartThree;