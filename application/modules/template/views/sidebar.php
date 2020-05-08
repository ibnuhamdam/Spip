<?php $role ?>
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item <?= $hal == 'dashboard' ? 'selected' : ''; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'dashboard' ? 'active' : ''; ?>" href="<?= site_url('dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <?php if ($role == 'Admin') : ?>
                    <!-- Data Master -->
                    <h6 class="mt-3 ml-3 text-white">Data Master</h6>
                    <li class="sidebar-item <?= $hal == 'user' ? 'selected' : ''; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'user' ? 'active' : ''; ?>" href="<?= site_url('user'); ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User</span></a></li>
                    
                    <li class="sidebar-item <?= ($hal == 'ppk' or $hal == 'detail_ppk') ? 'selected' : ''; ?>"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-google-circles-extended"></i><span class="hide-menu">Manajemen PPK </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?= site_url('detail_ppk'); ?>" class="sidebar-link <?= $hal == 'detail_ppk' ? 'active' : ''; ?>"><i class="mdi mdi-plus-circle"></i><span class="hide-menu"> Tambah Keanggotaan </span></a></li>
                            <li class="sidebar-item"><a href="<?= site_url('ppk'); ?>" class="sidebar-link <?= $hal == 'ppk' ? 'active' : ''; ?>"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu"> PPK </span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <!-- Data Transaksi -->
                <h6 class="mt-3 ml-3 text-white">Data Transaksi</h6>
                <?php if ($role == 'Admin' or $role == 'PPK') : ?>
                    <li class="sidebar-item <?= ($hal == 'form_8' or $hal == 'form_11' or $hal == 'form_14' or $hal == 'form_17' or $hal == 'form_22' or $hal == 'detail_form_8' or $hal == 'detail_form_14' or $hal == 'detail_form_17' or $hal == 'detail_form_22') ? 'selected' : ''; ?>"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-document"></i><span class="hide-menu">Form </span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <!-- Form 8 -->
                            <li class="sidebar-item"><a href="<?= site_url('form_8'); ?>" class="sidebar-link <?= ($hal == 'form_8' or $hal == 'detail_form_8') ? 'active' : ''; ?>"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu"> Form 8 </span></a></li>
                            <?php if ($role == 'Admin') : ?>
                                <!-- Form 11 -->
                                <li class="sidebar-item"><a href="<?= site_url('form_11'); ?>" class="sidebar-link <?= ($hal == 'form_11' or $hal == 'detail_form_11') ? 'active' : ''; ?>"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu"> Form 11 </span></a></li>
                            <?php endif; ?>
                            <!-- Form 14 -->
                            <li class="sidebar-item"><a href="<?= site_url('form_14'); ?>" class="sidebar-link <?= ($hal == 'form_14' or $hal == 'detail_form_14') ? 'active' : ''; ?>"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu"> Form 14 </span></a></li>
                            <!-- Form 17 -->
                            <li class="sidebar-item"><a href="<?= site_url('form_17'); ?>" class="sidebar-link <?= ($hal == 'form_17' or $hal == 'detail_form_17') ? 'active' : ''; ?>"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu"> Form 17 </span></a></li>
                            <!-- Form 22 -->
                            <li class="sidebar-item"><a href="<?= site_url('form_22'); ?>" class="sidebar-link <?= ($hal == 'form_22' or $hal == 'detail_form_22') ? 'active' : ''; ?>"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu"> Form 22 </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item <?= $hal == 'peta' ? 'selected' : ''; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'peta' ? 'active' : ''; ?>" href="<?= site_url('peta'); ?>" aria-expanded="false"><i class="mdi mdi-map"></i><span class="hide-menu">Peta Risiko</span></a></li>
                <?php endif; ?>
                <?php if ($role == 'UKI') : ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= site_url('form_11'); ?>" aria-expanded="false"><i class="mdi mdi-file-document"></i><span class="hide-menu">Form 11</span></a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->