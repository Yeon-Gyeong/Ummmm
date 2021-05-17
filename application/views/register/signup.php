<script src="/assets/js/signup.js"></script>

<?php 
	$attr = array('id'=>'register_form');
	echo form_open(current_url(), $attr); 
?>

<input type="hidden" name="siteurl" value="<?php echo site_url();?>">

아이디<input type="text" name="userid" id="userid" value="<?php echo set_value('userid');?>" placeholder="4자 이상 숫자/문자">
<button type="button" id="checkid">아이디중복확인</button>
비밀번호<input type="password" name="userpw" id="userpw" value="<?php echo set_value('userpw');?>" placeholder="8자 이상 숫자/문자">
비밀번호확인<input type="password" name="repass" id="repass" value="<?php echo set_value('repass');?>">
이름<input type="text" name="username" id="username" value="<?php echo set_value('username');?>">
이메일주소<input type="text" name="email" id="email" value="<?php echo set_value('email');?>">


<button type="button" id="register">회원가입</button>
<button type="button">취소</button>

<?php echo form_close(); ?>
