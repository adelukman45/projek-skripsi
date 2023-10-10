</main><!-- End #main -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah yakin ingin keluar?</h5>
                <button class="btn btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="text-light btn btn-warning" type="button" data-bs-dismiss="modal"><i
                        class="text-light bi bi-x-lg mr-1"></i>Batal</button>
                <a class="btn btn-danger" href="<?= site_url('Login/Logout'); ?>"><i
                        class="bi bi-box-arrow-right"></i>Keluar</a>
            </div>
        </div>
    </div>
</div>




<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; <strong><span><?php echo (int)date('Y'); ?></span></strong>.
    </div>
    <div class="credits">
        All Rights Reserved
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/') ?>/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('assets/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>/vendor/chart.js/chart.umd.js"></script>
<script src="<?= base_url('assets/') ?>/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url('assets/') ?>/vendor/quill/quill.min.js"></script>
<script src="<?= base_url('assets/') ?>/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url('assets/') ?>/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url('assets/') ?>/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/') ?>/js/main.js"></script>
<!-- <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->



</body>

</html>