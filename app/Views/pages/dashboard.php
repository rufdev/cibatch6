<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('contentarea'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $totaltickets ?></h3>

                        <p>Total Tickets</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $totalpending ?></h3>

                        <p>Total Pending</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalprocessing ?></h3>

                        <p>Total Processing</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $totalresolved ?></h3>

                        <p>Total Resolved</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $totallow ?></h3>

                        <p>LOW</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?= $totalmedium ?></h3>

                        <p>MEDIUM</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalhigh ?></h3>

                        <p>HIGH</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $totalcritical ?></h3>

                        <p>CRITICAL</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">TOTAL TICKET BY OFFICE</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">TOTAL TICKET BY SEVERITY</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('pagescript'); ?>
<script>
    $(function() {
        let barChartCanvas1 = $('#barChart1').get(0).getContext('2d');
        let barChartCanvas2 = $('#barChart2').get(0).getContext('2d');

        let barchartdata1 = <?= json_encode($barchartdata1) ?>;
        let barchartdata2 = <?= json_encode($barchartdata2) ?>;

        let barChartData1 = {
            labels: barchartdata1.map(function(item) {
                return item.office_name
            }),
            datasets: [{
                label: 'Total Ticket',
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                borderWidth: 1,
                data: barchartdata1.map(function(item) {
                    return item.ticket_count
                })
            }]
        };

        let barChartData2 = {
            labels: barchartdata2.map(function(item) {
                return item.severity
            }),
            datasets: [{
                label: 'Total Severity',
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                borderWidth: 1,
                data: barchartdata2.map(function(item) {
                    return item.ticket_count
                })
            }]
        }

        new Chart(barChartCanvas1, {
            type: 'bar',
            data: barChartData1,
            option: {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });

        new Chart(barChartCanvas2, {
            type: 'bar',
            data: barChartData2,
            option: {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });

    });
</script>
<?= $this->endSection(); ?>