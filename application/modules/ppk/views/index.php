<div class="card">
    <div class="card-body">
        <h4 class="card-title">PPK List</h4>
        <div class="flashdata" data-flashtitle="PPK" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <a href="<?= site_url('ppk/create'); ?>" class="btn btn-info mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>PPK</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ppk_data as $ppk) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $ppk->nama_ppk; ?></td>
                            <td><?= $ppk->deskripsi; ?></td>
                            <td class="text-center">
                                <div class="btn-group-vertical">
                                    <a href="<?= site_url('ppk/show/' . $ppk->id_ppk); ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                    <a href="<?= site_url('ppk/edit/' . $ppk->id_ppk); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?= $pagination; ?>
    </div>
</div>