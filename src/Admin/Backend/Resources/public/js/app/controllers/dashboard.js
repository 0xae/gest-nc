
angular.module("app")
.controller("DashboardController", ['$http', '$scope', function ($http, $scope) {
    console.info("--- init dash controller ---");

    setTimeout(function(){
        renderGraph1();
        renderGraph2();
    }, 1500);

    function renderDepartments(year) {
        fetchData('by_department', {year: year})
        .then(function (data) {
            var deps = data.rows;
            var keys = Object.keys(deps);
            var series = {};
            var types=["denuncia", "queixa", "reclamacao", "sugestao"];
            var categories =[
                "Denúncias",
                "Queixas",
                "Reclamações",
                "Sugestões",
            ];

            keys.forEach(function (d){
                series[d] = {
                    name: d,
                    data: []
                };
            });

            keys.forEach(function (k){
                var depTypes =_.sortBy(deps[k], function (d) { return d.type; });
                types.forEach(function (t){
                    var found=_.find(depTypes, function (dt) { return dt.type==t});
                    if (found) {
                        series[k].data.push(parseInt(found.count));
                    } else {
                        series[k].data.push(0);
                    }
                });
            });

            var render = Object.keys(series).map(function (k){ return series[k]; });
            renderBar(
                'Queixas/Denúncias/Sugestões/Reclamações por Direções', 
                'Ocorrencias',
                '',
                'by_department',
                categories,
                render
            );
        });
    }

    function renderPerMonth(year) {
        fetchData('by_month', {year: year})
        .then(function (data) {
            var objects = data.rows;
            var keys = _.sortBy(Object.keys(objects))
            var series = {
                queixa: {
                    name: "Queixa",
                    data: []
                },
                denuncia:{
                    name: "Denúncias",
                    data: []
                },
                sugestao:{
                    name: "Sugestao",
                    data: []
                },
                reclamacao:{
                    name: "Reclamacao",
                    data: []
                },
            }
    
            keys.forEach(function (key){
                var entry = objects[key];
                entry.forEach(function (obj){
                    if (!series[obj.type]) {          
                        series[obj.type] = {name: obj.type, data: []};
                    }
                    series[obj.type].data.push(parseInt(obj.count));
                });
            });
    
            var render = Object.keys(series).map(function (k){ return series[k]; });

            var months = [
                'Janeiro',
                'Fevereiro',
                'Marco',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ];
    
            renderBar('Queixas/Denúncias/Sugestões por Mês',
                'Ocorrencias',
                '',
                'by_month',
                months,
                render
            );    
        });
    }

    function renderPerDay(year, month) {
        fetchData('by_day', {year: year, month: month})
        .then(function(data){
            var objects = data.rows;
            var series = {
                queixa: {
                    name: "Queixa",
                    data: []
                },
                denuncia:{
                    name: "Denúncias",
                    data: []
                },
                sugestao:{
                    name: "Sugestao",
                    data: []
                },
                reclamacao:{
                    name: "Reclamacao",
                    data: []
                },
            };
            var months = _.sortBy(Object.keys(objects));            
            var types = _.sortBy(Object.keys(series));

            types.forEach(function (t){
                months.forEach(function (m){
                    var found=_.find(objects[m], function (mt) { return mt.type==t});
                    if (found) {
                        series[t].data.push(parseInt(found.count));
                    } else {
                        series[t].data.push(0);                        
                    }
                });
            });            

            var render = types.map(function (k){ return series[k]; });
            console.info("series: ", render);
            renderBar('Queixas/Denúncias/Sugestões por dia',
                'Ocorrencias',
                '',
                'by_day',
                months,
                render
            );  
        });        
    }

    // $scope.loadPerDay = function () {
    // }

    // $scope.loadPerMonth = function () {
    // }

    // $scope.loadPerDepartment = function () {
    // }

    renderPerMonth(2018);
    renderDepartments(2018);
    renderPerDay(2018, '01');

    function fetchData(type, conf) {
        var queryStr= Object.keys(conf)
                        .map(function (k){ return k+'='+encodeURIComponent(conf[k]); })
                        .join('&');
        return $http.get('/arfa/web/app_dev.php/dashboard/stats/'+type + '?' + queryStr)
        .then(function (resp) {
            return resp.data;
        });
    }

    function renderGraph(xtitle, ytitle, subtitle, container, series) {
        var seriesExample = [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }];

        Highcharts.chart(container, {
            title: {
                text: xtitle
            },
        
            subtitle: {
                text: subtitle
            },
        
            yAxis: {
                title: {
                    text: ytitle
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
        
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 10
                }
            },

            series: series,
        
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        
        });    
    }

    function renderBar(xtitle, ytitle, subtitle, container, keys, series) {
        var seriesExample = [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    
        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
    
        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
    
        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
    
        }];

        Highcharts.chart(container, {
            chart: {
                type: 'column'
            },
            title: {
                text: xtitle
            },
            subtitle: {
                text: subtitle
            },
            xAxis: {
                categories: keys,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ytitle
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} '+ytitle+'</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.3,
                    borderWidth: 0
                }
            },
            series: series
        });        
    }

    function renderGraph1() {
        Highcharts.chart('graph1', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Crescimento das DENÚNCIAS, QUEIXAS E RECLAMAÇÕES'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: { // don't display the dummy year
                    month: '%e. %b',
                    year: '%b'
                },
                title: {
                    text: 'Date'
                }
            },
            yAxis: {
                title: {
                    text: 'Ocorrencias'
                },
                min: 0
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                pointFormat: '{point.x:%e. %b}: {point.y:.2f}'
            },
        
            plotOptions: {
                spline: {
                    marker: {
                        enabled: true
                    }
                }
            },
        
            series: [{
                name: 'DENÚNCIAS',
                // Define the data points. All series have a dummy year
                // of 1970/71 in order to be compared on the same x axis. Note
                // that in JavaScript, months start at 0 for January, 1 for February etc.
                data: [
                    [Date.UTC(1970, 9, 21), 20],
                    [Date.UTC(1970, 10, 4), 28],
                    [Date.UTC(1970, 10, 9), 25],
                    [Date.UTC(1970, 10, 27), 42],
                    [Date.UTC(1970, 11, 2), 28],
                    [Date.UTC(1970, 11, 26), 28],
                    [Date.UTC(1970, 11, 29), 47],
                    [Date.UTC(1971, 0, 11), 79],
                    [Date.UTC(1971, 0, 26), 42],
                    [Date.UTC(1971, 1, 3), 42],
                    [Date.UTC(1971, 1, 11), 42],
                    [Date.UTC(1971, 1, 25), 22],
                    [Date.UTC(1971, 2, 11), 18],
                    [Date.UTC(1971, 3, 11), 19],
                    [Date.UTC(1971, 4, 1), 85],
                    [Date.UTC(1971, 4, 5), 22],
                    [Date.UTC(1971, 4, 19), 15],
                    [Date.UTC(1971, 5, 3), 0]
                ]
            }, {
                name: 'QUEIXAS',
                data: [
                    [Date.UTC(1970, 9, 29), 10],
                    [Date.UTC(1970, 10, 9), 14],
                    [Date.UTC(1970, 11, 1), 25],
                    [Date.UTC(1971, 0, 1), 66],
                    [Date.UTC(1971, 0, 10), 18],
                    [Date.UTC(1971, 1, 19), 36],
                    [Date.UTC(1971, 2, 25), 62],
                    [Date.UTC(1971, 3, 19), 41],
                    [Date.UTC(1971, 3, 30), 15],
                    [Date.UTC(1971, 4, 14), 47],
                    [Date.UTC(1971, 4, 24), 31],
                    [Date.UTC(1971, 5, 10), 12]
                ]
            }, {
                name: 'RECLAMAÇÕES',
                data: [
                    [Date.UTC(1970, 10, 25), 0],
                    [Date.UTC(1970, 11, 6), 0.25],
                    [Date.UTC(1970, 11, 20), 1.41],
                    [Date.UTC(1970, 11, 25), 1.64],
                    [Date.UTC(1971, 0, 4), 1.6],
                    [Date.UTC(1971, 0, 17), 2.55],
                    [Date.UTC(1971, 0, 24), 62],
                    [Date.UTC(1971, 1, 4), 55],
                    [Date.UTC(1971, 1, 14), 42],
                    [Date.UTC(1971, 2, 6), 74],
                    [Date.UTC(1971, 2, 14), 62],
                    [Date.UTC(1971, 2, 24), 46],
                    [Date.UTC(1971, 3, 2), 81],
                    [Date.UTC(1971, 3, 12), 63],
                    [Date.UTC(1971, 3, 28), 77],
                    [Date.UTC(1971, 4, 5), 68],
                    [Date.UTC(1971, 4, 10), 56],
                    [Date.UTC(1971, 4, 15), 39],
                    [Date.UTC(1971, 4, 20), 43],
                    [Date.UTC(1971, 5, 5), 32],
                    [Date.UTC(1971, 5, 10), 85],
                    [Date.UTC(1971, 5, 15), 49],
                    [Date.UTC(1971, 5, 23), 38]
                ]
            }]
        });        
    }

    function renderGraph2() {
        // Radialize the colors
        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        // Build the chart
        Highcharts.chart('graph2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'DENÚNCIAS, QUEIXAS E RECLAMAÇÕES'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                name: 'Brands',
                data: [
                    { 
                        name: 'DENÚNCIAS', y: 50.00,
                        sliced: true,
                        selected: true
                    },
                    {
                        name: 'QUEIXAS',
                        y: 30.00,
                    },
                    { name: 'RECLAMAÇÕES', y: 20 },
                ]
            }]
        });        
    }
}]);