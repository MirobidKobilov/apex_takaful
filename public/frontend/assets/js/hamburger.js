const btn = document.querySelector('.hamburger'),
      content = document.querySelector('#hamburgerContent'),
      exitBtn = document.querySelector('#exit-y'),
      rightFade = document.querySelector('#right-fade');

 btn.addEventListener('click', event => {
    btn.classList.toggle('active');
    content.classList.toggle('active');
    rightFade.classList.toggle('show');
 })

 rightFade.addEventListener('click', event => {
	content.classList.remove('active');
	btn.classList.remove('active');
	rightFade.classList.remove('show');
});

exitBtn.addEventListener('click', event => {
   content.classList.remove('active');
   rightFade.classList.remove('show');
});