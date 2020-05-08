<div class="row">
    <div class="card col-lg-12">
        <div class="card-body">
            <h4 class="card-title">Input Skor Form 11</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pernyataan Risiko</th>
                            <th width="150px">Skor</th>
                            <th>Dampak</th>
                            <th width="150px">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo form_open('');
                        foreach ($detail_data as $detail) :
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $detail->pernyataan_risiko; ?></td>
                                <td>
                                    <input type="text" name="<?= $detail->id_pernyataan; ?>[risiko]" class="form-control" value="<?= set_value($detail->id_pernyataan . '[risiko]'); ?>" placeholder="Skor Risiko">
                                    <?= form_error($detail->id_pernyataan . '[risiko]'); ?>
                                </td>
                                <td><?= $detail->dampak; ?></td>
                                <td>
                                    <input type="text" name="<?= $detail->id_pernyataan; ?>[dampak]" class="form-control" value="<?= set_value($detail->id_pernyataan . '[dampak]'); ?>" placeholder="Skor Dampak">
                                    <?= form_error($detail->id_pernyataan . '[dampak]'); ?>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>