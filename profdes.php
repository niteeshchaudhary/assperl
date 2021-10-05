<?php
  session_start();
  $con = new mysqli('localhost', 'root', NULL, 'trupendb');
  $qryst="select * from user where username='". $_SESSION["user"]."';";
  $result = $con->query($qryst);
  if ($result && $result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="inpcss.css">
	<style>
		.topdiv{
			background-color: lightpink;
			height: 140px;
			box-shadow: inset 2px 2px 10px 7px white;
			margin: 0;
  			padding: 10px;
  			border-radius: 10%;
			top: 0;
		}
		.botdiv{
			background-color: #f1f1f1;
			margin: 0;
  			padding: 10px;
			top: 150px;
			max-height: 510px;
			min-height: 510px;
			border-radius: 2%;
			margin-bottom: 10px;
			bottom: 0px;
			box-shadow: inset 1px 1px 10px 6px white;
		}
		.profil-img {
          background-image:url("<?php echo $row["img_dir"]; ?>");
					width: 145px;
					height: 145px;
					cursor: pointer;
					background-size: cover;
					border-radius: 50%;
					border: 0.1em solid rgba(255, 10, 10, 0.4);
					box-shadow: inset 1px 1px 2px 7px white;
					}

			.profil-info {
				text-align: center;
			}
			input[type="file"] {
				    display: none;
				}

			.bio-photo {
			  border-radius: 50%;
			  display: block;
			  width: 150px;
			  height: auto;
			}
			.box {
			  display: inline-block;
			  width: 98%;
			  height: 120px;
			  margin: 10px;
			  background-color: #fff;
			}
			/* This is for the span where the image or text is placed. */
			.box .sp {
			  display: block;
			  width: 150px;
			  height: 150px;
			  border-radius: 100%;
			  margin-top: 5%;
			  margin-left: 10%;
			  
			  border: 20px solid white;
			  
			  font-size: 28px;
			  font-weight: bold;
			  text-align: center;
			  line-height: 0px;
			  text-indent: 180px;
			  background-color: #a023f0;
			  z-index: 20;
			}
			.box2 {
			  position: relative;  
			  /* z-index needs to be set to a negative number, below the circular image.*/
			  z-index: -10;
			  
			  display: inline-block;
			  width: 100%;
			  height: 510px;
			  
			  /* This number may need to be adjusted if any changes are made
			  to border thickness. */
			  margin-top: -114px;
			  background-color: #f1f1f1;
			  vertical-align: top;
			}
      
      
.balloon2 {
  display: inline-block;
  width: 315px;
  height: 250px;
  padding: 40px 0 10px 15px;
  font-family: "Open Sans", sans;
  font-weight: 600;
  color: #377D6A;
  background: #eeeeee;
  border-width: 2px;
  border-color: rgba(100, 50, 200, 0.8);
  border-radius: 3px;
  outline: 0;
  text-indent: 0;
  transition: all .3s ease-in-out;
}
.balloon2::-webkit-input-placeholder {
  color: #efefef;
  text-indent: 0;
  font-weight: 300;
}
.balloon2 + label {
  display: inline-block;
  position: absolute;
  top: 10px;
  height: 28px;
  left: 0;
  bottom: 8px;
  padding: 5px 45px;
  color: #032429;
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  text-shadow: 0 1px 0 rgba(19, 74, 70, 0);
  transition: all .3s ease-in-out;
  border-radius: 3px;
  background: rgba(122, 184, 147, 0);
}
.balloon2 + label:after {
  position: absolute;
  content: "";
  width: 0;
  height: 0;
  top: 100%;
  left: 50%;
  margin-left: -3px;
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
  border-top: 3px solid rgba(122, 184, 147, 0);
  transition: all .3s ease-in-out;
}

.balloon2:focus,
.balloon2:active {
  color: #377D6A;
  padding: 8px 0 10px 15px;
  text-indent: 0;
  background: #fff;
}
.balloon2:focus::-webkit-input-placeholder,
.balloon2:active::-webkit-input-placeholder {
  color: #aaa;
}
.balloon2:focus + label,
.balloon2:active + label {
  height: 14px;
  color: #fff;
  text-shadow: 0 1px 0 rgba(19, 74, 70, 0.4);
  background: #7ab893;
  transform: translateY(-40px);
}
.balloon2:focus + label:after,
.balloon2:active + label:after {
  border-top: 4px solid #7ab893;
}
			.pos {
			  max-width: 400px;
			  max-height: 300px;
			  position: relative;
			  margin: 0 auto;
			  display: inline-block;
			  padding: 60px 30px;
			  z-index: 0;
			  margin-top: -353px;
			  margin-left:740px;
			  text-align: center;
			}
			.buttonup{
				background-color: #999999;
				max-width: 80px;
			    max-height: 30px;
			    position: relative;
				margin-top: -335px;
			  	margin-left: 900px;
			  	z-index: 3;
			}
			
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<style>
@keyframes loading {
  0% {
    cy: 10;
  }
  25% {
    cy: 3;
  }
  50% {
    cy: 10;
  }
}
canvas {
  height: 100vh;
  top: 0;
  pointer-events: none;
  display: inline-block;
  position: absolute;
  width: 100%;
  z-index: 40;
}

button {
  background: none;
  border: none;
  color: #f4f7ff;
  cursor: pointer;
  font-family: "Quicksand", sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  left: 80%;
  outline: none;
  overflow: hidden;
  padding: 0 10px;
  position: fixed;
  top: 28%;
  transform: translate(-50%, -50%);
  width: 190px;
  -webkit-tap-highlight-color: transparent;
  z-index: 1;
}
button::before {
  background: #1f2335;
  border-radius: 50px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4) inset;
  content: "";
  display: block;
  height: 100%;
  margin: 0 auto;
  position: relative;
  transition: width 0.2s cubic-bezier(0.39, 1.86, 0.64, 1) 0.3s;
  width: 100%;
}

