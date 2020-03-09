<!DOCTYPE html>
<html lang="en">
<body style="background-color:#f0f0f0;">
<meta http-equiv="refresh" content="4;url=index.php" />

<style>
#gallery {
  position: relative;
  margin: auto;
  height: 580px;
  width: 792px;
}

.img-box {
  -moz-animation: slides 36s infinite;
  -webkit-animation: slides 36s infinite;
  -o-animation: slides 36s infinite;
  -ms-animation: slides 36s infinite;
  animation: slides 36s infinite;
  position: absolute;
  background-repeat: no-repeat;
  background-position: center;
  margin: auto;
  height: 580px;
  width: 792px;
  opacity: 0;
}

#img-box1 {
  animation-delay: 0s;
  background-image: url("pirate.png");
}

#img-box2 {
  animation-delay: 6s;
  background-color: red;
}

#img-box3 {
  animation-delay: 12s;
  background-color: orange;
}

#img-box4 {
  animation-delay: 18s;
  background-color: green;
}

#img-box5 {
  animation-delay: 24s;
  background-color: pink;
}

#img-box6 {
  animation-delay: 30s;
  background-color: cyan;
}

@-webkit-keyframes slides {
  animation-timing-function: linear;
  0% {
    opacity: 1;
  }
  16% {
    opacity: 1;
  }
  20% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}

@-o-keyframes slides {
  animation-timing-function: linear;
  0% {
    opacity: 1;
  }
  16% {
    opacity: 1;
  }
  20% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}

@-moz-keyframes slides {
  animation-timing-function: linear;
  0% {
    opacity: 1;
  }
  16% {
    opacity: 1;
  }
  20% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}

@-ms-keyframes slides {
  animation-timing-function: linear;
  0% {
    opacity: 1;
  }
  16% {
    opacity: 1;
  }
  20% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}

@keyframes slides {
  animation-timing-function: linear;
  0% {
    opacity: 1;
  }
  16% {
    opacity: 1;
  }
  20% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}

.page-hero {
 
    height: 300px;
    overflow: hidden;
    position: relative;
    width: 100%;
}

.page-hero h1 {
    animation:
        slideUp 0.75s .5s cubic-bezier(0.17,.88,.32,1.27) both,
        fadeIn .25s .5s ease-in both;
    padding: 0 20px;
    position: absolute;
    text-align: center;
    text-shadow: 3px 3px 7px rgba(0,0,0,.61);
    top: 80%;
    width: 100%;
}

@keyframes slideUp {
    from {transform: translateY(200%);}
    to {transform:translateY(-50%);}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<div class="page-hero">
  <h1>Development Made by Pirates</h1>
</div>
<body>
<div id="gallery">
    <div class="img-box" id="img-box1"></div>
</div>    
</body>
</html>