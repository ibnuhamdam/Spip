<div class="row">
    <div class="card col-lg-6 mx-auto">
        <div class="card-body">
            <h4 class="card-title">Ubah Form 14</h4>
            <?= form_open(''); ?>
            <div class="form-group mt-4">
                <label for="pengendalian">Risiko</label>
                <p class="form-control"><?= $detail->pernyataan_risiko; ?></p>
            </div>
            <div class="form-group">
                <label for="pengendalian">Penyebab</label>
                <p class="form-control"><?= $detail->penyebab; ?></p>
            </div>
            <div class="form-group">
                <label for="pengendalian">Pengendalian</label>
                <textarea name="pengendalian" id="pengendalian" class="form-control" rows="3" placeholder="Pengendalian"><?= set_value('pengendalian', $detail->pengendalian); ?></textarea>
                <?= form_error('pengendalian'); ?>
            </div>
            <div class="form-group">
                <label for="perbaikan_pengendalian">Perbaikan Pengendalian</label>
                <textarea name="perbaikan_pengendalian" id="perbaikan_pengendalian" class="form-control" rows="3" placeholder="Perbaikan Pengendalian"><?= set_value('perbaikan_pengendalian', $detail->perbaikan_pengendalian); ?></textarea>
                <?= form_error('perbaikan_pengendalian'); ?>
            </div>
            <?php $dpk = json_decode($detail->dpk); ?>
            <div class="form-group">
                <label for="sumber">Detektif / Preventif / Korektif</label>
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" name="dpk[]" class="custom-control-input" id="detektif" value="detektif" <?= set_checkbox('dpk[]', 'detektif', in_array('detektif', $dpk) ? TRUE : FALSE); ?>>
                    <label class="custom-control-label" for="detektif">Detektif</label>
                </div>
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" name="dpk[]" class="custom-control-input" id="preventif" value="preventif" <?= set_checkbox('dpk[]', 'preventif', in_array('preventif', $dpk) ? TRUE : FALSE); ?>>
                    <label class="custom-control-label" for="preventif">Preventif</label>
                </div>
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" name="dpk[]" class="custom-control-input" id="korektif" value="korektif" <?= set_checkbox('dpk[]', 'korektif', in_array('korektif', $dpk) ? TRUE : FALSE); ?>>
                    <label class="custom-control-label" for="korektif">Korektif</label>
                </div>
                <?= form_error('dpk[]'); ?>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="text" name="waktu" id="waktu" class="form-control" value="<?= set_value('waktu', $detail->waktu); ?>" placeholder="Waktu">
                <?= form_error('waktu'); ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Ubah</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>