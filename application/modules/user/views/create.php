<div class="row">
    <div class="card col-lg-6 mx-auto">
        <div class="card-body">
            <h4 class="card-title">Tambah User</h4>
            <?= form_open(''); ?>
            <div class="form-group mt-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                <?= form_error('email'); ?>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <?php
                $option[''] = '-- Pilih Role --';
                foreach ($role_data as $role) {
                    $option[$role->id_role] = $role->role;
                }
                echo form_dropdown('id_role', $option, set_value('id_role'), ['id' => 'id_role', 'class' => 'form-control']);
                echo form_error('id_role');
                ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>