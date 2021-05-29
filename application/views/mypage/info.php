<?php echo form_open(current_url());?>

아이디<input type="text" name="userid" value="<?php echo $view['info']['user_id']?>" readonly>
비밀번호<input type="text" name="passwd" value="">
비밀번호확인<input type="text" name="repass" value="">
이름<input type="text" name="username" value="<?php echo $view['info']['user_name']?>">
이메일주소<input type="text" name="email" value="<?php echo $view['info']['email']?>">
<button type="button" id="editinfo">수정</button>

<?php echo form_close();?>
