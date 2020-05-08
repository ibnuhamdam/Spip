<?php
$hal = $this->uri->segment(1);
?>

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!-- chatjs -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/matriz1/'); ?>dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url('assets/matriz1/'); ?>dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('assets/matriz1/'); ?>dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<!-- <script src="<?= base_url('assets/matriz1/'); ?>assets/libs/flot/excanvas.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/flot/jquery.flot.time.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/flot/jquery.flot.stack.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="<?= base_url('assets/matriz1/'); ?>dist/js/pages/chart/chart-page-init.js"></script> -->
<!-- Toastr js -->
<script src="<?= base_url('assets/matriz1/'); ?>assets/libs/toastr/build/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/sweetalert/dist/sweetalert2.all.min.js'); ?>"></script>

<!-- Script Chartjs -->


<script>
    $(function() {
        let title = $(".flashdata").data("flashtitle");
        let type = $(".flashdata").data("flashtype");
        let message = $(".flashdata").data("flashmessage");
        if (type && message) {
            switch (type) {
                case "success":
                    toastr.success(message, title);
                    break;
                case "error":
                    toastr.error(message, title);
                    break;
            }
        }
        //
        $("input[type=radio][name=id_tahap_kegiatan]").on("change", function() {
            let value = $(this).val();
            if (value == "buat_baru") {
                $("#tahap_kegiatan").removeAttr("disabled");
            } else {
                $("#tahap_kegiatan").attr("disabled", "disabled").val("");
            }
        });
        // Hapus
        $(".delete").on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Apa Anda yakin?",
                text: "Data akan dihapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((willDelete) => {
                if (willDelete.value) {
                    this.form.submit();
                }
            });
        });
        // Konfirmasi
        $(".confirm").on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Apa Anda yakin?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((willDelete) => {
                if (willDelete.value) {
                    this.form.submit();
                }
            });
        });
    });
</script>

</body>

</html>