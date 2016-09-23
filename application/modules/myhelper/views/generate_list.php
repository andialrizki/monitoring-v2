<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" style="height:35px;">
	<?php if ($variable) : ?>
    <?php foreach ($variable as $key): ?>
        <option value="<?php echo $key->NIDN; ?>"><?php echo $key->nama; ?></option>
    <?php endforeach ?>
    <?php else : ?>
    	<option value="">Tidak ada daftar</option>
    <?php endif; ?>
</select>