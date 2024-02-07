<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                    <div class="single_quick_activity">
                                        <h4>Total Modal</h4>
                                        <h3><span class=""><?= format_rupiah($belanja); ?></span> </h3>
                                        <p>Modal Sepanjang Periode</p>
                                    </div>
                                    <div class="single_quick_activity">
                                        <h4>Total Penjualan</h4>
                                        <h3><span class=""><?= format_rupiah($penjualan); ?></span> </h3>
                                        <p>Keuntungan Sepanjang Periode</p>
                                    </div>
                                    <div class="single_quick_activity">
                                        <h4>Kerugian</h4>
                                        <h3>$ <span class="counter">2,000</span> </h3>
                                        <p>Kerugian Sepanjang Periode</p>
                                    </div>
                                    <div class="single_quick_activity">
                                        <h4>Net Profit Margin</h4>
                                        <h3>$ <span class="counter">1,79,000</span> </h3>
                                        <p>Saved 65%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="white_box mb_30 min_400 ">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">Perbandingan Penjualan dan Pembelian</h3>
                        </div>
                    </div>
                    <canvas id="penjualanChart"></canvas>
                </div>
            </div>

            <div class="col-lg-12 col-xl-6">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block ">
                        <div class="main-title">
                            <h3 class="mb-0">Total Belanja & Penjualan Per Tahun</h3>
                        </div>
                    </div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 ">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">% of Income Budget</h3>
                        </div>
                    </div>
                    <div id="radial_2"></div>
                    <div class="radial_footer">
                        <div class="radial_footer_inner d-flex justify-content-between">
                            <div class="left_footer">
                                <h5> <span style="background-color: #EDECFE;"></span> Blance</h5>
                                <p>-$18,570</p>
                            </div>
                            <div class="left_footer">
                                <h5> <span style="background-color: #A4A1FB;"></span> Blance</h5>
                                <p>$31,430</p>
                            </div>
                        </div>
                        <div class="radial_bottom">
                            <p><a href="#">View Full Report</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="white_box min_430">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">% of Expenses Budget</h3>
                        </div>
                    </div>
                    <div id="radial_1"></div>
                    <div class="radial_footer">
                        <div class="radial_footer_inner d-flex justify-content-between">
                            <div class="left_footer">
                                <h5> <span style="background-color: #EDECFE;"></span> Blance</h5>
                                <p>-$18,570</p>
                            </div>
                            <div class="left_footer">
                                <h5> <span style="background-color: #A4A1FB;"></span> Blance</h5>
                                <p>$31,430</p>
                            </div>
                        </div>
                        <div class="radial_bottom">
                            <p><a href="#">View Full Report</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">EBIT (Earnings Before Interest & Tax)</h3>
                        </div>
                    </div>
                    <canvas height="200" id="visit-sale-chart"></canvas>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block align-items- ">
                        <div class="main-title">
                            <h3 class="mb-0">Cost of goods / Services</h3>
                        </div>
                        <div class="title_info">
                            <p>1 Jan 2020 to 31 Dec 2020 <br>
                                <div class="legend_style text-end">
                                    <li> <span style="background-color: #A4A1FB;"></span> Services</li>
                                    <li class="inactive"> <span style="background-color: #A4A1FB;"></span> Avarage
                                    </li>
                                </div>
                            </p>
                        </div>
                    </div>
                    <canvas height="200" id="visit-sale-chart2"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="white_box mb_30 min_400">
                    <div class="box_header ">
                        <div class="main-title">
                            <h3 class="mb-0">Disputed vs Overdue Invoices</h3>
                        </div>
                    </div>
                    <canvas height="220px" id="doughutChart"></canvas>
                    <div class="legend_style mt_10px ">
                        <li class="d-block"> <span style="background-color: #DF67C1;"></span> Disputed Invoices
                        </li>
                        <li class="d-block"> <span style="background-color: #6AE0BD;"></span> Avarage</li>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3">
                <div class="white_box mb_30 min_400">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">Disputed vs Overdue Invoices</h3>
                        </div>
                    </div>
                    <canvas height="220px" id="doughutChart2"></canvas>
                    <div class="legend_style legend_style_grid mt_10px">
                        <li class="d-block"> <span style="background-color: #FF7B36;"></span> 30 Days</li>
                        <li class="d-block"> <span style="background-color: #E8205E;"></span> 60 Days</li>
                        <li class="d-block"> <span style="background-color: #3B76EF"></span> 90 Days</li>
                        <li class="d-block"> <span style="background-color:#00BFBF;"></span> 90+Days</li>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="white_box min_400">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">EBIT (Earnings Before Interest & Tax)</h3>
                        </div>
                        <div class="title_info">
                            <p>1 Jan 2020 to 31 Dec 2020</p>
                        </div>
                    </div>
                    <div id="area_active"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="white_box mb_30 min_400">
                    <div class="box_header ">
                        <div class="main-title">
                            <h3 class="mb-0">Inventory Turnover</h3>
                        </div>
                    </div>
                    <div id="stackbar_active"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var chartColors = {
        red: 'rgb(255, 99, 132)',
        blue: 'rgb(54, 162, 235)'
    };

    var salesAndPurchases = <?php echo json_encode($sales_and_purchases); ?>;

    var labels = [];
    var penjualanData = [];
    var pembelianData = [];

    // Mengisi array labels dan data penjualan/pembelian dari data yang diambil dari PHP
    Object.keys(salesAndPurchases).forEach(function(key) {
        labels.push(key);
        penjualanData.push(salesAndPurchases[key]['total_penjualan']);
        pembelianData.push(salesAndPurchases[key]['total_pembelian']);
    });

    var config = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan',
                backgroundColor: chartColors.red,
                borderColor: chartColors.red,
                data: penjualanData,
                fill: false
            }, {
                label: 'Total Pembelian',
                backgroundColor: chartColors.blue,
                borderColor: chartColors.blue,
                data: pembelianData,
                fill: false
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Perbandingan Penjualan dan Pembelian'
            },
            // tooltips: {
            //     mode: 'label'
            // },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Periode'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Total'
                    }
                }]
            }
        }
    };

    var ctx = document.getElementById('penjualanChart').getContext('2d');
    var myChart = new Chart(ctx, config);
</script>

<script>
    var tahun = <?php echo json_encode($tahun); ?>;
    var totalPenjualan = <?php echo json_encode($total_penjualan); ?>;
    var totalBelanja = <?php echo json_encode($total_belanja); ?>;

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tahun,
            datasets: [{
                label: 'Total Penjualan',
                data: totalPenjualan,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: 'Total Belanja',
                data: totalBelanja,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Tahun'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Total'
                    }
                }
            },
            plugins: {
                title: {
                    display: false
                }
            },
            // Mengatur lebar relatif bar
            indexAxis: 'y',
            barPercentage: 0.8, // 80% dari lebar kanvas
            categoryPercentage: 0.5 // 50% dari lebar kanvas
        }
    });
</script>