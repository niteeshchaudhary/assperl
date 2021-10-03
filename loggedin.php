<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="trupen" content="truPen">
        <title>truPen | Dashboard -&gt; HTML &amp; CSS</title>
        <style>
            body {
                color: orange;
                background: #f4ffff;
            }
            
            .container {
                position: relative;
                padding: 50px;
                width: 260px;
                min-height: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(5px);
                border-radius: 10px;
                box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            }
            /* Add a black background color to the top navigation */
            
            .topnav {
                border-radius: 25px;
                position: sticky;
                background-color: lightgray;
                overflow: hidden;
                font-weight: 400;
                display: flex;
                align-items: center;
            }
            /* Style the links inside the navigation bar */
            
            .topnav a {
                float: left;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }
            /* Change the color of links on hover */
            
            .topnav a:hover {
                border-radius: 25px;
                background-color: rgba(255, 251, 251, 0.418);
                display: flex;
                align-items: center;
                justify-content: center;
            }
            /* Add a color to the active/current link */
            
            @import url("https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;600;700&display=swap");
             :root {
                --color-v: #7f71fe;
                --color-m: #7e00ff;
                --color-e: #ffbe3c;
            }
            
            .topnav a.active {
                font-weight: 400;
                background-color: #4285F4;
                font-weight: 400;
                display: flex;
                align-items: center;
            }
            
            @keyframes AnimationName {
                0% {
                    background-position: 0% 50%
                }
                50% {
                    background-position: 100% 50%
                }
                100% {
                    background-position: 0% 50%
                }
            }
            
            .topnav a.active:hover {
                border-radius: 0px;
                font-weight: 400;
                background: linear-gradient(270deg, #4285f4, #7542f4, #eb42f4);
                background-size: 600% 600%;
                -webkit-animation: AnimationName 3s ease infinite;
                -moz-animation: AnimationName 3s ease infinite;
                animation: AnimationName 3s ease infinite;
                font-weight: 400;
                display: flex;
                align-items: center;
            }
            
            .gradient {
                -webkit-text-stroke: 0.1pt white;
                font-family: "Comfortaa", cursive;
                background-image: -webkit-gradient(linear, left top, right top, from(var(--color-m)), color-stop(var(--color-e)), color-stop(var(--color-m)), to(var(--color-v)));
                background-image: -webkit-linear-gradient(left, var(--color-m) 0%, var(--color-e) 50%, var(--color-m) 150%, var(--color-v) 200%);
                background-image: linear-gradient(to right, var(--color-m) 0%, var(--color-e) 50%, var(--color-m) 150%, var(--color-v) 200%);
                -webkit-background-clip: text;
                background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            
            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: rgb(210, 210, 210);
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }
            
            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #000000;
                display: block;
                transition: 0.3s;
            }
            
            .sidenav a:hover {
                color: #aefff4;
            }
            
            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }
            
            @media screen and (max-height: 450px) {
                .sidenav {
                    padding-top: 15px;
                }
                .sidenav a {
                    font-size: 18px;
                }
            }
            
            @keyframes rotate {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(-360deg);
                }
            }
            
            .rotation {
                animation-name: rotate;
                animation-duration: 1s;
                animation-iteration-count: 1;
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

    <body translate="no">
        <br>
        <br>
        <center>
            <div class="container">
                <h1><span style="font-size:30px;cursor:pointer" onclick="toggle();"> <div style = "display:inline-block;" id="rotation">&#9776; </div> Dashboard</span></h1>
            </div>
            <br><br>
            <div class="topnav">
                <a class="active gradient-text" href="loggedin.php"><img src="Image_Components\truPen Better Logo.png" style="width: 25pt;">
                    <div style="display:inline-block;" class="gradient">truPen</div>
                </a>
                &nbsp;
                <a href="Quiz App/select.php">Quizzes</a>
                <a href="Quiz App/create.php">Create Quiz</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
            </div>
        </center>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>

        <script id="rendered-js" src="Design_Components/Button-Effect.js"></script>
        <script>
            function toggle() {
                var x = document.getElementById("mySidenav");
                var y = document.getElementById("rotation");
                if (x.style.width === "250px") {
                    y.classList.add("rotation");
                    closeNav();
                } else {
                    y.classList.add("rotation");
                    openNav();
                }
                setTimeout(() => {
                    y.classList.remove("rotation");
                }, 1050);
            }

            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
    </body>

    </html>