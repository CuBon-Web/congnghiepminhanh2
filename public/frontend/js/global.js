const io=new IntersectionObserver((e,t)=>{e.forEach(e=>{e.isIntersecting&&(e.target.src=e.target.dataset.src,e.target.classList.add("loaded"),t.unobserve(e.target))})}),bo=new IntersectionObserver((e,t)=>{e.forEach(e=>{if(e.isIntersecting){const r=e.target;r.style.backgroundImage=r.dataset.background,e.target.classList.add("loaded"),t.unobserve(e.target)}})});

document.addEventListener("DOMContentLoaded", function() {
	const arr = document.querySelectorAll('.lazy')
	arr.forEach((v) => {
		io.observe(v);
	})
	const arrBg = document.querySelectorAll('.lazy_bg')
	arrBg.forEach((v) => {
		bo.observe(v);
	})
})

const formSearch = document.getElementById('js-search-form');
const menuButton = document.getElementById('js-menu-toggle');
const m_login = document.getElementById('m_login');
const colLeft = document.getElementById('col-left-mew');
const bodyOverlay = document.getElementById('body_overlay');
const menu = document.getElementById('menu-mew');
const contactButton = document.getElementById('js-contact-toggle');
const m_mb_bar = document.getElementById('mb_bar');
const bodyM = document.getElementById('body_m');
let isMobile = window.matchMedia("(min-width: 992px)").matches;
let vW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

/*Quick Search*/
 if (formSearch){
 	formSearch.addEventListener('focusin', (event) => {
 		//event.target.parentNode.classList.add('active');
 		bodyOverlay.classList.add("d-none");
 	});
 	formSearch.addEventListener('focusout', (event) => {
 		window.setTimeout(function() { 
 			//event.target.parentNode.classList.remove('active');
 			document.querySelectorAll('.searchResult').forEach(el => el.classList.add('d-none'));
 		}, 200);
 	});
 }
/*Menu mobi*/
if (menuButton && colLeft){
	menuButton.addEventListener('click', (event) => {
		event.preventDefault();
		m_mb_bar.classList.remove("active");
		$('.mobile_open_box_swatch').removeClass('active');
		$('.sidebar_mobi').removeClass('openf');
		if (menuButton.classList.contains('active')){
			colLeft.classList.remove("active");
			menuButton.classList.remove("active");
			bodyOverlay.classList.add("d-none");
			document.querySelector('body').classList.remove("modal-open")
		} else{
			colLeft.classList.add("active");
			menuButton.classList.add("active");
			bodyOverlay.classList.remove("d-none");
			document.querySelector('body').classList.add("modal-open")
		}

	})
}
window.addEventListener('DOMContentLoaded', (event) => {
	let shouldSkip = false;
	document.querySelectorAll('#menu-mew .level0 .m_chill').forEach((item, index) => {
		if (shouldSkip) {
			return;
		}
		if (index >= 0) {
			shouldSkip = true;
		}
		item.parentNode.classList.add('open');
	});
	if (shouldSkip == true) {
		menu.classList.add('no_waring');
	}

	if( menu ){
		menu.addEventListener('click', event => {
			if (event.target.className.includes('js-submenu')) {
				let mn_x = document.querySelectorAll('#menu-mew > li');
				if (!mn_x.length) return;
				for (var i = 0; i < mn_x.length; i++) {
					mn_x[i].classList.remove('open');
				}
				event.target.parentNode.classList.add('open');
			}
		})
	}
});

/*Contact Button*/
if (contactButton){
	contactButton.addEventListener('click', (event) => {
		m_mb_bar.classList.toggle("active");
		colLeft.classList.remove("active");
		formSearch.classList.remove("open");
		menuButton.classList.remove("active");
		$('.mobile_open_box_swatch').removeClass('active');
		bodyOverlay.classList.add("d-none");
		document.querySelector('body').classList.remove('modal-open');
	})
}
/*Body Overlay*/
bodyOverlay.addEventListener('click', function(e){
	bodyOverlay.classList.add("d-none");
	formSearch.classList.remove("open");
	colLeft.classList.remove("active");
	document.querySelector('body').classList.remove('modal-open');
	menuButton.classList.remove('active');
	m_login.classList.remove("active");
	m_mb_bar.classList.remove("active");
	$('.mobile_open_box_swatch').removeClass('active');
	$('.sidebar_mobi').removeClass('openf');
	//animationMenu();
})

