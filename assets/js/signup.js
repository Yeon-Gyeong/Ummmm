var check = false;

$(document).ready(function(){

	var siteurl = $("#siteurl").val();
	//약관동의 
	$("#agree").click(function(){
		//체크 검사

		location.href = "/register/signup";
	});

	//아이디 중복확인
	$("#checkid").click(function(){
		check = true;
		var csrf_hash = $('input[name="csrf_token"]').val();

		var userid = $.trim($("#userid").val());
		if(userid.length > 3){
			$.ajax({
				type:"post",
				data:{userid:userid,
					  csrf_token:csrf_hash},
				url:"/register/check_id",
				success:function(data){

					if(data >0){
						alert("사용중인 아이디입니다.");
						check = false;
					}else{
						alert("사용할 수 있는 아이디입니다.");
						check = true;

					}

				}

			});
		}else{
			alert("아이디를 4자이상 입력하세요.");
			check = false;
		}


	});

	//회원가입 버튼 클릭시 폼전송
	$("#register").click(function(){
	
		if(check_it()){
			if(check != false){
				$("#register_form").submit();
			}
		}

	});



});


//입력값 체크
function check_it(){

	var userid = $("#userid").val();
	var userpw = $("#userpw").val();
	var repass = $("#repass").val();
	var username = $("#username").val();
	var email = $("#email").val();

	if(($.trim(userid)).length <4){
		alert("아이디는 4자 이상 입력하세요.");
		return false;
	}
	if(($.trim(userpw)).length <8){
		alert("비밀번호는 8자 이상 입력하세요.");
		return false;
	}
	if($.trim(repass) == ""){
		alert("비밀번호확인을 입력하세요.");
		return false;
	}
	if(userpw != repass){
		alert("비밀번호를 동일하게 입력하세요.");
		return false;
	}
	if($.trim(username) == ""){
		alert("이름을 입력하세요.");
		return false;
	}
	if($.trim(email) == ""){
		alert("이메일주소를 입력하세요.");
		return false;
	}

	return true;


}