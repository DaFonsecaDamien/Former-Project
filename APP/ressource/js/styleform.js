const signUpButton = document.getElementById('signUpBtn');
const signInButton = document.getElementById('signInBtn');
const signUpLink = document.getElementById('signUpLink');
const signInLink = document.getElementById('signInLink');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
  container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
  container.classList.remove('right-panel-active');
});

signUpLink.addEventListener('click', () => {
  container.classList.add('right-panel-active');
});

signInLink.addEventListener('click', () => {
  container.classList.remove('right-panel-active');
});
