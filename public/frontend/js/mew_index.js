//window.addEventListener('DOMContentLoaded', (event) => {

let videos = document.querySelectorAll('.open_video');
let popupVideo = document.querySelector('.popup_video');
let close_vd = document.querySelectorAll('.close_video');
videos.forEach(v => v.addEventListener('click', function(e){
	e.preventDefault();
	popupVideo.classList.add('open');
	popupVideo.querySelector('.b_video').innerHTML  = `<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/${e.target.dataset.video}?enablejsapi=1" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>`
}));
close_vd.forEach(v => v.addEventListener('click', function(e){
	e.preventDefault();
	popupVideo.classList.remove('open');
	setTimeout(function(){
		popupVideo.querySelector('.b_video').innerHTML  = ``
	}, 500);
}));
let tabs = Array.from(document.getElementsByClassName('js-tab-product'));
tabs.forEach(tab => {
	tab.addEventListener('click', function(e){
		let _this = null;
		if(e.target.classList.contains('js-tab-title')){
			e.preventDefault();
			_this = e.target
		} else if(e.target.closest('.js-tab-title') !== null){
			e.preventDefault();
			_this = e.target.closest('.js-tab-title');
		}
		if(_this !== null){
			let tabContainer = _this.dataset.tab;
			let tabColAlias = _this.getAttribute('href');
			let tabWrapper = _this.closest('.js-tab-product').querySelectorAll(`.js-tab-content`);
			_this.closest('.js-tab-product').querySelectorAll(`.js-tab-title`).forEach(el => el.classList.remove('active'));
			_this.classList.add('active');
			tabWrapper.forEach(el => {
				el.classList.remove('d-block');
			});
			[...tabWrapper].filter(item => item.classList.contains(tabContainer)).forEach(el => {
				if(!el.classList.contains('loaded')){
					if(tabColAlias !== '/'){
						axios.get(`${tabColAlias}?view=tab`).then(res => res.request.response).then(res => {
							el.innerHTML = res;
							el.classList.add('loaded', 'd-block');
						}).then(() =>{
							el.querySelectorAll('.js-addToCart').forEach((addcart) => {addcart.addEventListener('click', addToCart)});
							el.querySelectorAll('.compare-checkbox').forEach((checkbox) => {
								checkbox.addEventListener('change', mewCompare.add);
							});
						});
					} else {
						el.classList.add('loaded', 'd-block');
					}
				} else {
					el.classList.add('loaded', 'd-block');
				}
			});
		}
	});
})


//});