<div class="card">
    <div class="card-body">
        <h4 class="card-title">Detail Form 22</h4>
        <div class="flashdata" data-flashtitle="Form 22" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="align-middle">No.</th>
                        <th class="align-middle">Pernyataan Risiko</th>
                        <th class="align-middle">Penyebab</th>
                        <th class="align-middle">Pemantauan</th>
                        <th class="align-middle">Perbaikan Pemantauan</th>
                        <th class="align-middle">Waktu Pemantauan</th>
                        <th class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($detail_data) : ?>
                        <?php foreach ($detail_data as $detail) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $detail->pernyataan_risiko; ?></td>
                                <td><?= $detail->penyebab; ?></td>
                                <td><?= $detail->pemantauan; ?></td>
                                <td><?= $detail->perbaikan_pemantauan; ?></td>
                                <td><?= $detail->waktu_pemantauan; ?></td>
                                <td class="text-center" width="150px">
                                    <div class="btn-group-vertical">
                                        <a href="<?= site_url('detail_form_22/show/' . $detail->id_pernyataan); ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                        <?php if ($detail->pemantauan == NULL && $role == 'PPK') : ?>
                                            <a href="<?= site_url('detail_form_22/create/' . $id_form_22 . '/' . $detail->id_pernyataan); ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Input</a>
                                        <?php endif; ?>
                                        <?php if ($is_done == 0 && $role == 'PPK') : ?>
                                            <a href="<?= site_url('detail_form_22/edit/' . $detail->id_pernyataan); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
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
        <a href="<?= site_url('export/excel/form_22/').$id_form_22;?>" target="_blank"><button class="btn btn-success mb-3 ml-2"><i class="mdi mdi-download"></i> Download as excel file</button></a>
        <a href="<?= site_url('export/pdf/form_22/').$id_form_22;?>" target="_blank"><button class="btn btn-danger mb-3 ml-2"><i class="mdi mdi-download"></i> Download as pdf file</button></a>
        <div class="row mt-3">
            <div class="col-lg-2">
                <?php if ($is_done == 0 && $role == 'PPK') : ?>
                    <a href="<?= site_url('form_22/done/' . $id_form_22) ?>" class="btn btn-success"><i class="fas fa-save"></i> Selesai</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
</div>