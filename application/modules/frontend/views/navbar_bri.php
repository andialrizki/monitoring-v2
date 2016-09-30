<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 6): //bri?>
    <li class="site-menu-item <?php echo ($active == 'konsumen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('transaksi') ?>">
            <i class="site-menu-icon md-money" aria-hidden="true"></i>
            <span class="site-menu-title">Transaksi Pelanggan</span>
        </a>
    </li>
<?php endif; ?>