const menuBars = document.querySelector('.menu-icon');
const menu = document.querySelector('.primary-navigation');
const bars = document.querySelectorAll('.bar');

menuBars.addEventListener('click', () => {
  menu.classList.toggle('render-links');
  
  bars.forEach((bar) => {
    bar.classList.toggle('bright')
  });
});