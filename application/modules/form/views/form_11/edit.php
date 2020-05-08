<div class="row">
    <div class="card col-lg-12">
        <div class="card-body">
            <h4 class="card-title">Ubah Form 11</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pernyataan Risiko</th>
                            <th width="150px">Skor</th>
                            <th>Dampak</th>
                            <th width="150px">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= form_open(); ?>
                        <tr>
                            <td><?= $detail->pernyataan_risiko; ?></td>
                            <td>
                                <input type="text" name="risiko" value="<?= set_value('risiko', $detail->skor_risiko); ?>" class="form-control">
                                <?= form_error('risiko'); ?>
                            </td>
                            <td><?= $detail->dampak; ?></td>
                            <td>
                                <input type="text" name="dampak" value="<?= set_value('dampak', $detail->skor_dampak); ?>" class="form-control">
                                <?= form_error('dampak'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Ubah</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>