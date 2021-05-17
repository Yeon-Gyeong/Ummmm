<?php echo form_open(current_url()); ?>

이메일주소<input type="text" id="email" name="email" value="<?php echo set_value('email');?>">
이름<input type="text" id="username" name="username" value="<?php echo set_value('username')?>">
<button type="submit">아이디찾기</button>
<?php echo form_close(); ?>


<?php
 	if(!empty($view['userid'])){
 		if($view['userid'] != 'empty'){
			echo $view['userid'];
?>
			<a href="/login">로그인</a>
			<a href="/login/forgot_pw">비밀번호찾기</a>
 <?php }else{ ?>
 			회원정보가 존재하지 않습니다.
 			<a href="/register">회원가입</a>
 			<a href="<?php echo site_url()?>">메인화면으로</a>
 <?php } 
	} 
?>