<?php 
 $this->load->view('template/head');
 $this->load->view('template/navbar');
 $this->load->view('template/sidebar', ['role' => $this->session->userdata('role'), 'hal' => $this->uri->segment(1)]);
//  $this->load->view('template/breadcrumb', ['title' => 'Home', 'breadcrumb' => 'peta']);


?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Peta Resiko</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard');?>">Home</a></li>
                            <li class="breadcrumb-item active"  aria-current="page"><a href="<?= site_url('peta'); ?>">Peta Resiko</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Peta Resiko</li>
                        </ol>                    
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Peta Resiko</h4>
        <div class="flashdata" data-flashtitle="Form 11" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <div class="container">
            <div class="row">
                <?php if($detail_data[0]['id_pernyataan']): ?>
                <div class="col-md-12">

                    
                    <div class="row">

                        <div class="col-md-3 text-md-right">
                            <h3>Dampak</h3>
                        </div>
                        <div class="col-md-6">
                            <canvas id="scatterChart" width="200px" height="200px"></canvas>
                        </div>
                    </div>
                    
                    

                </div>

                <div class="col-md-6 offset-md-3 text-right" >
                    <h3>Kemungkinan</h3>
                </div>
                <?php else: ?>
                    <div class="col-md-6 offset-md-6 mb-5">
                        <h3>- Data Belum Ada -</h3>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php 
    $this->load->view('template/footer');
    $this->load->view('template/js');
?>
<script>
        
        var ctx = document.getElementById('scatterChart');
        
       

        ctx.style.background = 'rgb(208,11,11)';
        ctx.style.background = 'linear-gradient(180deg, rgba(208,11,11,0.8) 0%, rgba(61,182,65,0.8) 53%, rgba(0,212,255,0.8) 100%)';
        var scatterChart = new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Peta Resiko',
                    pointStyle: 'circle',
                    data: [
                        <?php 
                        $x = array();
                        $y = array();   
                        foreach ($detail_data as $d) :?>
                        <?php
                        $jml_skor_risiko = 0;
                        foreach ($d['skor_risiko'] as $r) {
                            $jml_skor_risiko = $jml_skor_risiko + $r;
                        }
                        array_push($x,round($jml_skor_risiko/$responden));
                        ?>
                    {
                        x: <?= round($jml_skor_risiko/$responden);?>,
                        <?php 
                        $jml_skor_dampak = 0;
                        foreach ($d['skor_dampak'] as $dp) {
                            $jml_skor_dampak = $jml_skor_dampak + $dp;
                        }
                        array_push($y,round($jml_skor_dampak/$responden));
                        ?>
                        y: <?= round($jml_skor_dampak/$responden);?>
                    },
                        <?php endforeach;
                        $max1 = max($x);
                        $min1 = min($x);
                        $max2 = max($y);
                        $min2 = min($y);
                        ?>
                   
                    ],
                    backgroundColor: [
                        <?php foreach ($detail_data as $d) :?>
                            '#052fff',
                        <?php endforeach;?>
                    ],
                    borderColor: [
                        <?php foreach ($detail_data as $d) :?>
                            '#052fff',
                        <?php endforeach;?>
                    ],
                    pointRadius: [
                        <?php foreach ($detail_data as $d) :?>
                            '10',
                        <?php endforeach;?>
                    ],
                    pointHoverRadius: [
                        <?php foreach ($detail_data as $d) :?>
                            '12',
                        <?php endforeach;?>
                    ]
                },{
                        label: 'Line Dataset',
                        data: [{
                            x:0,
                            y:<?= $max2/2;?>
                        },{
                            x:<?= $max1;?>+1,
                            y:<?= $max2/2;?>
                        }],
                        borderColor: 'rgba(255, 255, 255,0.4)',
                        backgroundColor: 'rgba(255, 255, 255,0)',

                        // Changes this dataset to become a line
                        type: 'line',
                        order: 1
                    },{
                        label: 'Line Dataset2',
                        data: [{
                            x:<?= ($max1+1)/2;?>,
                            y:0
                        },{
                            x:<?= ($max1+1)/2;?>,
                            y:<?= $max2;?>
                        }],
                        borderColor: 'rgba(255, 255, 255,0.4)',

                        // Changes this dataset to become a line
                        type: 'line',
                        order: 2
                    }]
            },
            options: {
                legend: {
                    display: false
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 20,
                        top: 20,
                        bottom: 10
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 4,
                            stepSize: 1
                        },
                        type: 'linear',
                        position: 'bottom'
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontFamily: "Poppins",
                            fontSize: 12,
                            stepSize: 1
                        }
                    }]
                },
                responsive: true
            }
        });
</script>
