<div class="card">
    <div class="card-body">
        <h4 class="card-title">Detail Form 14</h4>
        <div class="flashdata" data-flashtitle="Form 14" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="align-middle">No.</th>
                        <th class="align-middle">Pernyataan Risiko</th>
                        <th class="align-middle">Penyebab</th>
                        <th class="align-middle">Pengendalian yang Sudah Ada</th>
                        <th class="align-middle">Perbaikan Pengendalian</th>
                        <th class="align-middle text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($detail_data) : ?>
                        <?php foreach ($detail_data as $detail) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $detail->pernyataan_risiko; ?></td>
                                <td><?= $detail->penyebab; ?></td>
                                <td><?= $detail->pengendalian; ?></td>
                                <td><?= $detail->perbaikan_pengendalian; ?></td>
                                <td class="text-center" width="150px">
                                    <div class="btn-group-vertical">
                                        <a href="<?= site_url('detail_form_14/show/' . $detail->id_pernyataan); ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                        <?php if ($detail->pengendalian == NULL && $role == 'PPK') : ?>
                                            <a href="<?= site_url('detail_form_14/create/' . $id_form_14 . '/' . $detail->id_pernyataan); ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Input</a>
                                        <?php endif; ?>
                                        <?php if ($role == 'PPK' && $is_done == 0) : ?>
                                            <a href="<?= site_url('detail_form_14/edit/' . $detail->id_pernyataan); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                                        <?php endif; ?>
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
        <div class="row mt-3">
            <div class="col-lg-2">
                <?php if ($is_done == 0) : ?>
                    <a href="<?= site_url('form_14/done/' . $id_form_14) ?>" class="btn btn-success"><i class="fas fa-save"></i> Selesai</a>
                <?php endif; ?>
                <?php if ($form_17 == FALSE && $is_done == 1) : ?>
                    <a href="<?= site_url('form_17/create/' . $id_form_8) ?>" class="btn btn-info"><i class="fas fa-plus-circle"></i> Buat Form 17</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
</div>