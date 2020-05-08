<div class="card">
    <div class="card-body">
        <h4 class="card-title">Form 11 List</h4>
        <div class="flashdata" data-flashtitle="Form 11" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun</th>
                        <th>PPK</th>
                        <th>Dibuat</th>
                        <th>Status</th>
                        <th>Verifikasi</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($form_8_data) : ?>
                        <?php foreach ($form_8_data as $form_8) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= nice_date($form_8->date_created, 'Y'); ?></td>
                                <td><?= $form_8->nama_ppk; ?></td>
                                <td><?= $form_8->date_created; ?></td>
                                <td class="text-center">
                                    <?php if ($form_8->is_done == 0) : ?>
                                        <span class="badge badge-pill badge-secondary"><i class="fas fa-clock"></i> Belum Selesai</span>
                                    <?php else : ?>
                                        <span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i> Selesai</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($form_8->status == 0) : ?>
                                        <span class="badge badge-pill badge-secondary"><i class="fas fa-clock"></i> Belum Diverifikasi</span>
                                    <?php elseif ($form_8->status == 1) : ?>
                                        <span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i> Disetujui</span>
                                    <?php else : ?>
                                        <span class="badge badge-pill badge-secondary"><i class="fas fa-times-circle"></i> Tidak Disetujui</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center" width="140px">
                                    <div class="btn-group">
                                        <a href="<?= site_url('form_11/show/' . $form_8->id_form_8); ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                    </div>
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
        <?= $pagination; ?>
    </div>
</div>