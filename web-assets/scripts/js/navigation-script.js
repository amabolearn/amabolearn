let deviceWidth = window.innerWidth;
console.log(deviceWidth)
const menuBtn = document.querySelector('.menu-toggle');
const activeElements = document.querySelectorAll('.active-element');
const mainNav = document.getElementById("main-nav");
let subjectLink = document.querySelector('.subject-link');
const subNav = document.getElementById("sub-nav");
const hamburger = document.querySelector(".menu-toggle i")

 for(i = 0; i < activeElements.length; i ++){
  activeElements[i].classList.add('neutral-style');
  subNav.classList.add('neutral-style');
 }
 menuBtn.addEventListener('click', () => {
  for(i = 0; i < activeElements.length; i ++)
   activeElements[i].classList.toggle('active');
   hamburger.classList.toggle('fa-times')
   
 });
 subjectLink.addEventListener('click', () => {
  subNav.classList.toggle('active');
 })
 console.log(subjectLink)
if(deviceWidth >= 1024){
 function prevDefAct(e){
  e.preventDefault();
 }
 subjectLink.setAttribute("href", "#");
 subjectLink.addEventListener('click', prevDefAct);
 
}
