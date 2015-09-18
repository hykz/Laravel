$(function () {

    /// REPARTITIONS BUDGET BEST CATEGORIE
    var finaltab = [];
    $('bestcat').each(function(){
        var datouz = [];
        var valz1 = parseInt($(this).attr('data-janvier'));
        var valz2 = parseInt($(this).attr('data-fevrier'));
        var valz3 = parseInt($(this).attr('data-mars'));
        var valz4 = parseInt($(this).attr('data-avril'));
        var valz5 = parseInt($(this).attr('data-mai'));
        var valz6 = parseInt($(this).attr('data-juin'));
        var valz7 = parseInt($(this).attr('data-juillet'));
        var valz8 = parseInt($(this).attr('data-aout'));
        var valz9 = parseInt($(this).attr('data-septembre'));
        var valz10 = parseInt($(this).attr('data-octobre'));
        var valz11= parseInt($(this).attr('data-novembre'));
        var valz12= parseInt($(this).attr('data-decembre'));
        datouz.push(valz1,valz2,valz3,valz4,valz5,valz6,valz7,valz8,valz9,valz10,valz11,valz12);


        var o = { name: $(this).attr('data-title') , data: datouz  };
        finaltab.push(o);
        return finaltab;



    });

    $('#container').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Repartition du budget des 4 meilleurs catégorie'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            categories: [
                'Janvier',
                'Fevrier',
                'Mars',
                'Avril',
                'Mai',
                'Juin',
                'Juillet',
                'Aout',
                'Septembre',
                'Octobre',
                'Novembre',
                'Decembre'
            ],

        },
        yAxis: {
            title: {
                text: 'en €'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: '€'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: finaltab


    });


    //////////////////////////////////////// nbr commentaire par cinema et film

    // Create the chart
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Nombre de commentaires des 6 cinémas les plus actifs'
        },

        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Nombre de commentaires'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> commentaires<br/>'
        },

        series: [{
            name: "Brands",
            colorByPoint: true,
            data: [{
                name: "Microsoft Internet Explorer",
                y: 56.33,
                drilldown: "Microsoft Internet Explorer"
            }, {
                name: "Chrome",
                y: 24.03,
                drilldown: "Chrome"
            }, {
                name: "Firefox",
                y: 10.38,
                drilldown: "Firefox"
            }, {
                name: "Safari",
                y: 4.77,
                drilldown: "Safari"
            }, {
                name: "Opera",
                y: 0.91,
                drilldown: "Opera"
            }, {
                name: "Proprietary or Undetectable",
                y: 0.2,
                drilldown: null
            }]
        }],
        drilldown: {
            series: [{
                name: "Microsoft Internet Explorer",
                id: "Microsoft Internet Explorer",
                data: [
                    [
                        "v11.0",
                        24.13
                    ],
                    [
                        "v8.0",
                        17.2
                    ],
                    [
                        "v9.0",
                        8.11
                    ],
                    [
                        "v10.0",
                        5.33
                    ],
                    [
                        "v6.0",
                        1.06
                    ],
                    [
                        "v7.0",
                        0.5
                    ]
                ]
            }, {
                name: "Chrome",
                id: "Chrome",
                data: [
                    [
                        "v40.0",
                        5
                    ],
                    [
                        "v41.0",
                        4.32
                    ],
                    [
                        "v42.0",
                        3.68
                    ],
                    [
                        "v39.0",
                        2.96
                    ],
                    [
                        "v36.0",
                        2.53
                    ],
                    [
                        "v43.0",
                        1.45
                    ],
                    [
                        "v31.0",
                        1.24
                    ],
                    [
                        "v35.0",
                        0.85
                    ],
                    [
                        "v38.0",
                        0.6
                    ],
                    [
                        "v32.0",
                        0.55
                    ],
                    [
                        "v37.0",
                        0.38
                    ],
                    [
                        "v33.0",
                        0.19
                    ],
                    [
                        "v34.0",
                        0.14
                    ],
                    [
                        "v30.0",
                        0.14
                    ]
                ]
            }, {
                name: "Firefox",
                id: "Firefox",
                data: [
                    [
                        "v35",
                        2.76
                    ],
                    [
                        "v36",
                        2.32
                    ],
                    [
                        "v37",
                        2.31
                    ],
                    [
                        "v34",
                        1.27
                    ],
                    [
                        "v38",
                        1.02
                    ],
                    [
                        "v31",
                        0.33
                    ],
                    [
                        "v33",
                        0.22
                    ],
                    [
                        "v32",
                        0.15
                    ]
                ]
            }, {
                name: "Safari",
                id: "Safari",
                data: [
                    [
                        "v8.0",
                        2.56
                    ],
                    [
                        "v7.1",
                        0.77
                    ],
                    [
                        "v5.1",
                        0.42
                    ],
                    [
                        "v5.0",
                        0.3
                    ],
                    [
                        "v6.1",
                        0.29
                    ],
                    [
                        "v7.0",
                        0.26
                    ],
                    [
                        "v6.2",
                        0.17
                    ]
                ]
            }, {
                name: "Opera",
                id: "Opera",
                data: [
                    [
                        "v12.x",
                        0.34
                    ],
                    [
                        "v28",
                        0.24
                    ],
                    [
                        "v27",
                        0.17
                    ],
                    [
                        "v29",
                        0.16
                    ]
                ]
            }]
        }
    });

});


