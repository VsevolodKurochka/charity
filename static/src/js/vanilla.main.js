(function(){
	function log(content){
		console.log(content);
	}

	var hasClass = (element, cls) => (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;

	function addClass(element,cls){
		if( !hasClass(element, cls) ){
			let empty = '';
			if(element.classList.value != "") empty = ' ';
			element.className += empty + cls;
		}
	}

	function removeClass(element, cls){
		if( hasClass(element, cls) ) element.classList.remove(cls);
	}

	function toggleClass(element, cls){
		hasClass(element, cls) ? removeClass(element, cls) : addClass(element, cls);
	}

	var exists = element => typeof(element) != 'undefined' && element != null;

	class Navigation {
		constructor(){
			this.prefix = '';
			this.navigation = document.getElementById('js-navigation');
			this.menu = document.getElementById('js-navigation-menu');
			this.hamburger = document.getElementById('js-nav-hamburger');
			this.addition = document.getElementById('js-nav-addition');
			this.links = '.nav__menu-item-link';

			this.linksScroll();

			if(exists(this.navigation)) {
				this.navigationScroll();
			}

			if(exists(this.hamburger)) {
				this.hamburger.addEventListener( 'click', (e) => this.hamburgerClick(e) );
			}

			if(exists(this.addition)) {
				this.addition.addEventListener( 'click', (e) => this.additionClick(e) );
			}
		}

		checkScrollY() {
			window.scrollY > 0 ? addClass(this.navigation, 'nav_scrolled') : removeClass(this.navigation, 'nav_scrolled');
		}

		navigationScroll(){

			this.checkScrollY();
			window.addEventListener("scroll", ()	=> this.checkScrollY() );

		}

		hamburgerClick(el) {

			toggleClass(this.hamburger, 'active');
			toggleClass(this.menu, `nav__menu_active`);

		}

		additionClick(el) {

			toggleClass(this.addition, 'active');

		}

		linksScroll() {

			new SmoothScroll(this.links, {
				after: () => {
					removeClass(this.hamburger, 'active');
					removeClass(this.menu, `nav__menu_active`);
				}
			});

		}
	}

	document.addEventListener("DOMContentLoaded", function(){

		new Navigation();

	});
}());