<style>
ul {
    list-style: none;
    padding-inline-start: 5px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="align-middle">No.</th>
                                    <th class="align-middle">Pernyataan Risiko</th>
                                    <th class="align-middle">Penyebab</th>
                                    <th class="align-middle">Pengendalian yang Sudah Ada</th>
                                    <th class="align-middle">Perbaikan Pengendalian</th>
                                    <th class="align-middle px-5 mx-5">Detektif (D) / Preventif (P) / Korektif (K)</th>
                                    <th class="align-middle">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($detail_data) : ?>
                                    <?php foreach ($detail_data as $detail) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $detail->pernyataan_risiko; ?></td>
                                            <td><?= $detail->penyebab; ?></td>
                                            <td><?= $detail->pengendalian; ?></td>
                                            <td><?= $detail->perbaikan_pengendalian; ?></td>
                                            <td><?= $detail->waktu; ?></td>
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