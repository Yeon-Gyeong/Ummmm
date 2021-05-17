<script src="/assets/js/login.js"></script>
<?php echo form_open(current_url()); ?>

아이디<input type="text" id="userid" name="userid" value="<?php echo set_value("userid");?>">
비밀번호<input type="password" id="userpw" name="userpw" value="<?php echo set_value("userpw");?>">

<button type="submit">로그인</button>
<?php
    echo form_close();
?>

<a href="/login/forgot_id">아이디찾기</a>
<a href="/login/forgot_pw">비밀번호찾기</a>
<a href="/register">회원가입</a>
