<script src="/assets/js/signup.js"></script>


<?php 
	$attr = array('id' => 'terms');
	echo form_open('/register/signup', $attr);
?>
<h3>서비스약관 동의</h3>




<button type="button" id="agree">동의</button>
<input type="hidden" id="siteurl" value="<?php echo site_url()?>">
<?php echo form_close();?>

