<li class="dropdown">
    <a class="btn btn-primary btn-lpg dropdown-toggle" data-toggle="dropdown" href="javascript:;">
      Data Pangkalan <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu">
	    <li class="<?php echo ($active == 'pangkalan')?'active':''; ?>">
			<a href="<?php echo site_url('pangkalan'); ?>">Pangkalan</a>
		</li>
		<li class="<?php echo ($active == 'perubahan-pangkalan')?'active':''; ?>">
			<a href="<?php echo site_url('perubahan-pangkalan'); ?>">Pangkalan Perubahan</a>
		</li>
    </ul>
</li>
<li class="<?php echo ($active == 'transaksi-agen')?'active':''; ?>">
	<a href="<?php echo site_url('transaksi-agen'); ?>">Rekapitulasi Transaksi</a>
</li>
<li class="<?php echo ($active == 'lokasi-pangkalan')?'active':''; ?>">
	<a href="<?php echo site_url('lokasi-pangkalan'); ?>">Lokasi Pangkalan</a>
</li>