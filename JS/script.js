
const signUpButton=document.getElementById('signupbutton');
const loginButton=document.getElementById('loginbutton');
const loginForm=document.getElementById('Login');
const signUpForm=document.getElementById('SignUp');
//adding an event listener on the signup button//
signUpButton.addEventListener('click',function(){
    loginForm.style.display="none";
    signUpForm.style.display="block";

})
//adding an event listener to the signIn button//
loginButton.addEventListener('click',function(){
    loginForm.style.display="block";
    signUpForm.style.display="none";
})