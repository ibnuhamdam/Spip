<?php
 
 header("Content-type: application/octet-stream");
 
 header("Content-Disposition: attachment; filename=$nama.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>

<?php 
$this->load->view('template/head');
?>
<style>
    table td, table th {
        padding: 5px 10px;
    }
</style>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

            <div class="table-responsive">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" class="align-middle">No.</th>
                            <th rowspan="2" class="align-middle text-center">Pernyataan Risiko</th>
                            <th colspan="<?= $responden; ?>" class="text-center">Skor</th>
                            <th rowspan="<?= $responden; ?>" class="text-center">Rata-Rata</th>
                            <th rowspan="2" class="align-middle text-center">Dampak</th>
                            <th colspan="<?= $responden; ?>" class="text-center">Skor</th>
                            <th rowspan="<?= $responden; ?>" class="text-center">Rata-Rata</th>
                        </tr>
                        <tr>
                            <?php
                            for ($i = 0; $i < 2; $i++) {
                                for ($j = 1; $j <= $responden; $j++) {
                                    echo '<th class="text-center">R' . $j . '</th>';
                                }
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail_data as $detail) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $detail['pernyataan_risiko']; ?></td>
                                <?php
                                $jml_skor_risiko = 0;
                                foreach ($detail['skor_risiko'] as $r) {
                                    echo '<td class="text-center">' . $r . '</td>';
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
                                <td><?= $detail['dampak'] ?></td>
                                <?php
                                $jml_skor_dampak = 0;
                                foreach ($detail['skor_dampak'] as $d) {
                                    echo '<td class="text-center">' . $d . '</td>';
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
<?php 
$this->load->view('template/js');
$this->load->view('template/footer');
?>