<?php echo form_open(current_url());?>

아이디<input type="text" name="m_id" value="<?php echo set_value("m_id");?>">
비밀번호<input type="password" name="m_pw" value="<?php echo set_value("m_pw");?>">
<button type="submit">로그인</button>

<?php echo form_close();?>
