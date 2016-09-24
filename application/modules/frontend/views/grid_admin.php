<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 0 || $type_admin == 1): //pangkalan | superadmin?>
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
                    <a href="<?php echo site_url('manage-admin') ?>">
                        <i class="icon md-account"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('pelanggan'); ?>">
                        <i class="icon md-account-circle"></i>
                        <span>Data Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('pangkalan'); ?>">
                        <i class="icon md-account-box"></i>
                        <span>Data Pangkalan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('agen'); ?>">
                        <i class="icon md-accounts-list"></i>
                        <span>Data Agen</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('lokasi-agen'); ?>">
                        <i class="icon md-google-maps"></i>
                        <span>Lokasi Agen</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('lokasi-pelanggan'); ?>">
                        <i class="icon md-map"></i>
                        <span>Lokasi Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('lokasi-pangkalan'); ?>">
                        <i class="icon md-arrow-merge"></i>
                        <span>Lokasi Pangkalan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php endif; ?>