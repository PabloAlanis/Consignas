<?php echo form_open('linea_controller/add'); ?>

	<div>
		NombreLinea : 
		<input type="text" name="nombreLinea" value="<?php echo $this->input->post('nombreLinea'); ?>" />
	</div>
	<div>
		AbreviLinea : 
		<input type="text" name="abreviLinea" value="<?php echo $this->input->post('abreviLinea'); ?>" />
	</div>
	<div>
		ObsLinea : 
		<input type="text" name="obsLinea" value="<?php echo $this->input->post('obsLinea'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>