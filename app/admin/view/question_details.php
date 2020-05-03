<?php require admin_view('static/header')  ?>



<?php require admin_view('static/navbar')  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">
                        <?php
                        foreach ($menus as $menu) {
                            echo $menu['url'] == $menu_active ?  $menu['title'] : null;
                        }
                        ?>
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?php foreach ($lessons as $lesson_key => $lesson_val) : ?>
                        <div class="card card-<?= $theme_color[$themeIndex] ?> 
                        <?= $lesson_key == post('lesson_name') ? null : 'collapsed-card' ?>">
                            <div class=" card-header">
                                <h3 class="card-title"><?= $lessons_lgs[$lesson_key] ?></h3>
                                <div class="card-tools">
                                    <cite style="font-size: .8rem">Hedefiniz günlük 20 soru</cite>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-row " method="post" action="">
                                    <div class="form-group col-md-4">
                                        <label for="lecture_id">Ders Konusu</label>
                                        <select id="lecture_id" name="lecture_id" class="form-control">
                                            <option disabled selected>Ders Konusu</option>
                                            <?php foreach ($lectures_lgs[$lesson_key] as $key => $val) : ?>
                                                <option value="<?= $key ?>"><?= $val ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="question_true">Doğru</label>
                                        <input type="number" name="question_true" class="form-control" min="0" id="question_true">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="question_false">Yanlış</label>
                                        <input type="number" min="0" name="question_false" class="form-control" id="question_false">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="question_empty">Boş</label>
                                        <input type="number" min="0" name="question_empty" class="form-control" id="question_empty">
                                    </div>
                                    <div class="form-group col-md-2 d-flex align-items-end ml-auto">
                                        <button type="submit" class="btn btn-<?= $theme_color[$themeIndex] ?> form-control">Ekle</button>
                                    </div>
                                    <div class="form-group col-md-1 d-flex align-items-center justify-content-end ml-auto" style="color:green">
                                        <i class="far fa-check-circle align-self-center"></i>
                                        <cite style="font-size: .8rem">Toplam 10 soru çözdünüz.</cite>
                                    </div>
                                    <input type="hidden" name="lesson_name" value="<?= $lesson_key ?>">
                                </form>
                                <table class="table table-sm">
                                    <thead>
                                        <tr class="table-<?= $theme_color[$themeIndex] ?>">
                                            <th scope="col">Ders Konusu</th>
                                            <th scope="col">Doğru</th>
                                            <th scope="col">Yanlış</th>
                                            <th scope="col">Boş</th>
                                            <th scope="col">Net</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($questions as $question) : ?>
                                            <?php if ($question['lesson_name'] == $lesson_key) : ?>
                                                <tr>
                                                    <td><?= ($lectures_lgs[$lesson_key][$question['lecture_id']]) ?></td>
                                                    <td><?= $question['question_true'] ?></td>
                                                    <td><?= $question['question_false'] ?></td>
                                                    <td><?= $question['question_empty'] ?></td>
                                                    <td><?= net_hesaplama($question['question_true'], $question['question_false']) ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <?php $themeIndex++ ?>
                    <?php endforeach; ?>
                    <!-- /.card -->
                    <!-- <div class="card card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Matematik</h3>
                    <div class="card-tools">
                        <cite style="font-size: .8rem">Hedefiniz günlük 20 soru</cite>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row ">
                        <div class="form-group col-md-4">
                            <label for="inputState">Ders Konusu</label>
                            <select id="inputState" class="form-control">
                                <option disabled selected>Ders Konusu</option>
                                <option>Üslü Sayılar</option>
                            </select>
                        </div>
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-1">
                            <label for="inputCity">Doğru</label>
                            <input type="number" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputCity">Yanlış</label>
                            <input type="number" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-2 d-flex align-items-end ml-auto">
                            <button type="submit" class="btn btn-warning form-control">Ekle</button>
                        </div>
                        <div class="form-group col-md-1 d-flex align-items-center justify-content-end ml-auto" style="color:red">
                            <i class="far fa-times-circle align-self-center"></i>
                            <cite style="font-size: .8rem">Toplam 10 soru çözdünüz.</cite>
                        </div>
                    </div>
                </div>
               
            </div> -->
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <!-- STACKED BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Stacked Bar Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->



        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require admin_view('static/footer')  ?>
<!-- ChartJS -->
<script src="<?= admin_assets_url('plugins/Chart.js/Chart.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= admin_assets_url('dist/js/demo.js') ?>"></script>

<script>
    $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var lineChartData = jQuery.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    'Chrome',
                    'IE',
                    'FireFox',
                    'Safari',
                    'Opera',
                    'Navigator',
                ],
                datasets: [{
                    data: [700, 500, 400, 600, 300, 100],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = jQuery.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        }) <
        />


    <?php require admin_view('static/footer-end')  ?>