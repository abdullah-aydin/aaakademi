<?php require admin_view('static/header')  ?>



<?php require admin_view('static/navbar')  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="d-flex">
                    <div class="p-2">
                        <h1 class="m-0 text-dark">Anasayfa</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?=$week_question_total?></h3>

                                <strong>Haftalık Çözülen Toplam Soru</strong>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?=target_percent($question_total,$question_target)?><sup style="font-size: 20px">%</sup> | <?=target_percent($book_read_total,$book_target)?><sup style="font-size: 20px">%</sup>  </h3>

                                <strong>(Soru | Kitap) <i style="font-size:.8rem;">Günlük</i></strong><br>
                                <strong> Tamamlanan Hedef</strong>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?=$day_questions_record_score?> <i style="font-size:.8rem;"><?=$day_questions_record_date?></i></h3>

                                <strong>Günlük Çözülen Soru Rekoru</strong>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?=$book_reads_max_page?> <i style="font-size:.8rem;"><?=$book_reads_max_day?></i></h3>

                                <strong>Günlük Okunan Sayfa Rekoru</strong>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">(HAFTALIK) HER DERSTEN ÇÖZÜLEN SORU GRAFİĞİ</h3>
                            </div>
                            <div class="card-body pt-0">
                                <div class="chart">
                                    <canvas id="weekLessonsBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">(HAFTALIK) TOPLAM ÇÖZÜLEN SORU GRAFİĞİ</h3>
                            </div>
                            <div class="card-body pt-0">
                                <div class="chart">
                                    <canvas id="weekTotalBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">(AYLIK) TOPLAM ÇÖZÜLEN SORU GRAFİĞİ</h3>
                            </div>
                            <div class="card-body pt-0">
                                <div class="chart">
                                    <canvas id="monthTotalBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php require admin_view('static/footer')  ?>
    <script>
        $(function() {
            var ChartData = {

                datasets: [{
                    label: 'Doğru Sayısı',
                    backgroundColor: '#21bf73',
                    data: [],

                },
                    {
                        label: 'Yanlış Sayısı',
                        backgroundColor: '#d8345f',
                        data: [],
                    },
                    {
                        label: 'Boş Sayısı',
                        backgroundColor: '#dbdbdb',
                        data: [],
                    },
                ]
            }
            /*********weekBarChart*********** */
            var weekLessonsChart = $('#weekLessonsBarChart').get(0).getContext('2d');
            var weekLessonsChartData = jQuery.extend(true, {}, ChartData);
            weekLessonsChartData.datasets[0]['data'] = <?= json_encode($week_question_true) ?>;
            weekLessonsChartData.datasets[1]['data'] = <?= json_encode($week_question_false) ?>;
            weekLessonsChartData.datasets[2]['data'] = <?= json_encode($week_question_empty) ?>;
            weekLessonsChartData.labels = <?= json_encode($week_lesson_name) ?>;

            var weekLessonsChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                        maxBarThickness: 40

                    }, ],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
            var stackedBarChart = new Chart(weekLessonsChart, {
                type: 'bar',
                data: weekLessonsChartData,
                options: weekLessonsChartOptions
            })

            /*********weekTotalBarChart*********** */
            var weekTotalChart = $('#weekTotalBarChart').get(0).getContext('2d');
            var weekQuestionsChartData = jQuery.extend(true, {}, ChartData);
            weekQuestionsChartData.datasets[0]['data'] = <?= json_encode($week_all_question_true) ?>;
            weekQuestionsChartData.datasets[1]['data'] = <?= json_encode($week_all_question_false) ?>;
            weekQuestionsChartData.datasets[2]['data'] = <?= json_encode($week_all_question_empty) ?>;
            weekQuestionsChartData.labels = <?= json_encode($week_all_question_day) ?>;

            var stackedTotalChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                        maxBarThickness: 40

                    }, ],
                    yAxes: [{
                        stacked: true
                    }]
                },

            }
            var stackedBarChart = new Chart(weekTotalChart, {
                type: 'bar',
                data: weekQuestionsChartData,
                options: stackedTotalChartOptions
            })


            /*********monthTotalBarChart*********** */
            var MonthQuestionChartData = {

                datasets: [
                    {
                        label               : 'Digital Goods',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : []
                    },
                ]
            }
            var monthTotalChart = $('#monthTotalBarChart').get(0).getContext('2d');
            var monthQuestionsChartData = jQuery.extend(true, {}, MonthQuestionChartData);
            monthQuestionsChartData.datasets[0]['data'] = <?= json_encode($month_all_question_total) ?>;
            monthQuestionsChartData.labels = <?= json_encode($month_all_question_day) ?>;

            var stackedTotalChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }],
                    yAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }]
                }
            }
            var stackedBarChart = new Chart(monthTotalChart, {
                type: 'line',
                data: monthQuestionsChartData,
                options: stackedTotalChartOptions
            })

        })
    </script>

<?php require admin_view('static/footer-end')  ?>