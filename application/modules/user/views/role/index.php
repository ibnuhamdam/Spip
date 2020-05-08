<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">Role List</h4>
        <a href="<?= site_url('role/create'); ?>" class="btn btn-info mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Role</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($role_data as $role) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $role->role; ?></td>
                            <!-- <td class="text-center">
                                <a href="<?= site_url('user/update/' . $user->id_user); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Update"><i class="fas fa-edit"></i></a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?= $pagination; ?>
    </div>
</div>