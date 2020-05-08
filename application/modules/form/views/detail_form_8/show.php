<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">Detail Form 8</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Tahap Kegiatan</td>
                    <td><?= $detail->tahap_kegiatan; ?></td>
                </tr>
                <tr>
                    <td>Pernyataan Risiko</td>
                    <td><?= $detail->pernyataan_risiko; ?></td>
                </tr>
                <tr>
                    <td>Penyebab</td>
                    <td><?= $detail->penyebab; ?></td>
                </tr>
                <tr>
                    <td>Sumber Risiko</td>
                    <td>
                        <?php
                        $sumber = json_decode($detail->sumber);
                        if (count($sumber) == 1) {
                            echo ucfirst($sumber[0]);
                        } else {
                            for ($i = 0; $i < count($sumber); $i++) : ?>
                                <ul>
                                    <li><?= ucfirst($sumber[$i]); ?></li>
                                </ul>
                        <?php endfor;
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>Dampak pada Capaian Tujuan</td>
                    <td><?= $detail->dampak; ?></td>
                </tr>
                <tr>
                    <td>Pemilik Risiko</td>
                    <td><?= $detail->pemilik_risiko; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>