<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">User List</h4>
        <div class="flashdata" data-flashtitle="User" data-flashmessage="<?= $this->session->flashdata('message'); ?>" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
        <a href="<?= site_url('user/create'); ?>" class="btn btn-info mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user_data as $user) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->role; ?></td>
                            <td class="text-center">
                                <?php if ($user->is_active == 0) : ?>
                                    <span class="badge badge-pill badge-secondary"><i class="fas fa-times-circle"></i> Tidak Aktif</span>
                                <?php else : ?>
                                    <span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i> Aktif</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group-vertical">
                                    <?php
                                    if ($user->is_active == 0) {
                                        echo form_open('user/on', '', ['id_user' => $user->id_user]);
                                        echo form_button(['type' => 'submit', 'content' => '<i class="fas fa-power-off"></i> Aktifkan', 'class' => 'btn btn-success confirm']);
                                        echo form_close();
                                    } else {
                                        echo form_open('user/off', '', ['id_user' => $user->id_user]);
                                        echo form_button(['type' => 'submit', 'content' => '<i class="fas fa-power-off"></i> Non-Aktifkan', 'class' => 'btn btn-danger confirm']);
                                        echo form_close();
                                    }
                                    ?>
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