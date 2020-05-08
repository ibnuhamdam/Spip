<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">Form 14 List</h4>
        <div class="flashdata" data-flashtitle="Form 8" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <!-- <a href="<?= site_url('form_8/create'); ?>" class="btn btn-info mb-3"><i class="fas fa-plus-circle"></i> Tambah</a> -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <?php if ($role == 'Admin') : ?>
                            <th>PPK</th>
                        <?php endif; ?>
                        <th>Tahun</th>
                        <th>Dibuat</th>
                        <th>Status</th>
                        <th>Verifikasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($form_14_data) :
                        foreach ($form_14_data as $form_14) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <?php
                                if ($role == 'Admin') {
                                    echo '<td>' . $form_14->nama_ppk . '</td>';
                                }
                                ?>
                                <td><?= nice_date($form_14->date_created, 'Y'); ?></td>
                                <td><?= $form_14->date_created; ?></td>
                                <td class="text-center">
                                    <?php if ($form_14->is_done == 0) : ?>
                                        <span class="badge badge-pill badge-secondary"><i class="fas fa-clock"></i> Belum Selesai</span>
                                    <?php else : ?>
                                        <span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i> Selesai</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($form_14->status == 0) : ?>
                                        <span class="badge badge-pill badge-secondary"><i class="fas fa-clock"></i> Belum Diverifikasi</span>
                                    <?php elseif ($form_8->status == 1) : ?>
                                        <span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i> Disetujui</span>
                                    <?php else : ?>
                                        <span class="badge badge-pill badge-secondary"><i class="fas fa-times-circle"></i> Tidak Disetujui</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= site_url('form_14/show/' . $form_14->id_form_14); ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    else :
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum Ada Data!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?= $pagination; ?>
    </div>
</div>