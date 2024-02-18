function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var cpass = document.getElementById("cpass").value;
    
    var nameRegex = /^[a-zA-Z\s]*$/;
    if (!nameRegex.test(name)) {
       alert("Please enter a valid name.");
       return false;
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
       alert("Please enter a valid email address.");
       return false;
    }
    
    var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    if (!passRegex.test(pass)) {
       alert("Please enter a valid password (at least 8 characters, one uppercase letter, one lowercase letter, and one number).");
       return false;
    }
    
    if (cpass !== pass) {
       alert("Passwords do not match.");
       return false;
    }
    
    return true;
 }