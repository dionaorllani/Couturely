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

let mainImage = document.querySelector('.update-product .image-container .main-image img');
let subImages = document.querySelectorAll('.update-product .image-container .sub-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      mainImage.src = src;
   }
});

function validateAdminForm() {
   const nameRegex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
   const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
   const nameInput = document.forms[0]["name"].value;
   const passInput = document.forms[0]["pass"].value;
   const cpassInput = document.forms[0]["cpass"].value;

   if (!nameRegex.test(nameInput)) {
     alert("Please enter a valid name");
     return false;
   }

   if (!passRegex.test(passInput)) {
     alert("Please enter a valid password (must contain at least 8 characters, including at least one lowercase letter, one uppercase letter, and one number)");
     return false;
   }

   if (passInput !== cpassInput) {
     alert("Passwords do not match");
     return false;
   }

   return true;
 }

 function validateUpdateForm() {
   var name = document.forms[0]["name"].value;
   var newPass = document.forms[0]["new_pass"].value;
   var confirmPass = document.forms[0]["confirm_pass"].value;
 
   var nameRegex = /^[a-zA-Z0-9]+$/;
   var passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
 
   if (!nameRegex.test(name)) {
     alert("Invalid username. Only alphanumeric characters are allowed.");
     return false;
   }
 
   if (newPass != "" && !passRegex.test(newPass)) {
     alert("Invalid new password. Password must contain at least 8 characters, including at least one number, one lowercase letter, and one uppercase letter.");
     return false;
   }
 
   if (newPass != confirmPass) {
     alert("New password and confirmation password do not match.");
     return false;
   }
 
   return true;
 }