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
                    <td>Penyebab</td>
                    <td><?= $detail->penyebab; ?></td>
                </tr>
                <tr>
                    <td>Pengendalian yang Sudah Ada</td>
                    <td><?= $detail->pengendalian; ?></td>
                </tr>
                <tr>
                    <td>Perbaikan Pengendalian</td>
                    <td><?= $detail->perbaikan_pengendalian; ?></td>
                </tr>
                <tr>
                    <td>Detektif (D) / Preventif (P) / Korektif (K)</td>
                    <td>
                        <?php
                        if ($detail->dpk) {
                            $dpk = json_decode($detail->dpk);
                            if (count($dpk) == 1) {
                                echo ucfirst($dpk[0]);
                            } else {
                                echo '<ul>';
                                for ($i = 0; $i < count($dpk); $i++) {
                                    echo '<li>' . ucfirst($dpk[$i]) . '</li>';
                                }
                                echo '</ul>';
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td><?= $detail->waktu; ?></td>
                </tr>
                <tr>
                    <td>Existing Infokom</td>
                    <td><?= $detail->existing_infokom; ?></td>
                </tr>
                <tr>
                    <td>Perbaikan Informasi</td>
                    <td><?= $detail->perbaikan_informasi; ?></td>
                </tr>
                <tr>
                    <td>Perbaikan Komunikasi</td>
                    <td><?= $detail->perbaikan_komunikasi; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>