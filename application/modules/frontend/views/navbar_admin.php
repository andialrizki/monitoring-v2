<?php $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin'); ?>
<?php if ($type_admin == 0): //pangkalan | superadmin?>
  <li class="site-menu-item <?php echo ($active == 'admin')?'active':''; ?>">
    <a class="animsition-link" href="<?php echo site_url('manage-admin') ?>">
      <i class="site-menu-icon md-account" aria-hidden="true"></i>
      <span class="site-menu-title">Kelola Pengguna</span>
    </a>
  </li>
<?php elseif ($type_admin == 1): ?>
  <li class="site-menu-item <?php echo ($active == 'admin')?'active':''; ?>">
    <a class="animsition-link" href="<?php echo site_url('manage-admin') ?>">
      <i class="site-menu-icon md-account" aria-hidden="true"></i>
      <span class="site-menu-title">Kelola Pengguna</span>
    </a>
  </li>
<?php endif; ?>
<?php if ($type_admin == 0 || $type_admin == 1): ?>
  <li class="site-menu-item has-sub <?php echo ($active == 'penataan-agen' || $active == 'penataan-jarak') ? 'active' : ''; ?>">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-book" aria-hidden="true"></i>
      <span class="site-menu-title">Penataan</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      <li class="site-menu-item <?php echo ($active == 'penataan-agen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('penataan-agen'); ?>">
          <span class="site-menu-title">Jarak SPBBE - Agen</span>
        </a>
      </li>
      <li class="site-menu-item <?php echo ($active == 'penataan-jarak') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('penataan-jarak'); ?>">
          <span class="site-menu-title">Penataan Jarak</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="site-menu-item has-sub <?php echo ($active == 'pelanggan' || $active == 'pangkalan' || $active == 'agen' || $active == 'spbe') ? 'active' : ''; ?>">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
      <span class="site-menu-title">Rekap Data</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      <li class="site-menu-item <?php echo ($active == 'pelanggan') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('pelanggan'); ?>">
          <span class="site-menu-title">Data Pelangan</span>
        </a>
      </li>
      <li class="site-menu-item <?php echo ($active == 'pangkalan') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('pangkalan'); ?>">
          <span class="site-menu-title">Data Pangkalan</span>
        </a>
      </li>
      <li class="site-menu-item <?php echo ($active == 'agen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('agen'); ?>">
          <span class="site-menu-title">Data Agen</span>
        </a>
      </li>

      <li class="site-menu-item <?php echo ($active == 'spbe') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('spbe'); ?>">
          <span class="site-menu-title">Data SPBE</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="site-menu-item has-sub <?php echo ($active == 'transaksi' || $active == 'realisasi_agen' || $active == 'realisasi_spbe') ? 'active' : ''; ?>">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
      <span class="site-menu-title">Rekap Transaksi</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      <li class="site-menu-item <?php echo ($active == 'transaksi') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('transaksi'); ?>">
          <span class="site-menu-title">Pelanggan</span>
        </a>
      </li>
      <li class="site-menu-item <?php echo ($active == 'realisasi_agen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('realisasi-agen'); ?>">
          <span class="site-menu-title">Agen</span>
        </a>
      </li>
      <li class="site-menu-item <?php echo ($active == 'realisasi_spbe') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('realisasi-spbe'); ?>">
          <span class="site-menu-title">SPBU</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="site-menu-item has-sub <?php echo ($active == 'lokasi-pelanggan' || $active == 'lokasi-pangkalan' || $active == 'lokasi-agen' || $active == 'lokasi-spbe') ? 'active' : ''; ?>">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-google-maps" aria-hidden="true"></i>
      <span class="site-menu-title">Lokasi</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      <li class="site-menu-item <?php echo ($active == 'lokasi-pelanggan') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('lokasi-pelanggan'); ?>">
          <span class="site-menu-title">Pelanggan</span>
        </a>
      </li>
      <li class="site-menu-item <?php echo ($active == 'lokasi-pangkalan') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('lokasi-pangkalan'); ?>">
          <span class="site-menu-title">Pangkalan</span>
        </a>
      </li>
      <li class="site-menu-item <?php echo ($active == 'lokasi-agen') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('lokasi-agen'); ?>">
          <span class="site-menu-title">Agen</span>
        </a>
      </li>

      <li class="site-menu-item <?php echo ($active == 'lokasi-spbe') ? 'active' : ''; ?>">
        <a class="animsition-link" href="<?php echo site_url('lokasi-spbe'); ?>">
          <span class="site-menu-title">SPBE</span>
        </a>
      </li>
    </ul>
  </li>
<?php endif; ?>