<div class="card">
    <div class="card-body">
        <h4 class="card-title">Detail Form 8</h4>
        <div class="flashdata" data-flashtitle="Form 8" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <?php if ($role == 'PPK' && $is_done == 0) : ?>
            <a href="<?= site_url('detail_form_8/create/' . $id_form_8); ?>" class="btn btn-info mb-3"><i class="fas fa-plus-circle"></i> Input Risiko</a>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="align-middle">No.</th>
                        <th class="align-middle">Tahap Kegiatan</th>
                        <th class="align-middle">Pernyataan Risiko</th>
                        <th class="align-middle">Penyebab</th>
                        <th class="align-middle">Sumber Risiko</th>
                        <th class="align-middle text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($detail_data) : ?>
                        <?php foreach ($detail_data as $detail) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $detail->tahap_kegiatan; ?></td>
                                <td><?= $detail->pernyataan_risiko; ?></td>
                                <td><?= $detail->penyebab; ?></td>
                                <td>
                                    <?php
                                    $sumber = json_decode($detail->sumber);
                                    if (count($sumber) == 1) {
                                        echo ucfirst($sumber[0]);
                                    } else {
                                        for ($i = 0; $i < count($sumber); $i++) : ?>
                                            <ul class="list-unstyled">
                                                <li><?= ucfirst($sumber[$i]); ?></li>
                                            </ul>
                                    <?php endfor;
                                    } ?>
                                </td>
                                <td class="text-center" width="150px">
                                    <?= form_open('detail_form_8/delete', '', ['id_pernyataan' => $detail->id_pernyataan]); ?>
                                    <div class="btn-group-vertical">
                                        <a href="<?= site_url('detail_form_8/show/' . $detail->id_pernyataan); ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                        <?php if ($role == 'PPK' && $is_done == 0) : ?>
                                            <a href="<?= site_url('detail_form_8/edit/' . $detail->id_pernyataan); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                                            <button type="submit" class="btn btn-danger delete"><i class="fas fa-trash"></i> Hapus</button>
                                        <?php endif; ?>
                                    </div>
                                    <?= form_close(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2">
                <?php if ($role == 'PPK' && $is_done == 0) : ?>
                    <a href="<?= site_url('form_8/done/' . $id_form_8) ?>" class="btn btn-success"><i class="fas fa-save"></i> Selesai</a>
                <?php endif; ?>
                <?php if ($form_14 == FALSE && $is_done == 1) : ?>
                    <a href="<?= site_url('form_14/create/' . $id_form_8) ?>" class="btn btn-info"><i class="fas fa-plus-circle"></i> Buat Form 14</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
</div>