button.ready .submitMessage svg {
  opacity: 1;
  top: 1px;
  transition: top 0.4s ease 600ms, opacity 0.3s linear 600ms;
}
button.ready .submitMessage .button-text span {
  top: 0;
  opacity: 1;
  transition: all 0.2s ease calc(var(--dr) + 600ms);
}

button.loading::before {
  transition: width 0.3s ease;
  width: 80%;
}
button.loading .loadingMessage {
  opacity: 1;
}
button.loading .loadingCircle {
  animation-duration: 1s;
  animation-iteration-count: infinite;
  animation-name: loading;
  cy: 10;
}

button.complete .submitMessage svg {
  top: -30px;
  transition: none;
}
button.complete .submitMessage .button-text span {
  top: -8px;
  transition: none;
}
button.complete .loadingMessage {
  top: 80px;
}
button.complete .successMessage .button-text span {
  left: 0;
  opacity: 1;
  transition: all 0.2s ease calc(var(--d) + 1000ms);
}
button.complete .successMessage svg {
  stroke-dashoffset: 0;
  transition: stroke-dashoffset 0.3s ease-in-out 1.4s;
}

.button-text span {
  opacity: 0;
  position: relative;
}

.message {
  left: 50%;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
}

.message svg {
  display: inline-block;
  fill: none;
  margin-right: 5px;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-width: 2;
}

.submitMessage .button-text span {
  top: 8px;
  transition: all 0.2s ease var(--d);
}
.submitMessage svg {
  color: #5c86ff;
  margin-left: -1px;
  opacity: 0;
  position: relative;
  top: 30px;
  transition: top 0.4s ease, opacity 0.3s linear;
  width: 14px;
}

.loadingMessage {
  opacity: 0;
  transition: opacity 0.3s linear 0.3s, top 0.4s cubic-bezier(0.22, 0, 0.41, -0.57);
}
.loadingMessage svg {
  fill: #5c86ff;
  margin: 0;
  width: 22px;
}

.successMessage .button-text span {
  left: 5px;
  transition: all 0.2s ease var(--dr);
}
.successMessage svg {
  color: #5cffa1;
  stroke-dasharray: 20;
  stroke-dashoffset: 20;
  transition: stroke-dashoffset 0.3s ease-in-out;
  width: 14px;
}

.loadingCircle:nth-child(2) {
  animation-delay: 0.1s;
}

