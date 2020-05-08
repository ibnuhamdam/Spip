<div class="row">
    <div class="card col-lg-6 mx-auto">
        <div class="card-body">
            <h4 class="card-title">Ubah Form 17</h4>
            <?= form_open(''); ?>
            <div class="form-group mt-4">
                <label for="pernyataan_risiko">Pernyataan Risiko</label>
                <p class="form-control"><?= $detail->pernyataan_risiko; ?></p>
            </div>
            <div class="form-group mt-4">
                <label for="pernyataan_risiko">Penyebab</label>
                <p class="form-control"><?= $detail->penyebab; ?></p>
            </div>
            <div class="form-group">
                <label for="existing_infokom">Existing Infokom</label>
                <input type="text" name="existing_infokom" id="existing_infokom" class="form-control" rows="3" placeholder="Existing Infokom" value="<?= set_value('existing_infokom', $detail->existing_infokom); ?>">
                <?= form_error('existing_infokom'); ?>
            </div>
            <div class="form-group">
                <label for="perbaikan_informasi">Perbaikan Informasi</label>
                <input type="text" name="perbaikan_informasi" id="perbaikan_informasi" class="form-control" rows="3" placeholder="Perbaikan Informasi" value="<?= set_value('perbaikan_informasi', $detail->perbaikan_informasi); ?>">
                <?= form_error('perbaikan_informasi'); ?>
            </div>
            <div class="form-group">
                <label for="perbaikan_komunikasi">Perbaikan Komunikasi</label>
                <input type="text" name="perbaikan_komunikasi" id="perbaikan_komunikasi" class="form-control" rows="3" placeholder="Perbaikan Komunikasi" value="<?= set_value('perbaikan_komunikasi', $detail->perbaikan_komunikasi); ?>">
                <?= form_error('perbaikan_komunikasi'); ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Ubah</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>