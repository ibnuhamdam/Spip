<div class="row">
    <div class="card col-lg-6 mx-auto">
        <div class="card-body">
            <h4 class="card-title"><?= ucfirst($title); ?> PPK</h4>
            <?= form_open(''); ?>
            <div class="form-group mt-4">
                <label for="nama_ppk">Nama PPK</label>
                <input type="text" name="nama_ppk" id="nama_ppk" class="form-control" value="<?= set_value('nama_ppk', $nama_ppk); ?>" placeholder="Nama PPK">
                <?= form_error('nama_ppk'); ?>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Deskripsi"><?= set_value('deskripsi', $deskripsi); ?></textarea>
                <?= form_error('deskripsi'); ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> <?= ucfirst($title); ?></button>
            <?= form_close(); ?>
        </div>
    </div>
</div>