.loadingCircle:nth-child(3) {
  animation-delay: 0.2s;
}
</style>
  
  <script id="sc1">
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

	</head>
	<body>
		<canvas id="canvas"></canvas>
		<button id="button" class="ready" onclick="clickButton();">
		  <div class="message submitMessage">
		    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 12.2">
		      <polyline stroke="currentColor" points="2,7.1 6.5,11.1 11,7.1 "/>
		      <line stroke="currentColor" x1="6.5" y1="1.2" x2="6.5" y2="10.3"/>
		    </svg> <span class="button-text">Update</span>
		  </div>
		  <div class="message loadingMessage">
		    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 17">
		      <circle class="loadingCircle" cx="2.2" cy="10" r="1.6"/>
		      <circle class="loadingCircle" cx="9.5" cy="10" r="1.6"/>
		      <circle class="loadingCircle" cx="16.8" cy="10" r="1.6"/>
		    </svg>
		  </div>
		  <div class="message successMessage">
		    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 11">
		      <polyline stroke="currentColor" points="1.4,5.8 5.1,9.5 11.6,2.1 "/>
		    </svg> <span class="button-text">Success</span>
		  </div>
		</button>
    <form action="second_form_pro.php" name="second" method="post" id="second" enctype="multipart/form-data">
    <input type="file" id="file" accept="image/*" name="image" onchange="return fileValidation()">
		<div class="box">
		  <span class="sp"><div class="profil-img" id="profile-image" onclick="document.getElementById('file').click()"></div><p name = "id"><?php echo $_SESSION["user"]; ?></p>
		  
		  </span>
		  <div class="box2">
		  </div>
		</div>
		<div class="row" style="float: left;">
				<span>
				    <input class="balloon" id="First_Name" name = "fname" type="text" value="<?php echo $row["firstname"]; ?>" placeholder="You are a Star" /><label for="firstname">First Name</label>
				</span>
				<span>
				    <input class="balloon" id="Last_Name" name = "lname" type="text" value="<?php echo $row["lastname"]; ?>" placeholder="Something left yet"/><label for="lastname">Last Name</label>
				</span>
				<span>
				    <input class="balloon" id="Email_Id" name = "email" type="text" value="<?php echo $row["email"]; ?>" placeholder="Tell your uniqueness!" /><label for="eid">Email Id</label>
				</span>
				<span>
				    <select class="skinny2"  name="gender" id="gender" value="<?php echo $row["gender"]; ?>">
					    <option value="Male">Male</option>
					    <option value="Female">Female</option>
					    <option value="Others">Others</option>
					  </select><label for="Gender">Gender</label>
				</span>
				<span>
				    <input class="balloon" id="dob" name = "dob" type="date" value="<?php echo $row["birthday"]; ?>" placeholder="Years you passed!" />
            <label for="DOB">Date of Birth</label>
				</span><br>
				<span>
					<a href="#" style="z-index: 4;margin-top:90%" onclick="set();">Change Password</a>
				</span>
        <div class="pos">
				<div >
					<span>
					  	<textarea class="balloon2" id="bio" class="text" cols="20" rows ="5" name="bio" placeholder="Description"><?php echo $row["bio"]; ?></textarea><label for="move">Bio</label>
					 </span>
				</div>
		</div>
		</div>
</form>
<?php
        echo"<script>
        funtion set(){
          document.findElementById('First_Name').innerHTML='".$row["firstname"]."';
          document.findElementById('Last_Name').innerHTML='".$row["lastname"]."';
          document.findElementById('Email_Id').value='".$row["email"]."';
          document.findElementById('gender').value='".$row["gender"]."';
          document.findElementById('dob').value='".$row["birthday"]."';
          document.findElementById('bio').value='".$row["bio"]."';
          document.getElementById('profile-image').style.background= 'url(".$row["img_dir"].") no-repeat center';
          document.getElementById('profile-image').style.backgroundSize = '145px 145px';
        }
        set();
        </script>";
    }
  }

