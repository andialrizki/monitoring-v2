<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 5): //konsumen?>
    <li class="site-menu-item <?php echo ($active == 'konsumen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('konsumen/beli-lpg') ?>">
            <i class="site-menu-icon md-money" aria-hidden="true"></i>
            <span class="site-menu-title">Beli LPG</span>
        </a>
    </li>
    <li class="site-menu-item <?php echo ($active == 'konsumen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('konsumen/lokasi-pangkalan') ?>">
            <i class="site-menu-icon md-google-maps" aria-hidden="true"></i>
            <span class="site-menu-title">Lokasi Pangkalan</span>
        </a>
    </li>
<?php endif; ?>