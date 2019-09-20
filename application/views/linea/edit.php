<?php echo form_open('linea_controller/edit/'.$linea['idLinea']); ?>

	<div>
		NombreLinea : 
		<input type="text" name="nombreLinea" value="<?php echo ($this->input->post('nombreLinea') ? $this->input->post('nombreLinea') : $linea['nombreLinea']); ?>" />
	</div>
	<div>
		AbreviLinea : 
		<input type="text" name="abreviLinea" value="<?php echo ($this->input->post('abreviLinea') ? $this->input->post('abreviLinea') : $linea['abreviLinea']); ?>" />
	</div>
	<div>
		ObsLinea : 
		<input type="text" name="obsLinea" value="<?php echo ($this->input->post('obsLinea') ? $this->input->post('obsLinea') : $linea['obsLinea']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>