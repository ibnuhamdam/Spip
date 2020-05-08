<!-- ============================================================== -->
<!-- Sales Cards  -->
<!-- ============================================================== -->
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white mb-0"><i class="mdi mdi-account-multiple"></i></h1>
                <h5 class="text-white mb-0"><?= $total_user; ?></h5>
                <h6 class="font-light text-white">User</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white mb-0"><i class="mdi mdi-google-circles-extended"></i></h1>
                <h5 class="text-white mb-0"><?= $total_ppk; ?></h5>
                <h6 class="font-light text-white">PPK</h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-6">
                <div class="bg-white px-5 py-5" style="min-height: 500px;">
                    <h5 class="ml-3" style="font-size:24px;">Total Role in %</h5>
                    <div class="percent-chart">
                        <canvas id="percent-chart"></canvas>
                    </div>

                </div>
            </div>
    
            <div class="col-md-6">
                <div class="bg-white px-5 py-5" style="min-height: 500px;">
                    <h5 class="ml-3 mb-3" style="font-size:24px;">Total Form in %</h5>
                    <div class="au-card-inner">
                        <canvas id="percent-chart2"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>