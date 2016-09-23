<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" style="height:35px;">
    <?php if ($variable) : ?>
	<option value="" selected=""></option>
    <?php foreach ($variable as $key): ?>
        <option value="<?php echo $key->nama; ?>" <?php echo (trim($key->nama) == trim($current_name))?'selected':'' ?>>
            <?php echo $key->nama; ?>
        </option>
    <?php endforeach ?>
    <?php endif; ?>
</select>