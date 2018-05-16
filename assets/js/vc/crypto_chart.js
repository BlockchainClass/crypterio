'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

(function ($) {
    var StmCryptoCharts = function () {
        function StmCryptoCharts(el) {
            var _this2 = this;

            _classCallCheck(this, StmCryptoCharts);

            var that = this;
            this.el = el;
            this.chartContainer = $(el);
            this.options = this.chartContainer.data();
            this.currency = {
                id: this.chartContainer.data('id') ? this.chartContainer.data('id') : 'bitcoin',
                name: this.chartContainer.data('name') ? this.chartContainer.data('name') : 'Bitcoin',
                symbol: this.chartContainer.data('symbol') ? this.chartContainer.data('symbol') : 'BTC'
            };
            this.colors = this.options['colors'];
            this.cacheExp = this.options['cache-expiration'];
            this.decimals = this.options['decimals'];
            this.contrast = this.options['contrast'];
            this.period = this.options['period'];
            this.xAxesTimeUnit = 'day';
            this.chart = null;
            this.labels = [];
            this.chartConfig = {
                type: 'lineWithLine',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function label(tooltipItem, data) {
                                if (tooltipItem.datasetIndex === 0) {
                                    return '$ ' + tooltipItem.yLabel.toFixed(that.decimals.usd);
                                } else {
                                    return tooltipItem.yLabel.toFixed(that.decimals.btc) + ' BTC';
                                }
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            type: 'time',
                            time: {
                                tooltipFormat: 'DD/MM/YYYY, HH:mm',
                                unit: this.xAxesTimeUnit,
                                displayFormats: {
                                    'hour': 'HH:mm',
                                    'day': 'HH:mm',
                                    'month': 'HH:mm'

                                }
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                callback: function callback(value, index, values) {
                                    return '$ ' + value.toFixed(that.decimals.usd);
                                }
                            },
                            id: "y-axis-1",
                            position: 'left',
                            gridLines: {
                                color: this.contrast ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                            }
                        }]
                    },
                    legend: {
                        display: false,
                        fontColor: this.contrast ? '#ffffff' : '#666',
                        onClick: function onClick(e, legendItem) {
                            var index = legendItem.datasetIndex;
                            var ci = _this2.chart;
                            var meta = ci.getDatasetMeta(index);
                            meta.hidden = meta.hidden === null ? !ci.data.datasets[index].hidden : null;

                            ci.data.datasets[index].hidden = !ci.data.datasets[index].hidden;
                            //toggle the related labels' visibility
                            ci.options.scales.yAxes[index].display = !ci.options.scales.yAxes[index].display;
                            ci.update();
                        }
                    }
                }
            };
            this.graph = null;
            this.now = moment();
            this.rangeButtonsContainerClassname = 'stm-crypto-charts-ranges';
            this.buttons = {
                '1d': [moment(this.now).subtract(1, 'days'), this.now],
                '1w': [moment(this.now).subtract(7, 'days'), this.now]
            };

            this.init();
        }

        _createClass(StmCryptoCharts, [{
            key: 'init',
            value: function init() {
                // this.drawButtons();
                var that = this;
                if (this.currency.symbol !== 'BTC') {
                    this.chartConfig.options.scales.yAxes[1] = {
                        ticks: {
                            callback: function callback(value, index, values) {
                                return value.toFixed(that.decimals.btc) + ' BTC';
                            }
                        },
                        id: "y-axis-2",
                        position: 'right',
                        gridLines: {
                            display: false,
                            gridLines: {
                                color: this.contrast ? '#ffffff' : 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    };
                }
                this.extend();
                this.getTimeUnit();
                this.getCurrencyData(this.drawChart, '');
            }
        }, {
            key: 'extend',
            value: function extend() {
                Chartjs.defaults.lineWithLine = Chartjs.defaults.line;
                Chartjs.defaults.lineWithLine.cursor = {
                    fontColor: this.contrast ? 'rgba(255,255,255,.4)' : '#333'
                };
                Chartjs.controllers.lineWithLine = Chartjs.controllers.line.extend({
                    draw: function draw(ease) {
                        Chartjs.controllers.line.prototype.draw.call(this, ease);

                        if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
                            var activePoint = this.chart.tooltip._active[0],
                                ctx = this.chart.ctx,
                                x = activePoint.tooltipPosition().x,
                                topY = this.chart.scales['y-axis-1'].top,
                                bottomY = this.chart.scales['y-axis-1'].bottom;

                            // draw line
                            ctx.save();
                            ctx.beginPath();
                            ctx.moveTo(x, topY);
                            ctx.lineTo(x, bottomY);
                            ctx.lineWidth = 1;
                            ctx.strokeStyle = Chartjs.defaults.lineWithLine.cursor.fontColor;
                            ctx.stroke();
                            ctx.restore();
                        }
                    }
                });
                Chartjs.defaults.global.legend.labels.fontColor = this.contrast ? '#ffffff' : "#666666";
                Chartjs.defaults.global.elements.line.borderWidth = 2;
                Chartjs.defaults.global.hover.intersect = false;
                Chartjs.defaults.scale.gridLines.drawBorder = false;
                Chartjs.defaults.scale.gridLines.drawTicks = false;
                Chartjs.defaults.scale.ticks.padding = 15;
                Chartjs.defaults.scale.ticks.fontColor = this.contrast ? '#777' : '#666666';
            }
        }, {
            key: 'getTimeUnit',
            value: function getTimeUnit() {
                switch (this.period) {
                    case '1 day':
                        this.chartConfig.options.scales.xAxes[0].time.unit = 'hour';
                        break;
                    case '1 week':
                        this.chartConfig.options.scales.xAxes[0].time.unit = 'day';
                        break;
                    case '1 month':
                        this.chartConfig.options.scales.xAxes[0].time.unit = 'day';
                        break;
                    case '1 year':
                        this.chartConfig.options.scales.xAxes[0].time.unit = 'month';
                        break;
                    default:
                        this.chartConfig.options.scales.xAxes[0].time.unit = 'day';
                }
            }
        }, {
            key: 'drawButtons',
            value: function drawButtons() {
                var _this = this;
                var container = $('<div class="' + this.rangeButtonsContainerClassname + '"></div>').appendTo(this.el);

                var _loop = function _loop(prop) {
                    var button = $('<div class="range-button">' + prop + '</div>').appendTo(container);
                    button.click(function (e) {
                        e.preventDefault();
                        var buttonData = _this.buttons[prop];
                        var period = buttonData[0] + '/' + buttonData[1];
                        _this.getCurrencyData(_this.updateChart, period);
                    });
                };

                for (var prop in this.buttons) {
                    _loop(prop);
                }
            }
        }, {
            key: 'drawChart',
            value: function drawChart(priceData) {
                var _this = this;
                var data = {
                    usd: [],
                    btc: []
                };
                for (var i = 0; i < priceData.price_usd.length; i++) {
                    _this.chartConfig.data.labels.push(priceData.price_usd[i][0]);
                    data.usd.push(priceData.price_usd[i][1]);
                }
                if (this.currency.symbol !== 'BTC') {
                    for (var i = 0; i < priceData.price_btc.length; i++) {
                        _this.chartConfig.data.labels.push(priceData.price_btc[i][0]);
                        data.btc.push(priceData.price_btc[i][1]);
                    }

                    this.chartConfig.data.datasets[1] = {
                        label: 'BTC price',
                        data: data.btc,
                        pointRadius: 0,
                        backgroundColor: this.colors.btc.fill,
                        borderColor: this.colors.btc.border,
                        yAxisID: "y-axis-2",
                        pointBackgroundColor: this.colors.btc.fill
                    };
                }

                _this.chartConfig.data.datasets[0] = {
                    label: 'USD price',
                    data: data.usd,
                    pointRadius: 0,
                    backgroundColor: this.colors.usd.fill,
                    borderColor: this.colors.usd.border,
                    yAxisID: "y-axis-1",
                    pointBackgroundColor: this.colors.usd.fill
                };

                var chart = this.chartContainer.find('canvas')[0].getContext('2d');
                this.chart = new Chartjs(chart, _this.chartConfig);
            }
        }, {
            key: 'updateChart',
            value: function updateChart(priceData) {
                var _this3 = this;

                this.chart.data.labels = [];
                this.chart.data.datasets[0].data = [];
                this.chart.data.datasets[0].borderColor = this.colors.fill;
                this.chart.data.datasets[0].backgroundColor = this.colors.fill;

                this.chart.data.datasets[1].data = [];
                this.chart.data.datasets[1].borderColor = '#999999';
                this.chart.data.datasets[1].backgroundColor = '#eeeeee';
                priceData.price_usd.forEach(function (v, k, a) {
                    _this3.chart.data.labels.push(priceData[k][0]);
                    _this3.chart.data.datasets[0].data.push(priceData[k][1]);
                });
                priceData.price_btc.forEach(function (v, k, a) {
                    _this3.chart.data.labels.push(priceData[k][0]);
                    _this3.chart.data.datasets[1].data.push(priceData[k][1]);
                });

                this.chart.update();
            }
        }, {
            key: 'getCurrencyData',
            value: function getCurrencyData(callback) {
                var period = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

                var _this = this;
                if (this.period === 'all') {
                    this.period = '';
                } else {
                    this.period = this.period.split(' ');
                    var from = moment();
                    from.subtract(this.period[0], this.period[1]);
                    var to = moment();
                    period = from.format('x') + '/' + to.format('x');
                }

                // period = this.buttons['1d'][0] + '/' + this.buttons['1d'][1]; //update
                $.ajax({
                    url: ajaxurl,
                    data: {
                        action: 'crypterio_get_currency_data',
                        currency: this.currency.id,
                        period: period,
                        transient_exp: this.cacheExp
                    },
                    success: function success(res) {
                        if (res.responseCode === 200) {
                            callback.call(_this, res);
                        }
                    }
                });
            }
        }]);

        return StmCryptoCharts;
    }();

    $(window).load(function () {
        window.stm_chart = new StmCryptoCharts('.stm_crypto_chart');
    });
})(jQuery);