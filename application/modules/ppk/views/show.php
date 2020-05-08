<div class="row">
    <div class="card col-lg-8 mx-auto">
        <div class="card-body">
            <h4 class="card-title"><?= $ppk->nama_ppk; ?></h4>
            <div class="flashdata" data-flashtitle="PPK" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail_data as $detail) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $detail->email; ?></td>
                                <td class="text-center">
                                    <?= form_open('detail_ppk/delete', '', ['id_user' => $detail->id_user, 'id_ppk' => $detail->id_ppk]); ?>
                                    <button type="submit" class="btn btn-danger delete"><i class="fas fa-trash"></i> Hapus</button>
                                    <?= form_close(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>