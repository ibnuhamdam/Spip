<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">Detail Form 17</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Pernyataan Risiko</td>
                    <td><?= $detail->pernyataan_risiko; ?></td>
                </tr>
                <tr>
                    <td>Pemilik Risiko</td>
                    <td><?= $detail->pemilik_risiko; ?></td>
                </tr>
                <tr>
                    <td>Pengendalian Kunci</td>
                    <td><?= $detail->perbaikan_pengendalian . $detail->perbaikan_informasi . $detail->perbaikan_komunikasi; ?></td>
                </tr>
                <tr>
                    <td>Pemantauan yang Sudah Dilaksanakan</td>
                    <td><?= $detail->pemantauan; ?></td>
                </tr>
                <tr>
                    <td>Perbaikan Pemantauan</td>
                    <td><?= $detail->perbaikan_pemantauan; ?></td>
                </tr>
                <tr>
                    <td>Waktu Pemantauan</td>
                    <td><?= $detail->waktu_pemantauan; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>