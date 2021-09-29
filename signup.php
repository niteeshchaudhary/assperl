<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <meta name="TRUPEN" content="TRUPEN">

  <title>TRUPEN | SIGN UP Form</title>
  
<style>

.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}

.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}

.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
@import url("https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-shadow: border-box;
  font-family: "El Messiri", sans-serif;
}

body {
  background: #031323;
  overflow: hidden;
}

img {
  width: 32px;
}

section {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
  background-size: 400% 400%;
  animation: gradient 10s ease infinite;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
.box {
  position: relative;
}
.box .square {
  position: absolute;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(5px);
  box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 50%;
  animation: square 10s linear infinite;
  animation-delay: calc(-1s * var(--i));
}
@keyframes square {
  0%, 100% {
    transform: translateY(-20px);
  }
  50% {
    transform: translateY(20px);
  }
}
.box .square:nth-child(1) {
  width: 100px;
  height: 100px;
  background: linear-gradient(to right, rgba(200,0,200,0.5), rgba(255,0,255,0.5));
  top: -15px;
  right: -45px;
}
.box .square:nth-child(2) {
  width: 150px;
  height: 150px;
  //background: rgba(200, 100, 150, 0.5);
  background: linear-gradient(to right, rgba(200,50,200,0.4), rgba(100,100,255,0.1)); 
  top: 105px;
  left: -125px;
  z-index: 2;
}
.box .square:nth-child(3) {
  width: 60px;
  height: 60px;
  background: linear-gradient(to right, rgba(200,0,100,0.5), rgba(255,100,100,0.8));
  bottom: 85px;
  right: -45px;
  z-index: 2;
}
.box .square:nth-child(4) {
  width: 50px;
  height: 50px;
  background: linear-gradient(to right, rgba(200,100,200,0.5), rgba(255,200,100,0.4));
  bottom: 35px;
  left: -95px;
}
.box .square:nth-child(5) {
  width: 50px;
  height: 50px;
  background: linear-gradient(to right, rgba(100,255,250,0.4), rgba(205,200,200,0.5));
  top: -15px;
  left: -25px;
}
.box .square:nth-child(6) {
  width: 85px;
  height: 85px;
  background: linear-gradient(to right, rgba(200,0,0,0.1), rgba(210,200,180,0.5));
  top: 165px;
  right: -155px;
  z-index: 2;
}

.container {
  position: relative;
  padding: 50px;
  width: 260px;
  min-height: 380px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(5px);
  border-radius: 10px;
  box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
}

.container::after {
  content: "";
  position: absolute;
  top: 5px;
  right: 5px;
  bottom: 5px;
  left: 5px;
  border-radius: 5px;
  pointer-events: none;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 2%);
}

.form {
  position: relative;
  width: 100%;
  height: 100%;
}
.form h2 {
  color: #fff;
  letter-spacing: 2px;
  margin-bottom: 30px;
}
.form .inputBx {
  position: relative;
  width: 100%;
  margin-bottom: 20px;
}
.form .inputBx input {
  width: 80%;
  outline: none;
  border: none;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: rgba(255, 255, 255, 0.2);
  padding: 8px 10px;
  padding-left: 40px;
  border-radius: 15px;
  color: #fff;
  font-size: 16px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}
.form .inputBx .password-control {
  position: absolute;
  top: 11px;
  right: 10px;
  display: inline-block;
  width: 20px;
  height: 20px;
  background: url(view.svg) 0 0 no-repeat;
  transition: 0.5s;
}
.form .inputBx .view {
  background: url(no-view.svg) 0 0 no-repeat;
  transition: 0.5s;
}
.form .inputBx img {
  position: absolute;
  top: 6px;
  left: 8px;
  transform: scale(0.6);
  filter: invert(1);
}
.form .inputBx input[type=submit] {
  background: #fff;
  color: #111;
  max-width: 100px;
  padding: 8px 10px;
  box-shadow: none;
  letter-spacing: 1px;
  cursor: pointer;
  transition: 1.5s;
}
.form .inputBx input[type=submit]:hover {
  background: linear-gradient(115deg, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0.25));
  color: #fff;
  transition: 0.5s;
}
.form .inputBx input::placeholder {
  color: #fff;
}
.form .inputBx span {
  position: absolute;
  left: 30px;
  padding: 10px;
  display: inline-block;
  color: #fff;
  transition: 0.5s;
  pointer-events: none;
}
.form .inputBx input:focus ~ span,
.form .inputBx input:valid ~ span {
  transform: translateX(-30px) translateY(-25px);
  font-size: 12px;
}
.form p {
  color: #fff;
  font-size: 15px;
  margin-top: 5px;
}
.form p a {
  color: #fff;
}
.form p a:hover {
  background-color: #000;
  background-image: linear-gradient(to right, #434343 0%, black 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.remember {
  position: relative;
  display: inline-block;
  color: #fff;
  margin-bottom: 10px;
  cursor: pointer;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >

<div class="background">
   <div class="shape"></div>
   <div class="shape"></div>
</div>
  <section>
  
  <div class="box">
    
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
   <div class="container"> 
    <div class="form"> 
      <h2>Sign Up to TRUPEN</h2>
      <form method="POST" name="i-Drive" action="adduserEntry.php">
        <div class="inputBx">
          <input type="text" name="LoginID" id = "LoginID" required="required">
          <span>User ID</span>
          <img src="us.png" alt="user">
        </div>
        <div class="inputBx password">
          <input type="password" name="password" id = "password"  required="required">
          <span>Password</span>
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          <img src="ps.png" alt="key">
        </div>
        <div class="inputBx password">
          <input id="cpassword-input" type="password" name="cpassword" required="required">
          <span>Confirm Password</span>
          <img src="cps.png" alt="key">
        </div>
        <div class="inputBx">
          <input type="submit" value="Sign Up" id="submit"> 
        </div>
      </form>
      <p>Already have an Account <a href="Login.php">Sign IN</a></p>
    </div>
  </div>
    
  </div>
</section>

  <script id="rendered-js" >
    function show_hide_password(target) {
      var input = document.getElementById('password');
      if (input.getAttribute('type') == 'password') {
        target.classList.add('view');
        input.setAttribute('type', 'text');
      } else {
        target.classList.remove('view');
        input.setAttribute('type', 'password');
      }
      return false;
    }
function blink(c){
var s = document.getElementById(c);
s.classList.add("loginbuttonOff");
s.addEventListener("mouseleave", ()=>{
    s.classList.remove("loginbuttonOn");
    s.classList.add("loginbuttonOff");
});
s.addEventListener("mouseover", ()=>{
    s.classList.remove("loginbuttonOff");
    s.classList.add("loginbuttonOn");
});
}
blink("submit");
  </script>

  

</body>

</html>
 
