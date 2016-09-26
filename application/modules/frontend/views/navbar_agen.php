<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 3): //agen?>
    <li class="site-menu-item has-sub <?php echo ($active == 'pangkalan' || $active == 'perubahan-pangkalan') ? 'active' : ''; ?>">
        <a href="javascript:void(0)">
            <i class="site-menu-icon md-book" aria-hidden="true"></i>
            <span class="site-menu-title">Data Pangkalan</span>
            <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
            <li class="site-menu-item <?php echo ($active == 'pangkalan') ? 'active' : ''; ?>">
                <a class="animsition-link" href="<?php echo site_url('pangkalan'); ?>">
                    <span class="site-menu-title">Pangkalan</span>
                </a>
            </li>
            <li class="site-menu-item <?php echo ($active == 'perubahan-pangkalan') ? 'active' : ''; ?>">
                <a class="animsition-link" href="<?php echo site_url('perubahan-pangkalan'); ?>">
                    <span class="site-menu-title">Pangkalan Perubahan</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="site-menu-item <?php echo ($active == 'transaksi-agen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('transaksi-agen') ?>">
            <i class="site-menu-icon md-money-box" aria-hidden="true"></i>
            <span class="site-menu-title">Rekapitulasi Transaksi</span>
        </a>
    </li>
    <li class="site-menu-item <?php echo ($active == 'lokasi-pangkalan') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('lokasi-pangkalan') ?>">
            <i class="site-menu-icon md-google-maps" aria-hidden="true"></i>
            <span class="site-menu-title">Lokasi Pangkalan</span>
        </a>
    </li>
<?php endif; ?>