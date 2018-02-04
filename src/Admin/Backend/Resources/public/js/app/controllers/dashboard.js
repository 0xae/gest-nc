angular.module("app")
.controller("DashboardController", ['$http', '$scope', function ($http, $scope) {
    console.info("--- init dash controller ---");
    
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
                'subtitulo',
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
    
            var columns = [
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
                'subtitulo',
                'by_month',
                columns,
                render
            );    
        });
    }

    function renderPerDay(year, month) {
        fetchData('by_day', {year: year, month: month})
        .then(function(data){
            var objects = data.rows;
            var keys = _.sortBy(Object.keys(objects));
            var columns = keys;            
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

            keys.forEach(function (key){
                var entry = objects[key];
                entry.forEach(function (obj){
                    series[obj.type].data.push(parseInt(obj.count));
                });
            });

            console.info("series: ", series);
            
            var render = Object.keys(series).map(function (k){ return series[k]; });
            renderBar('Queixas/Denúncias/Sugestões por dia',
                'Ocorrencias',
                'subtitulo',
                'by_day',
                columns,
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
}]);