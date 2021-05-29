<table>
	<tr>
		<th>순서</th>
		<th>아이디</th>
		<th>이름</th>
		<th>이메일주소</th>
		<th>회원등급</th>
		<th>가입일</th>
	</tr>
	<?php 
	$i=1;
	foreach(element('users', $view) as $user){?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $user['user_id'];?></td>
		<td><?php echo $user['user_name'];?></td>
		<td><?php echo $user['email'];?></td>
		<td><?php echo $user['level'];?></td>
		<td><?php echo $user['reg_date'];?></td>

	</tr>
<?php 
	$i++;
}?>

</table>