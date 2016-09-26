<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 4): //spbe?>
    <li class="site-menu-item <?php echo ($active == 'agen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('agen') ?>">
            <i class="site-menu-icon md-account" aria-hidden="true"></i>
            <span class="site-menu-title">Data Agen</span>
        </a>
    </li>
    <li class="site-menu-item <?php echo ($active == 'lokasi-agen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('lokasi-agen') ?>">
            <i class="site-menu-icon md-google-maps" aria-hidden="true"></i>
            <span class="site-menu-title">Lokasi Agen</span>
        </a>
    </li>
<?php endif; ?>