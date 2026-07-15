export const initChartFour = () => {

    const chartElement = document.querySelector("#chartFour");

    if (!chartElement) return;

    const options = {

        series: [42, 25, 15, 10, 8],

        chart: {
            type: "donut",
            height: 340,
            fontFamily: "Outfit, sans-serif",
            toolbar: {
                show: false
            },
            animations: {
                enabled: true,
                easing: "easeinout",
                speed: 800
            }
        },

        labels: [
            "Website",
            "Instagram",
            "WhatsApp",
            "Walk-in",
            "Reference"
        ],

        colors: [
            "#465FFF",
            "#22C55E",
            "#F59E0B",
            "#EF4444",
            "#8B5CF6"
        ],

        stroke: {
            width: 4,
            colors: ["#ffffff"]
        },

        fill: {
            opacity: 1
        },

        dataLabels: {
            enabled: false
        },

        legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            fontSize: "14px",
            fontWeight: 500,
            itemMargin: {
                horizontal: 15,
                vertical: 8
            },
            markers: {
                width: 10,
                height: 10,
                radius: 12
            }
        },

        tooltip: {
            y: {
                formatter: function (value) {
                    return value + "%";
                }
            }
        },

        states: {
            hover: {
                filter: {
                    type: "lighten",
                    value: 0.08
                }
            },
            active: {
                filter: {
                    type: "none"
                }
            }
        },

        plotOptions: {

            pie: {

                expandOnClick: true,

                donut: {

                    size: "72%",

                    labels: {

                        show: true,

                        name: {
                            show: true,
                            offsetY: -8,
                            fontSize: "15px",
                            fontWeight: 500,
                            color: "#6B7280"
                        },

                        value: {
                            show: true,
                            fontSize: "24px",
                            fontWeight: 700,
                            color: "#111827",
                            offsetY: 8,
                            formatter: function (value) {
                                return value + "%";
                            }
                        },

                        total: {

                            show: true,

                            label: "Total Leads",

                            fontSize: "14px",

                            fontWeight: 500,

                            color: "#6B7280",

                            formatter: function () {
                                return "100%";
                            }

                        }

                    }

                }

            }

        },

        responsive: [
            {
                breakpoint: 768,
                options: {
                    chart: {
                        height: 300
                    },
                    legend: {
                        position: "bottom"
                    }
                }
            }
        ]

    };

    const chart = new ApexCharts(chartElement, options);

    chart.render();

};

export default initChartFour;