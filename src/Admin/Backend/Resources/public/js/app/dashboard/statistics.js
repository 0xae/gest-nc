angular.module("app")
.controller("StatisticsController", ['$http', '$scope', function ($http, $scope) {
    console.info("--- init stats controller ---");
    var categories = [
        "Denúncias",
        "Queixas",
        "Reclamações externas",
        "Reclamações internas",            
        "Sugestões",
    ];

    function fetchData(type, conf) {
        var queryStr= Object.keys(conf)
                        .map(function (k){ return k+'='+encodeURIComponent(conf[k]); })
                        .join('&');
        return $http.get('/arfa/web/app_dev.php/dashboard/stats/'+type + '?' + queryStr)
        .then(function (resp) {
            return resp.data;
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

    function renderByDepartments(year) {
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
                'Ocorrência por direções', 
                'Ocorrencias',
                '',
                'by_department',
                categories,
                render
            );
        });
    }

    function renderResponsePerDirection() {
        var render = [
            {
                name: "Denúncias",
                data: [1]
            },
            {
                name: "Queixas",
                data: [2]
            },
            {
                name: "Reclamações externas",
                data: [3]
            },
            {
                name: "Reclamações internas",
                data: [3]
            },
            {
                name: "Sugestões",
                data: [3]
            },
        ];

        renderBar('Tempo médio de resposta',
            'Ocorrencias',
            '',
            'graph3',
            ["Ocorrencias"],
            render
        );    
    }

    function renderImcumprimentoPerDirection() {  
        var render = [
            {
                name: "Dep 1",
                data: [1]
            },
            {
                name: "Dep 2",
                data: [2]
            }
        ];

        renderBar('Incumprimento de Tratamento das ocorrências por Direção',
            'Ocorrencias',
            '',
            'graph4',
            ["Ocorrencias"],
            render
        ); 
    }

    function renderThirdPartyOccurences() {
        var render = [
            {
                name: "Dep 1",
                data: [1]
            },
            {
                name: "Dep 2",
                data: [2]
            }
        ];

        renderBar('Números de ocorrências por competência de terceiros',
            'Ocorrencias',
            '',
            'graph5',
            ["Ocorrencias"],
            render
        ); 
    }

    setTimeout(function(){
        renderByDepartments(2018);
        renderResponsePerDirection();
        renderImcumprimentoPerDirection();
        renderThirdPartyOccurences();
    }, 500);
}]);
