<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php
        if ($this->session->userdata('id_user') == "1") : ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/SPK-MFEP/Dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item <?php if ($page == 'Kriteria') {
                                    echo 'active';
                                } ?>">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Menu Kriteria</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('Kriteria'); ?>">
                        <i class="bi bi-circle"></i><span>Kriteria</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Sub_Kriteria'); ?>">
                        <i class="bi bi-circle"></i><span>Sub Kriteria</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Alternatif'); ?>">
                <i class="bi bi-person-lines-fill"></i>
                <span>Alternatif</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Penilaian'); ?>">
                <i class="bi bi-clipboard-check"></i>
                <span>Penilaian</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Perhitungan'); ?>">
                <i class="bi bi-calculator"></i>
                <span>Perhitungan</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Perhitungan/hasil'); ?>">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Hasil Akhir</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <?php if ($this->session->userdata('id_user_level') == '2') : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Perhitungan/hasil'); ?>">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Hasil Akhir</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <?php endif; ?>

        <li class="nav-heading">Lainnya</li>

        <?php if ($this->session->userdata('id_user') == '1') : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Profile'); ?>">
                <i class="bi bi-person"></i>
                <span>Profil</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <?php endif; ?>

        <li class="nav-item">
            <button type="submit" class="nav-link collapsed w-100 border-0" data-bs-toggle="modal"
                data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </button>

        </li><!-- End Login Page Nav -->

        <!-- <?php if ($this->session->userdata('id_user_level') == '1') : ?>
            <li class="nav-item <?php if ($page == 'User') {
                                    echo 'active';
                                } ?>">
            <a class="nav-link" href="<?= base_url('User'); ?>">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Data User</span></a>
            </li>
        <?php endif; ?> -->


    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">