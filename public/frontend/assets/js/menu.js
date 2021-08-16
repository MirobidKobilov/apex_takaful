const 	menuBtn = document.querySelector('#right-menu'),
		sidebarBox = document.querySelector('#Rmenu-content'),
		sidebarBtn = document.querySelector('#exit-x'),
		pageWrapper = document.querySelector('body'),
		fadeBg = document.querySelector('#fade-bg');

menuBtn.addEventListener('click', event => {
	event.preventDefault();
	sidebarBox.classList.add('show');
	fadeBg.classList.add('show');
})

sidebarBtn.addEventListener('click', event => {
		sidebarBox.classList.toggle('show');
		fadeBg.classList.toggle('show');
});

fadeBg.addEventListener('click', event => {
	sidebarBox.classList.remove('show')
	fadeBg.classList.remove('show')
})
