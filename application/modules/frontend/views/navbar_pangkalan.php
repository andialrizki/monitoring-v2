<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 2): //pangkalan | superadmin?>
    <li class="site-menu-item <?php echo ($active == 'transaksi') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('transaksi') ?>">
            <i class="site-menu-icon md-money-box" aria-hidden="true"></i>
            <span class="site-menu-title">Transaksi</span>
        </a>
    </li>
    <li class="site-menu-item <?php echo ($active == 'pelanggan') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('pelanggan') ?>">
            <i class="site-menu-icon md-account" aria-hidden="true"></i>
            <span class="site-menu-title">Pelanggan</span>
        </a>
    </li>
    <li class="site-menu-item <?php echo ($active == 'lokasi-pelanggan') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('lokasi-pelanggan') ?>">
            <i class="site-menu-icon md-google-maps" aria-hidden="true"></i>
            <span class="site-menu-title">Lokasi Pelanggan</span>
        </a>
    </li>
<?php endif; ?>