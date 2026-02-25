/**
 * demo-ama.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2017, Codrops
 * http://www.codrops.com
 */
const fancymenu = document.querySelector('.fancy_menu'); 

var menutype = fancymenu.dataset.menutype;

if(menutype == 'menu_design2'){
	
}else if(menutype == 'menu_design3'){

}else if(menutype == 'menu_design4'){


}else if(menutype == 'menu_design5'){
	
	{
		const items = Array.from(document.querySelectorAll('.menu_design5 .menu_item'));
	
		class Item {
			constructor(el) {
				this.DOM = {};
				this.DOM.el = el;
				this.DOM.label = el.querySelector('.menu_item_label');
				this.colors = {
					active: window.getComputedStyle(this.DOM.el).getPropertyValue('--menu-item-color')
				};
				charming(this.DOM.label);
				this.DOM.labelLetters = Array.from(this.DOM.label.querySelectorAll('span'));
				this.colors.initial = window.getComputedStyle(this.DOM.labelLetters[0]).color;
				this.initEvents();
			}
			initEvents() {
				this.mouseenterFn = () => this.mouseTimeout = setTimeout(() => {
					this.isActive = true;
					anime.remove(this.DOM.labelLetters);
					anime({
						targets: this.DOM.labelLetters,
						delay: (t,i) => i*7,
						translateY: [
							{value: 10, duration: 150, easing: 'easeInQuad'},
							{value: [-10,0], duration: 150, easing: 'easeOutQuad'}
						],
						opacity: [
							{value: 0, duration: 150, easing: 'linear'},
							{value: 1, duration: 150, easing: 'linear'}
						],
						color: {
							value: this.colors.active,
							duration: 1,
							delay: (t,i,l) => i*7+150
						}
					});
				}, 50);
	
				this.mouseleaveFn = () => {
					clearTimeout(this.mouseTimeout);
					if( !this.isActive ) return;
					this.isActive = false;
	
					anime.remove(this.DOM.labelLetters);
					anime({
						targets: this.DOM.labelLetters,
						delay: (t,i,l) => (l-i-1)*7,
						translateY: [
							{value: 10, duration: 150, easing: 'easeInQuad'},
							{value: [-10,0], duration: 150, easing: 'easeOutQuad'}
						],
						opacity: [
							{value: 0, duration: 150, easing: 'linear'},
							{value: 1, duration: 150, easing: 'linear'}
						],
						color: {
							value: this.colors.initial,
							duration: 1,
							delay: (t,i,l) => (l-i-1)*7+150
						}
					});
				};
	
				this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);
				this.DOM.el.addEventListener('touchstart', this.mouseenterFn);
				this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);
				this.DOM.el.addEventListener('touchend', this.mouseleaveFn);
			}
		};
	
		items.forEach(item => new Item(item));
	};	


}else if(menutype == 'menu_design6'){
	
	{
		const shuffleArray = (arr) => arr.sort(() => (Math.random() - 0.5));
		const items = Array.from(document.querySelectorAll('.menu_design6 .menu_item'));
	
		class Item {
			constructor(el) {
				this.DOM = {};
				this.DOM.el = el;
				this.DOM.label = el.querySelector('.menu_item_label');
				charming(this.DOM.label);
				this.DOM.labelLetters = Array.from(this.DOM.label.querySelectorAll('span'));
				this.initEvents();
			}
			initEvents() {
				this.mouseenterFn = () => this.mouseTimeout = setTimeout(() => {
					this.isActive = true;
					anime.remove(this.DOM.labelLetters);
					anime({
						targets: shuffleArray(this.DOM.labelLetters),
						duration: 20,
						delay: (t,i) => (i+5)*30,
						easing: 'linear',
						opacity: [0,1]
					});	
				}, 50);
	
				this.mouseleaveFn = () => {
					clearTimeout(this.mouseTimeout);
					if( !this.isActive ) return;
					this.isActive = false;
				};
	
				this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);
				this.DOM.el.addEventListener('touchstart', this.mouseenterFn);
				this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);
				this.DOM.el.addEventListener('touchend', this.mouseleaveFn);
			}
		};
	
		items.forEach(item => new Item(item));
	};


}else if(menutype == 'menu_design7'){
	
	
	{
	const items = Array.from(document.querySelectorAll('.menu_design7 .menu_item'));

	class Item {
		constructor(el) {
			this.DOM = {};
			this.DOM.el = el;
			this.DOM.name = el.querySelector('.menu_item_name');
			charming(this.DOM.name);
			this.DOM.nameLetters = Array.from(this.DOM.name.querySelectorAll('span'));
			this.initEvents();
		}
		initEvents() {
			this.mouseenterFn = () => this.mouseTimeout = setTimeout(() => {
				this.isActive = true;
				anime.remove(this.DOM.nameLetters);
				anime({
					targets: this.DOM.nameLetters,
					duration: 800,
					easing: [0.7,0,0.3,1],
					scale: (t,i) => [1,anime.random(0,1) ? 0.8:1.4],
					translateX: (t,i) => {
						const elBounds = this.DOM.el.getBoundingClientRect();
						const x1 = elBounds.left + elBounds.width/2;
						const y1 = elBounds.top + elBounds.height/2;
						
						const targetBounds = t.getBoundingClientRect();
						const x2 = targetBounds.left + targetBounds.width/2;
						const y2 = targetBounds.top + targetBounds.height/2;

						const dist = Math.sqrt(Math.pow(x2-x1,2) + Math.pow(y2-y1,2));
						const maxDist = Math.sqrt(Math.pow(elBounds.left-x1,2) + Math.pow(elBounds.top-y1,2));
						const maxTX = x2<x1?-250:250;

						return maxTX/maxDist*dist;
					},
					translateY: (t,i) => [0,anime.random(-40,40)],
					rotateZ: (t,i) => [0,anime.random(-20,20)],
					opacity: (t,i) => 0.3,
				});	
			}, 50);

			this.mouseleaveFn = () => {
				clearTimeout(this.mouseTimeout);
				if( !this.isActive ) return;
				this.isActive = false;
				anime.remove(this.DOM.nameLetters);
				anime({
					targets: this.DOM.nameLetters,
					duration: 800,
					easing: [0.7,0,0.3,1],
					scale: 1,
					translateX: 0,
					translateY: 0,
					rotateZ: 0,
					opacity: 1
				});
			};

			this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);
			this.DOM.el.addEventListener('touchstart', this.mouseenterFn);
			this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);
			this.DOM.el.addEventListener('touchend', this.mouseleaveFn);
		}
	};

	items.forEach(item => new Item(item));
};


}else if(menutype == 'menu_design8'){
	
	{
		const items = Array.from(document.querySelectorAll('.menu_design8 .menu_item'));
	
		class Item {
			constructor(el) {
				this.DOM = {};
				this.DOM.el = el;
				this.DOM.label = el.querySelector('.menu_item_label');
				charming(this.DOM.label);
				this.DOM.labelLetters = Array.from(this.DOM.label.querySelectorAll('span'));
				this.initEvents();
			}
			initEvents() {
				this.mouseenterFn = () => this.mouseTimeout = setTimeout(() => {
					this.isActive = true;
					anime.remove(this.DOM.labelLetters);
					anime({
						targets: this.DOM.labelLetters,
						duration: 20,
						delay: (t,i) => (i+5)*30,
						easing: 'linear',
						opacity: [0,1]
					});	
				}, 50);
	
				this.mouseleaveFn = () => {
					clearTimeout(this.mouseTimeout);
					if( !this.isActive ) return;
					this.isActive = false;
				};
	
				this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);
				this.DOM.el.addEventListener('touchstart', this.mouseenterFn);
				this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);
				this.DOM.el.addEventListener('touchend', this.mouseleaveFn);
			}
		};
	
		items.forEach(item => new Item(item));
	};


}else if(menutype == 'menu_design9' || menutype == 'menu_design10'){

	{
		const items = Array.from(document.querySelectorAll('.menu_design9 .menu_item, .menu_design10 .menu_item'));
	
		class Item {
			constructor(el) {
				this.DOM = {};
				this.DOM.el = el;
				this.DOM.name = el.querySelector('.menu_item_name');
				this.colors = {
					active: window.getComputedStyle(this.DOM.el).getPropertyValue('--menu-item-color')
				};
				charming(this.DOM.name);
				this.DOM.nameLetters = Array.from(this.DOM.name.querySelectorAll('span'));
				this.colors.initial = window.getComputedStyle(this.DOM.nameLetters[0]).color;
				this.initEvents();
			}
			initEvents() {
				const duration = 150;
	
				this.mouseenterFn = () => this.mouseTimeout = setTimeout(() => {
					this.isActive = true;
					anime.remove(this.DOM.nameLetters);
					anime({
						targets: this.DOM.nameLetters,
						delay: (t,i) => i*20,
						translateY: [
							{value: (t,i) => i%2===0?10:-10, duration: duration, easing: 'easeInSine'},
							{value: (t,i) => i%2===0?[-10,0]:[10,0], duration: duration+700, easing: 'easeOutElastic', elasticity: 600}
						],
						opacity: [
							{value: 0, duration: duration, easing: 'linear'},
							{value: 1, duration: duration, easing: 'linear'}
						],
						color: {
							value: this.colors.active, 
							duration: 1,
							delay:(t,i) => i*20+duration, 
							easing: 'linear'
						}
					});
				}, 50);
	
				this.mouseleaveFn = () => {
					clearTimeout(this.mouseTimeout);
					if( !this.isActive ) return;
					this.isActive = false;
	
					anime.remove(this.DOM.nameLetters);
					anime({
						targets: this.DOM.nameLetters,
						delay: (t,i,l) => (l-i-1)*20,
						translateY: [
							{value: (t,i) => i%2===0?-10:10, duration: duration, easing: 'easeInSine'},
							{value: (t,i) => i%2===0?[10,0]:[-10,0], duration: duration+700, easing: 'easeOutElastic', elasticity: 600}
						],
						opacity: [
							{value: 0, duration: duration, easing: 'linear'},
							{value: 1, duration: duration, easing: 'linear'}
						],
						color: {
							value: this.colors.initial, 
							duration: 1,
							delay:(t,i,l) => (l-i-1)*20+duration, 
							easing: 'linear'
						}
					});
				};
	
				this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);
				this.DOM.el.addEventListener('touchstart', this.mouseenterFn);
				this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);
				this.DOM.el.addEventListener('touchend', this.mouseleaveFn);
			}
		};
	
		items.forEach(item => new Item(item));
	};

}
 