?>
<script type="text/javascript" src="Design_Components/jquery.min.js"></script>
		<script>
        function updatedb(){
          var form = $('#second')[0];
           $.ajax({
                   type:"POST",
                   url: "second_form_pro.php",
                   processData: false,
                   contentType: false,
                   enctype: 'multipart/form-data',
                   data:  new FormData(form),
                    success: function(msg){
                      alert(msg);
                    }
                 });
        }

        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg)$/i;
             const fi = document.getElementById('file');
               const fsize = fi.files.item(0).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 4024) {
                    alert(
                      "File too Big, please select a file less than 4 MB");
            fileInput.value = '';
          return false;
                }
            if (!allowedExtensions.exec(filePath)) {
                alert('Only .jpg files are allowed');
                fileInput.value = '';
                return false;
            }
            else 
            {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {

                        document.getElementById('profile-image').style.background= "url("+e.target.result+") no-repeat center";
                        document.getElementById('profile-image').style.backgroundSize = "145px 145px";
                    };
                     
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
		</script>
  

   <script id="rendered-js" >
// ammount to add on each button press
const confettiCount = 20;
const sequinCount = 10;

// "physics" variables
const gravityConfetti = 0.3;
const gravitySequins = 0.55;
const dragConfetti = 0.075;
const dragSequins = 0.02;
const terminalVelocity = 3;

// init other global elements
const button = document.getElementById('button');
var disabled = false;
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
let cx = ctx.canvas.width / 2;
let cy = ctx.canvas.height / 2;

// add Confetto/Sequin objects to arrays to draw them
let confetti = [];
let sequins = [];

// colors, back side is darker for confetti flipping
const colors = [
{ front: '#7b5cff', back: '#6245e0' }, // Purple
{ front: '#b3c7ff', back: '#8fa5e5' }, // Light Blue
{ front: '#5c86ff', back: '#345dd1' } // Darker Blue
];

// helper function to pick a random number within a range
randomRange = (min, max) => Math.random() * (max - min) + min;

// helper function to get initial velocities for confetti
// this weighted spread helps the confetti look more realistic
initConfettoVelocity = (xRange, yRange) => {
  const x = randomRange(xRange[0], xRange[1]);
  const range = yRange[1] - yRange[0] + 1;
  let y = yRange[1] - Math.abs(randomRange(0, range) + randomRange(0, range) - range);
  if (y >= yRange[1] - 1) {
    // Occasional confetto goes higher than the max
    y += Math.random() < .25 ? randomRange(1, 3) : 0;
  }
  return { x: x, y: -y };
};

// Confetto Class
function Confetto() {
  this.randomModifier = randomRange(0, 99);
  this.color = colors[Math.floor(randomRange(0, colors.length))];
  this.dimensions = {
    x: randomRange(5, 9),
    y: randomRange(8, 15) };

  this.position = {
    x: randomRange(canvas.width / 2 - button.offsetWidth / 4, canvas.width / 2 + button.offsetWidth / 4),
    y: randomRange(canvas.height / 2 + button.offsetHeight / 2 + 8, canvas.height / 2 + 1.5 * button.offsetHeight - 8) };

  this.rotation = randomRange(0, 2 * Math.PI);
  this.scale = {
    x: 1,
    y: 1 };

  this.velocity = initConfettoVelocity([-9, 9], [6, 11]);
}
Confetto.prototype.update = function () {
  // apply forces to velocity
  this.velocity.x -= this.velocity.x * dragConfetti;
  this.velocity.y = Math.min(this.velocity.y + gravityConfetti, terminalVelocity);
  this.velocity.x += Math.random() > 0.5 ? Math.random() : -Math.random();

  // set position
  this.position.x += this.velocity.x;
  this.position.y += this.velocity.y;

  // spin confetto by scaling y and set the color, .09 just slows cosine frequency
  this.scale.y = Math.cos((this.position.y + this.randomModifier) * 0.09);
};

// Sequin Class
function Sequin() {
  this.color = colors[Math.floor(randomRange(0, colors.length))].back,
  this.radius = randomRange(1, 2),
  this.position = {
    x: randomRange(canvas.width / 2 - button.offsetWidth / 3, canvas.width / 2 + button.offsetWidth / 3),
    y: randomRange(canvas.height / 2 + button.offsetHeight / 2 + 8, canvas.height / 2 + 1.5 * button.offsetHeight - 8) },

  this.velocity = {
    x: randomRange(-6, 6),
    y: randomRange(-8, -12) };

}
Sequin.prototype.update = function () {
  // apply forces to velocity
  this.velocity.x -= this.velocity.x * dragSequins;
  this.velocity.y = this.velocity.y + gravitySequins;

  // set position
  this.position.x += this.velocity.x;
  this.position.y += this.velocity.y;
};

// add elements to arrays to be drawn
initBurst = () => {
  for (let i = 0; i < confettiCount; i++) {
    confetti.push(new Confetto());
  }
  for (let i = 0; i < sequinCount; i++) {
    sequins.push(new Sequin());
  }
};

// draws the elements on the canvas
render = () => {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  confetti.forEach((confetto, index) => {
    let width = confetto.dimensions.x * confetto.scale.x;
    let height = confetto.dimensions.y * confetto.scale.y;

    // move canvas to position and rotate
    ctx.translate(confetto.position.x, confetto.position.y);
    ctx.rotate(confetto.rotation);

    // update confetto "physics" values
    confetto.update();

    // get front or back fill color
    ctx.fillStyle = confetto.scale.y > 0 ? confetto.color.front : confetto.color.back;

    // draw confetto
    ctx.fillRect(-width / 2, -height / 2, width, height);

    // reset transform matrix
    ctx.setTransform(1, 0, 0, 1, 0, 0);

    // clear rectangle where button cuts off
    if (confetto.velocity.y < 0) {
      ctx.clearRect(canvas.width / 2 - button.offsetWidth / 2, canvas.height / 2 + button.offsetHeight / 2, button.offsetWidth, button.offsetHeight);
    }
  });

  sequins.forEach((sequin, index) => {
    // move canvas to position
    ctx.translate(sequin.position.x, sequin.position.y);

    // update sequin "physics" values
    sequin.update();

    // set the color
    ctx.fillStyle = sequin.color;

    // draw sequin
    ctx.beginPath();
    ctx.arc(0, 0, sequin.radius, 0, 2 * Math.PI);
    ctx.fill();

    // reset transform matrix
    ctx.setTransform(1, 0, 0, 1, 0, 0);

    // clear rectangle where button cuts off
    if (sequin.velocity.y < 0) {
      ctx.clearRect(canvas.width / 2 - button.offsetWidth / 2, canvas.height / 2 + button.offsetHeight / 2, button.offsetWidth, button.offsetHeight);
    }
  });

  // remove confetti and sequins that fall off the screen
  // must be done in seperate loops to avoid noticeable flickering
  confetti.forEach((confetto, index) => {
    if (confetto.position.y >= canvas.height) confetti.splice(index, 1);
  });
  sequins.forEach((sequin, index) => {
    if (sequin.position.y >= canvas.height) sequins.splice(index, 1);
  });

  window.requestAnimationFrame(render);
};

// cycle through button states when clicked
clickButton = () => {
  if (!disabled) {
    updatedb();
    disabled = true;
    // Loading stage
    button.classList.add('loading');
    button.classList.remove('ready');
    setTimeout(() => {
      // Completed stage
      button.classList.add('complete');
      button.classList.remove('loading');
      setTimeout(() => {
        window.initBurst();
        setTimeout(() => {
          // Reset button so user can select it again
          disabled = false;
          button.classList.add('ready');
          button.classList.remove('complete');
        }, 4000);
      }, 320);
    }, 1800);
  }
};

//re-init canvas if the window size changes

resizeCanvas = () => {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  cx = ctx.canvas.width / 2;
  cy = ctx.canvas.height / 2;
};

// resize listenter
window.addEventListener('resize', () => {
  resizeCanvas();
});

// click button on spacebar or return keypress
/*
document.body.onkeyup = e => {
  if (e.keyCode == 13) {
    //clickButton();
  }
};
*/
// Set up button text transition timings on page load
textElements = button.querySelectorAll('.button-text');
textElements.forEach(element => {
  characters = element.innerText.split('');
  let characterHTML = '';
  characters.forEach((letter, index) => {
    characterHTML += `<span class="char${index}" style="--d:${index * 30}ms; --dr:${(characters.length - index - 1) * 30}ms;">${letter}</span>`;
  });
  element.innerHTML = characterHTML;
});

// kick off the render loop
render();
    </script>

  <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRefreshCSS-4793b73c6332f7f14a9b6bba5d5e62748e9d1bd0b5c52d7af6376f3d1c625d7e.js"></script>
	</body>
</html>