let navbar = document.querySelector('.header .flex .navbar');
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

//Quick View
let mainImage = document.querySelector('.quick-view .box .row .image-container .main-image img');
let subImages = document.querySelectorAll('.quick-view .box .row .image-container .sub-image img');

subImages.forEach(image => {
   image.onclick = () => {
      let src = image.getAttribute('src');
      mainImage.src = src;
   }
});

//Slider
var array = [
   'images/Banner1.jpg',
   'images/Banner2.jpg',
   'images/Banner3.jpg']
var index = 0;

function Slider(){
   document.getElementById('banner').src = array[index++];
   if(index == array.length){
       index = 0;
   }
   setTimeout("Slider()", 2000); 
}
Slider();
