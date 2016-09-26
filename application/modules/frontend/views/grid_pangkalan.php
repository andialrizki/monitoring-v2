<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 2): //pangkalan?>
    <div>
        <div>
            <ul>
                <li>
                    <a href="<?php echo site_url('home') ?>">
                        <i class="icon md-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('transaksi') ?>">
                        <i class="icon md-money-box"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('pelanggan'); ?>">
                        <i class="icon md-account-circle"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('lokasi-pangkalan'); ?>">
                        <i class="icon md-google-maps"></i>
                        <span>Lokasi Pelanggan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php endif; ?>