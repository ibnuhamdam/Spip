<div class="card">
    <div class="card-body">
        <h4 class="card-title">My Profile</h4>
        <div class="row">
            <div class="col-lg-2">
                <img src="<?= base_url('assets/matriz1/'); ?>assets/images/users/1.jpg" alt="user" class="rounded-circle" width="90">
            </div>
            <div class="col-lg-8">
                <?= $this->session->userdata('id_user'); ?><br>
                <?= $this->session->userdata('email'); ?><br>
                <?= $this->session->userdata('role'); ?><br>
            </div>
        </div>
    </div>
</div>