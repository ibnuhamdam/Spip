<div class="row">
    <div class="card col-lg-6 mx-auto">
        <div class="card-body">
            <h4 class="card-title">Tambah keanggotaan PPK</h4>
            <?= form_open(''); ?>
            <div class="form-group mt-4">
                <label for="id_ppk">PPK</label>
                <?php
                $ppk_option[''] = '-- Pilih PPK --';
                foreach ($ppk_data as $ppk) {
                    $ppk_option[$ppk->id_ppk] = $ppk->nama_ppk;
                }
                echo form_dropdown('id_ppk', $ppk_option, set_value('id_ppk'), ['id' => 'id_ppk', 'class' => 'form-control']);
                echo form_error('id_ppk');
                ?>
            </div>
            <div class="form-group">
                <label for="deskripsi">User</label>
                <?php
                $user_option[''] = '-- Pilih User --';
                foreach ($user_data as $user) {
                    $user_option[$user->id_user] = $user->email;
                }
                echo form_dropdown('id_user', $user_option, set_value('id_user'), ['id' => 'id_user', 'class' => 'form-control']);
                echo form_error('id_user');
                ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Tambah</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>