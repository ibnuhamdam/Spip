<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">Detail Form 11</h4>
        <div class="flashdata" data-flashtitle="Form 11" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <?php if ($has_created == FALSE) : ?>
            <a href="<?= site_url('form_11/create/' . $id_form_8); ?>" class="btn btn-success mb-3"><i class="mdi mdi-pencil"></i> Input Skor</a>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pernyataan Risiko</th>
                        <th>Skor</th>
                        <th>Dampak</th>
                        <th>Skor</th>
                        <th width="100px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($detail_data) : ?>
                        <?php foreach ($detail_data as $detail) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $detail->pernyataan_risiko; ?></td>
                                <td class="text-center"><?= $detail->skor_risiko; ?></td>
                                <td><?= $detail->dampak; ?></td>
                                <td class="text-center"><?= $detail->skor_dampak; ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('form_11/edit/' . $detail->id_pernyataan); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>