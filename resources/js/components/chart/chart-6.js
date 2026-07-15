export function initChartSix() {

    const chartSixEl = document.querySelector('#chartSix');

    if (!chartSixEl) return;

    const chartSixOptions = {

        series: [
            {
                name: "Website",
                data: [32, 40, 38, 45, 28, 42, 46, 48],
            },
            {
                name: "Google Ads",
                data: [18, 20, 22, 16, 14, 18, 20, 22],
            },
            {
                name: "Walk-in",
                data: [12, 10, 15, 13, 18, 12, 15, 14],
            },
            {
                name: "Referral",
                data: [22, 28, 25, 30, 17, 20, 22, 21],
            },
        ],

        colors: [
            "#2A31D8",
            "#465FFF",
            "#7C98FF",
            "#C5D6FF",
        ],

        chart: {
            fontFamily: "Outfit, sans-serif",
            type: "bar",
            stacked: true,
            height: 320,

            toolbar: {
                show: false,
            },

            zoom: {
                enabled: false,
            },

        },

        plotOptions: {

            bar: {

                horizontal: false,

                columnWidth: "42%",

                borderRadius: 10,

                borderRadiusApplication: "end",

                borderRadiusWhenStacked: "last",

            },

        },

        dataLabels: {

            enabled: false,

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
                "Aug"

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

                }

            }

        },

        yaxis: {

            min: 0,

            max: 120,

            tickAmount: 6,

            labels: {

                style: {

                    fontSize: "12px",

                }

            }

        },

        legend: {

            show: true,

            position: "top",

            horizontalAlign: "left",

            fontFamily: "Outfit",

            fontSize: "14px",

            fontWeight: 500,

            markers: {

                size: 6,

                shape: "circle",

                radius: 999,

                strokeWidth: 0,

            },

            itemMargin: {

                horizontal: 14,

                vertical: 0,

            },

        },

        grid: {

            borderColor: "#E5E7EB",

            strokeDashArray: 4,

            yaxis: {

                lines: {

                    show: true,

                },

            },

        },

        fill: {

            opacity: 1,

        },

        tooltip: {

            shared: true,

            intersect: false,

            y: {

                formatter: function (value) {

                    return value + " Leads";

                }

            }

        }

    };

    const chartSix = new ApexCharts(chartSixEl, chartSixOptions);

    chartSix.render();

    return chartSix;

}

export default initChartSix;