<li class="scroll <?php echo ($active == 'transaksi')?'active':''; ?>">
	<a href="<?php echo site_url('transaksi'); ?>">Transaksi</a>
</li> 
<li class="scroll <?php echo ($active == 'pelanggan')?'active':''; ?> hidden-sm">
	<a href="<?php echo site_url('pelanggan'); ?>">Pelanggan</a>
</li> 
<li class="<?php echo ($active == 'lokasi-pelanggan')?'active':''; ?>">
	<a href="<?php echo site_url('lokasi-pelanggan'); ?>">Lokasi Pelanggan</a>
</li>