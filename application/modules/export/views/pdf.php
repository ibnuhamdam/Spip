<?php 
$this->load->view('template/head');
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="align-middle">No.</th>
                                    <th class="align-middle">Tahap Kegiatan</th>
                                    <th class="align-middle">Pernyataan Risiko</th>
                                    <th class="align-middle">Penyebab</th>
                                    <th class="align-middle">Sumber Risiko</th>
                                    <th class="align-middle">Dampak pada capaian tujuan</th>
                                    <th class="align-middle">Pemilik Resiko</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($detail_data) : ?>
                                    <?php $no=1; foreach ($detail_data as $detail) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $detail->tahap_kegiatan; ?></td>
                                            <td><?= $detail->pernyataan_risiko; ?></td>
                                            <td><?= $detail->penyebab; ?></td>
                                            <td>
                                                <?php
                                                $sumber = json_decode($detail->sumber);
                                                if (count($sumber) == 1) {
                                                    echo ucfirst($sumber[0]);
                                                } else {
                                                    for ($i = 0; $i < count($sumber); $i++) : ?>
                                                        <ul class="list-unstyled">
                                                            <li><?= ucfirst($sumber[$i]); ?></li>
                                                        </ul>
                                                <?php endfor;
                                                } ?>
                                            </td>
                                            <td><?= $detail->dampak; ?></td>
                                            <td><?= $detail->pemilik_risiko; ?></td>
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
$this->load->view('template/js');
$this->load->view('template/footer');
?>
<script>
    setTimeout(printpdf1, 500);
    function printpdf1() {
        window.print();
    }
</script>