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

    function renderStack(container, title, categories, series) {
        Highcharts.chart(container, {
            chart: {
                type: 'column'
            },
            title: {
                text: title
            },
            xAxis: {
                // categories: ['DENÚNCIAS', 'QUEIXAS', 'RECLAMAÇÕES']
                categories: categories
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -30,
                verticalAlign: 'top',
                y: 25,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>'
                // pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: series
        });        
    }    

    function __transform(types, keys, rows) {
        var series = {};

        keys.forEach(function (d){
            series[d] = {
                name: d,
                data: []
            };
        });

        keys.forEach(function (k){
            var depTypes =_.sortBy(rows[k], function (d) { return d.type; });
            types.forEach(function (t){
                var found=_.find(depTypes, function (dt) { return dt.type==t});
                if (found) {
                    series[k].data.push(parseInt(found.count));
                } else {
                    series[k].data.push(0);
                }
            });
        });

        return Object.keys(series).map(function (k){ 
            return series[k]; 
        });        
    }

    function produceArray(rows, type) {
        var categories = Object.keys(rows);
        return categories.map(function (c){
            return (rows[c].filter(function (t) {
                return t.type == type;
            })
            .map(function (t) {
                return parseInt(t.count);
            }));
        })
        .map(function (k) { 
            return k[0];
        })
        .filter(function (v) { 
            return v;
        });
        // .map(function (v) { return v?v:0});
    }

    function renderByDepartments(year) {
        fetchData('by_department', {year: year})
        .then(function (data) {
            var rows = data.rows;
            var categories = Object.keys(rows);
            var series = [{
                name: 'Denúncias',
                data: produceArray(rows, 'denuncia'),
                color: '#681133'
            }, {
                name: 'Queixas',
                data: produceArray(rows, 'queixa'),
                color: '#c82061'
            }, {
                name: 'Reclamaçao Interna',
                data: produceArray(rows, 'reclamacao_interna'),
                color: '#6eb63e'
            },{
                name: 'Reclamaçao Externa',
                data: produceArray(rows, 'reclamacao'),
                color: '#4e802c'
            }, {
                name: 'Sugestões',
                data: produceArray(rows, 'sugestao'),
                color: '#1155cc'
            }, {
                name: 'Livro de reclamações',
                data: produceArray(rows, 'comp_book'),
                color: '#f39c12'
            }];

            renderStack(
                "by_department", 
                'Ocorrência por direções',
                categories, 
                series
            );
        });
    }

    function renderResponsePerDirection() {
        var render = [
            {
                name: "Denúncias",
                data: [1],
                color: "#c82061"
            },
            {
                name: "Queixas",
                data: [2],
                color: "#681133"
            },
            {
                name: "Reclamações externas",
                data: [3],
                color: "#4e802c"
            },
            {
                name: "Reclamações internas",
                data: [3],
                color: "#6eb63e"
            },
            {
                name: "Sugestões",
                data: [3],
                color: "#1155cc"
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
        fetchData('by_incump', {year: 2018})
        .then(function (data) {
            var rows = data.rows;
            var categories=Object.keys(rows);
            // var render = __transform(types, Object.keys(rows), rows);
            var series = [{
                name: 'Denúncias',
                data: produceArray(rows, 'denuncia'),
                color: '#681133'
            }, {
                name: 'Queixas',
                data: produceArray(rows, 'queixa'),
                color: '#c82061'
            }, {
                name: 'Reclamaçao Interna',
                data: produceArray(rows, 'reclamacao_interna'),
                color: '#6eb63e'
            },{
                name: 'Reclamaçao Externa',
                data: produceArray(rows, 'reclamacao'),
                color: '#4e802c'
            }, {
                name: 'Sugestões',
                data: produceArray(rows, 'sugestao'),
                color: '#1155cc'
            }];

            renderStack(
                "graph4", 
                'Incumprimento de Tratamento das ocorrências por Direção',
                categories, 
                series
            );
        });
    }

    renderByDepartments(2018);
    renderResponsePerDirection();
    renderImcumprimentoPerDirection();
}]);
