<?php 

	function jenis_pembayaran($value)
	{
		if ($value == 1) {
			return '<label class="label label-success">Tunai</label>';
		} else {
			return '<label class="label label-primary">Transfer Tbank</label>';
		}
	}

?>