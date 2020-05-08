<div class="row">
    <div class="card col-lg-8 mx-auto">
        <div class="card-body">
            <h4 class="card-title">Ubah Form 8</h4>
            <?= form_open(''); ?>
            <div class="form-group mt-4">
                <label for="tahap_kegiatan">Tahap Kegiatan</label>
                <?php if ($tahap_kegiatan_data) : ?>
                    <?php foreach ($tahap_kegiatan_data as $tahap_kegiatan) : ?>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="id_tahap_kegiatan" id="id_tahap_kegiatan" value="<?= $tahap_kegiatan->id_tahap_kegiatan; ?>" <?= set_radio('id_tahap_kegiatan', $tahap_kegiatan->id_tahap_kegiatan, $detail->id_tahap_kegiatan == $tahap_kegiatan->id_tahap_kegiatan ? TRUE : FALSE); ?>>
                                </span>
                            </div>
                            <label for="id_tahap_kegiatan" class="form-control"><?= $tahap_kegiatan->tahap_kegiatan; ?></label>
                            <?= form_error('tahap_kegiatan'); ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <input type="radio" name="id_tahap_kegiatan" id="id_tahap_kegiatan" value="buat_baru" <?= set_radio('id_tahap_kegiatan', 'buat_baru', FALSE); ?>>
                            </span>
                        </div>
                        <input type="text" name="tahap_kegiatan" id="tahap_kegiatan" class="form-control" placeholder="Tahap Kegiatan" value="<?= set_value('tahap_kegiatan'); ?>" disabled>
                        <?= form_error('tahap_kegiatan'); ?>
                    </div>
                <?php else : ?>
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <input type="radio" name="id_tahap_kegiatan" id="id_tahap_kegiatan" value="buat_baru" <?= set_radio('id_tahap_kegiatan', 'buat_baru', TRUE); ?>>
                            </span>
                        </div>
                        <input type="text" name="tahap_kegiatan" id="tahap_kegiatan" class="form-control" placeholder="Tahap Kegiatan" value="<?= set_value('tahap_kegiatan'); ?>">
                        <?= form_error('tahap_kegiatan'); ?>
                    </div>
                <?php endif; ?>
                <?= form_error('id_tahap_kegiatan'); ?>
            </div>
            <div class="form-group">
                <label for="pernyataan_risiko">Pernyataan Risiko</label>
                <textarea name="pernyataan_risiko" id="pernyataan_risiko" class="form-control" rows="3" placeholder="Pernyataan Risiko"><?= set_value('pernyataan_risiko', $detail->pernyataan_risiko); ?></textarea>
                <?= form_error('pernyataan_risiko'); ?>
            </div>
            <div class="form-group">
                <label for="penyebab">Penyebab</label>
                <textarea name="penyebab" id="penyebab" class="form-control" rows="3" placeholder="Penyebab"><?= set_value('penyebab', $detail->penyebab); ?></textarea>
                <?= form_error('penyebab'); ?>
            </div>
            <?php $sumber = json_decode($detail->sumber); ?>
            <div class="form-group">
                <label for="sumber">Sumber</label>
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" name="sumber[]" class="custom-control-input" id="internal" value="internal" <?= set_checkbox('sumber[]', 'internal', in_array('internal', $sumber) ? TRUE : FALSE); ?>>
                    <label class="custom-control-label" for="internal">Internal</label>
                </div>
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" name="sumber[]" class="custom-control-input" id="eksternal" value="eksternal" <?= set_checkbox('sumber[]', 'eksternal', in_array('eksternal', $sumber) ? TRUE : FALSE); ?>>
                    <label class="custom-control-label" for="eksternal">Eksternal</label>
                </div>
                <?= form_error('sumber[]'); ?>
            </div>
            <div class="form-group">
                <label for="dampak">Dampak</label>
                <textarea name="dampak" id="dampak" class="form-control" rows="3" placeholder="Dampak"><?= set_value('dampak', $detail->dampak); ?></textarea>
                <?= form_error('dampak'); ?>
            </div>
            <div class="form-group">
                <label for="pemilik_risiko">Pemilik Risiko</label>
                <input type="text" name="pemilik_risiko" id="pemilik_risiko" class="form-control" value="<?= set_value('pemilik_risiko', $detail->pemilik_risiko); ?>" placeholder="Pemilik Risiko">
                <?= form_error('pemilik_risiko'); ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>