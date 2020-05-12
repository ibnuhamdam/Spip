<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">Detail Form 11</h4>
        <div class="flashdata" data-flashtitle="Form 11" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
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
            <a href="<?= site_url('export/excel/form_11/').$id_form_8;?>"><button class="btn btn-success mb-3 ml-2"><i class="mdi mdi-download"></i> Download as excel file</button></a>
            <a href="<?= site_url('export/pdf/form_11/').$id_form_8;?>" target="_blank"><button class="btn btn-danger mb-3 ml-2"><i class="mdi mdi-download"></i> Download as pdf file</button></a>
        </div>
    </div>
</div>