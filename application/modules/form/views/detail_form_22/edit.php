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
                <label for="pemantauan">Pemantauan</label>
                <input type="text" name="pemantauan" id="pemantauan" class="form-control" placeholder="Pemantauan" value="<?= set_value('pemantauan', $detail->pemantauan); ?>">
                <?= form_error('pemantauan'); ?>
            </div>
            <div class="form-group">
                <label for="perbaikan_pemantauan">Perbaikan Pemantauan</label>
                <input type="text" name="perbaikan_pemantauan" id="perbaikan_pemantauan" class="form-control" placeholder="Perbaikan Pemantauan" value="<?= set_value('perbaikan_pemantauan', $detail->perbaikan_pemantauan); ?>">
                <?= form_error('perbaikan_pemantauan'); ?>
            </div>
            <div class="form-group">
                <label for="waktu_pemantauan">Waktu Pemantauan</label>
                <input type="text" name="waktu_pemantauan" id="waktu_pemantauan" class="form-control" placeholder="Waktu Pemantauan" value="<?= set_value('waktu_pemantauan', $detail->waktu_pemantauan); ?>">
                <?= form_error('waktu_pemantauan'); ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Ubah</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>