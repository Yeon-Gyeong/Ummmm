<!DOCTYPE html>
<html>
<head>
    <title>모두의클래스</title>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/common.js"></script>
    <!-- css 초기화 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <!-- css -->
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/layout.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/animation.css">
</head>
<body>

<!-- header start -->
	<header class="a03 a-delay-3">
		<div class="top">
			<div class="inner">
				<!-- <p class="top-info">기초부터 심화까지 함께하는 모두의 클래스</p> -->
				<nav class="top-nav right">
					<ul class="top-nav__list">
						<?php if($this->session->userdata('cname')){ ?>
						<span class="member-name"><?php echo $this->session->userdata('cname');?> 님</span>
						<li class="top-nav__item">
						    <a href="/login/logout" class="top-nav__link">로그아웃</a>
						</li>
						<li class="top-nav__item">
						    <a href="" class="top-nav__link">장바구니</a>
						</li>
						<li class="top-nav__item">
						    <a href="/mypage" class="top-nav__link">마이페이지</a>
						</li>
						<?php }else{ ?>
						<li class="top-nav__item">
						    <a href="/login" class="top-nav__link">로그인</a>
						</li>
						<li class="top-nav__item">
						    <a href="/register" class="top-nav__link">회원가입</a>
						</li>
						<li class="top-nav__item">
						    <a href="" class="top-nav__link">고객센터</a>
						</li>
						<?php }?>
					</ul>
				</nav>
			</div>
		</div>
		<div class="gnb">
			<div class="inner">
				<h1 class="main-logo">
					<a href="" aria-label="homepage"><img src="/assets/images/common/main-logo.png" alt="모두의 클래스"></a>
				</h1>
				<div class="top-search-wrap">
					<input type="text" class="top-search" placeholder="검색어를 입력하세요">
					<input type="button" class="btn-top-search" for="main-search" value="검색">
				</div>
				<nav class="main-nav">
					<ul class="nav__list">
						<li class="nav__list-item">
							<a href="" class="nav__link">모두의 클래스</a>
						</li>
						<li class="nav__list-item">
							<a href="" class="nav__link">이벤트</a>
						</li>
						<li class="nav__list-item">
							<a href="" class="nav__link">고객센터</a>
						</li>
						<li class="nav__list-item">
							<a href="" class="nav__link">회사소개</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
<!-- header end -->


<!-- content start -->
	<main>
	    <?php if (isset($yield)) echo $yield;?>
	</main>
<!-- contetn end -->


<!-- footer start -->

<!-- footer end -->


	<script src="/assets/js/observers.js"></script>
</body>
</html>
