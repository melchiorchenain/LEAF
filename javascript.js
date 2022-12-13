const signupBtn = document.querySelector(".signupBtn");
const loginBtn = document.querySelector(".loginBtn");
const moveBtn = document.querySelector(".moveBtn");
const signup = document.querySelector(".signup");
const login = document.querySelector(".login");
    
signupBtn.addEventListener("click",()=>{
    moveBtn.classList.add("rightBtn");
    signup.classList.add("signupForm")
    login.classList.remove("loginForm")
    moveBtn.innerHTML = "Sign Up";
})
loginBtn.addEventListener("click",()=>{
    moveBtn.classList.remove("rightBtn");
    signup.classList.remove("signupForm")
    login.classList.add("loginForm")
    moveBtn.innerHTML = "Login";
})
  