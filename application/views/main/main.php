<!-- 메인비주얼&검색 -->
<section class="main-visual ani-visual">
	<div class="main-search-wrap a02 a-delay-4">
		<input type="text" class="main-search" id="main-search" placeholder="원하는 강의나 카테고리를 입력해주세요">
		<input type="button" class="btn-search" for="main-search" value="검색">
	</div>
</section><!-- main-visual e -->

<!-- 카테고리 리스트 -->
<section class="category-wrap">
	<div class="inner">
		<div class="main-title-box mat75">
			<p class="title-sub-text a02 a-delay-5">기초부터 실전까지 완벽한 강의 구성!</p>
			<h2 class="main-content-title mat20 a02 a-delay-6">모두의 클래스 <span class="orange bold">카테고리</span></h2>
		</div>
		<div class="category-list mat50 a02 a-delay-7">
			<a href="" class="category-item category01">
				디자인
			</a>
			<a href="" class="category-item category02">
				ITㆍ프로그래밍
			</a>
			<a href="" class="category-item category03">
				마케팅
			</a>
			<a href="" class="category-item category04">
				라이프
			</a>
			<a href="" class="category-item category05">
				자격증
			</a>
			<a href="" class="category-item category06">
				비즈니스컨설팅
			</a>
			<a href="" class="category-item category07">
				사진, 영상, 음향
			</a>
		</div>
	</div>
</section><!-- category-wrap e -->

<!-- 인기강의 -->
<section class="best-lecture sa sa-up">
	<div class="inner">
		<div class="main-title-box best-lecture-title mat100">
			<h2 class="main-content-title">모두의 클래스 <span class="red bold italic">BEST</span>&nbsp;&nbsp;<span class="orange bold">인기강의</span></h2>
		</div>
	</div>
</section><!-- best-lecture e -->

<script>
	// Scroll Animation (sa, 스크롤 애니메이션)
	const saTriggerMargin = 450;
	const saElementList = document.querySelectorAll('.sa');

	const saFunc = function() {
		for (const element of saElementList) {
			if (!element.classList.contains('show')) {
				if (window.innerHeight > element.getBoundingClientRect().top + saTriggerMargin) {
					element.classList.add('show');
				}
			}
		}
	}

	window.addEventListener('load', saFunc);
	window.addEventListener('scroll', saFunc);
</script>