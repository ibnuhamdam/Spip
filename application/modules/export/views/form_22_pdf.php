<div class="" style="margin-right:10px;margin-left:10px;">
    <div class="row">
        <div class="col-md-12">
        
            <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">No.</th>
                                    <th rowspan="2" class="align-middle">Pernyataan Risiko</th>
                                    <th rowspan="2" class="align-middle">Pemilik Risiko</th>
                                    <th colspan="2" class="text-center">Resiko Awal</th>
                                    <th rowspan="2" class="align-middle">Pengendalian Kunci</th>
                                    <th rowspan="2" class="align-middle">Pemantauan yang Dilaksanakan</th>
                                    <th rowspan="2" class="align-middle">Perbaikan Pemantauan</th>
                                    <th rowspan="2" class="align-middle">Waktu Pemantauan</th>
                                </tr>
                                <tr>
                                    <th>Kemungkinan</th>
                                    <th>Dampak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($detail_data) : ?>
                                    <?php $no=1;foreach ($detail_data as $detail) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $detail['pernyataan_risiko']; ?></td>
                                            <td><?= $detail['pemilik_risiko']; ?></td>
                                            <?php
                                            $jml_skor_risiko = 0;
                                            foreach ($detail['skor_risiko'] as $r) {
                                                $jml_skor_risiko = $jml_skor_risiko + $r;
                                            }
                                            ?>
                                            <td class="text-center"><b><?php
                                                if($responden == 0){
                                                    echo 0;
                                                }else{
                                                    echo round($jml_skor_risiko/$responden);
                                                }
                                            ?></b></td>
                                            <?php
                                            $jml_skor_dampak = 0;
                                            foreach ($detail['skor_dampak'] as $d) {
                                                $jml_skor_dampak = $jml_skor_dampak + $d;
                                            }
                                            ?>
                                            <td class="text-center"><b><?php
                                                if($responden == 0){
                                                    echo 0;
                                                }else{
                                                    echo round($jml_skor_dampak/$responden);
                                                }
                                            ?></b></td>
                                            <td><?= $detail['pengendalian_kunci'];?></td>
                                            <td><?= $detail['pemantauan']; ?></td>
                                            <td><?= $detail['perbaikan_pemantauan']; ?></td>
                                            <td><?= $detail['waktu_pemantauan']; ?></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data!</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>   
<?php 
    $this->load->view('template/footer');
    $this->load->view('template/js');
?> 
<script>
    setTimeout(printpdf1, 500);
    function printpdf1() {
        window.print();
    }
</script>