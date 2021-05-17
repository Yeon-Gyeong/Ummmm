
회원가입시 입력하신 이메일 주소로 임시비밀번호를 발송해 드립니다.

<?php echo form_open(current_url()); ?>

아이디 <input type="text" id="userid" name="userid" value="<?php echo set_value('userid');?>">
이메일주소 <input type="text" id="email" name="email" value="<?php echo set_value('email');?>">

<button type="submit">비밀번호 초기화</button>

<?php echo form_close();?>

<?php 
	if(!empty($view['result'])){
		if($view['result'] != 'false'){
?>
			이메일 전송 성공
			<a href="/login">로그인</a>
<?php			
		}else{
?>
			아이디 혹은 이메일주소를 확인하세요.
<?php			
		}
	}
?>