window.addEventListener('resize', throttle( function(){
	let vW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	if(vW > 991){
		bodyOverlay.classList.add("d-none");
		colLeft.classList.remove("active");
	}
}, 200));

/*Back to Top*/
var bg_top_mb = document.querySelector('.menubar');
var bg_head_mb = document.querySelector('.bg_head');
var goTopBtn = document.querySelector('.back_top');
var menufix = document.querySelector('.menufix');
var cateMenu = document.querySelector('.cate-menu'); 
// function trackScroll() {
// 	var scrolled = window.pageYOffset;
// 	var coords = document.documentElement.clientHeight/3;
	
	
// 	if (scrolled < 1) {
// 		bg_head_mb.classList.remove('min');
// 		bg_top_mb.classList.remove('min');
// 	}
// 	if (scrolled > coords) {
// 		goTopBtn.classList.add('back_show');
// 	}
// 	if (scrolled < coords) {
// 		goTopBtn.classList.remove('back_show');
// 	}
// }

// window.addEventListener('scroll', trackScroll);
function scrollToTop (duration) {
	if (document.scrollingElement.scrollTop === 0) return;
	
	const cosParameter = document.scrollingElement.scrollTop / 2;
	let scrollCount = 0, oldTimestamp = null;

	function step (newTimestamp) {
		if (oldTimestamp !== null) {
			scrollCount += Math.PI * (newTimestamp - oldTimestamp) / duration;
			if (scrollCount >= Math.PI) return document.scrollingElement.scrollTop = 0;
			document.scrollingElement.scrollTop = cosParameter + cosParameter * Math.cos(scrollCount);
		}
		oldTimestamp = newTimestamp;
		window.requestAnimationFrame(step);
	}
	window.requestAnimationFrame(step);
}

var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.createTemplateTagFirstArg=function(a){return a.raw=a};$jscomp.createTemplateTagFirstArgWithRaw=function(a,b){a.raw=b;return a};function checkElOverViewPort(a,b,c){b=a.parentNode.querySelector(":scope> "+b);null!==b&&(a.parentNode.getBoundingClientRect().right+b.clientWidth>vW?b.classList.add(c):b.classList.remove(c))};
window.addEventListener('resize', throttle( function(){
	vW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	isMobile = window.matchMedia("(min-width: 992px)").matches;
	isMobile && document.querySelectorAll('.js-checkMenu').forEach(item => {
		checkElOverViewPort(item, 'ul', 'sub-right');
	})}, 300)
					   )
document.addEventListener('readystatechange', function(e){
	document.readyState === 'complete' && isMobile && document.querySelectorAll('.js-checkMenu').forEach(item => {
		checkElOverViewPort(item, 'ul', 'sub-right')
	})
});
$(document).on('click', '.m_copy',function(e){
	e.preventDefault()
	var copyText = $(this).attr('data-copy');
	var copyTextarea = document.createElement('textarea');

	copyTextarea.textContent = copyText;
	document.body.appendChild(copyTextarea);
	copyTextarea.select();
	document.execCommand('copy'); 
	document.body.removeChild(copyTextarea);

	var cur_text = $(this).text();
	var $cur_btn = $(this);

	$(this).text('Đã lưu');

				 setTimeout(function(){
		$cur_btn.text(cur_text);
	},1000)
});

let isScrolling;
window.matchMedia("(max-width: 767px)").matches && window.addEventListener('scroll', function ( event ) {
	let mew_mobi_bar = document.querySelectorAll('.mew_mobi_bar');
	window.clearTimeout( isScrolling );
	mew_mobi_bar.forEach(item => {
		item.classList.add('hideOnScroll')
	});
	isScrolling = setTimeout(function() {
		mew_mobi_bar.forEach(item => {
			item.classList.remove('hideOnScroll')
		});
	}, 800);
}, false);

