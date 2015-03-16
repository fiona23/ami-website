<h2>This is the Register Page. </h2>
<?php echo validation_errors();?>
<?php echo form_open('register');?>

Name:<?php echo form_input('name');?><br />
Gender:
<?php
$options = array(
	'male'=>'I am a boy',
	'female'=>'I am a girl'
);
echo form_dropdown('gender',$options,'male');
?><br />
Email:<?php echo form_input('email');?><br />
Grade:<?php echo form_input('grade');?><br />
Apartment:<?php echo form_input('apartment');?><br />
Cellphone:<?php echo form_input('cellphone');?><br />
<input type='submit' name='submit' value='SUBMIT' />
</form>

