<?php 

	function jenis_pembayaran($value)
	{
		if ($value == 1) {
			return '<label class="label label-success">Tunai</label>';
		} else {
			return '<label class="label label-primary">Transfer Tbank</label>';
		}
	}
	function loadingImg($text)
	{
		return '<img src="'.base_url().'assets/images/loader.gif" style="width:24px; 24px"> '.$text;
	}
	function loadingAjax($id='loading', $text='Mohon tunggu sebentar')
	{
		return '<div style="display:none" id="'.$id.'">'.loadingImg($text).'</div>';
	}
	function alertDarkSuccess($value='')
	{
		return '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <span class="alertDarkText">'.$value.'</span>
                </div>';
	}
	function alertDarkError($value='')
	{
		return '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <span class="alertDarkText">'.$value.'</span>
                </div>';
	}
?>