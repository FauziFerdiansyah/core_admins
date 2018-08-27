<!doctype html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mimi Resto Admin">
    <meta name="author" content="Asvicode">
    <title>Selamat datang di Riztafi Laundry</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/favicon')}}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/favicon')}}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/favicon')}}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon')}}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/favicon')}}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/favicon')}}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/favicon')}}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/favicon')}}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon')}}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/favicon')}}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon')}}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon')}}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon')}}/favicon-16x16.png">
    <link rel="manifest" href="{{asset('img/favicon')}}/manifest.json">
    <meta name="msapplication-TileColor" content="#111111">
    <meta name="msapplication-TileImage" content="{{asset('img/favicon')}}/ms-icon-144x144.png">
    <meta name="theme-color" content="#111111">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" />
    <style>
    #clock,#time,.disable,body::after,html{position:absolute}#daydiv,#time,body,html{font-family:"Comic Sans MS", cursive, sans-serif}.container-fluid{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}img{vertical-align:middle;border-style:none}*,::after,::before{box-sizing:border-box}body,html{font-size:1rem;background-color:#2d2620;color:#636b6f;font-weight:100;height:100vh;margin:0}#date,.unit{color:#fff;text-align:center}body::after,html{content:"";background:url(img/welcome.jpg) center;opacity:.6;top:0;left:0;bottom:0;right:0;z-index:-1;background-size:cover}.disable{width:100%;z-index:100;margin:0;height:100%;overflow:hidden}.full-height{height:100vh}.flex-center{align-items:center;display:flex;justify-content:center}.logo-center{text-align:center;margin:0 auto;z-index:-1}@-webkit-keyframes swinging{0%,100%{-webkit-transform:rotate(10deg)}50%{-webkit-transform:rotate(-5deg)}}@keyframes swinging{0%,100%{transform:rotate(10deg)}50%{transform:rotate(-5deg)}}.swingimage{-webkit-transform-origin:50% 0;transform-origin:50% 0;-webkit-animation:swinging 4.5s ease-in-out forwards infinite;animation:swinging 4.5s ease-in-out forwards infinite}.logo-img{width:auto;height:150px}#date{background:rgba(0,0,0,.1);font-size:2em;padding:.5em}#clock{align-items:center;-webkit-align-items:center;display:flex;display:-webkit-flex;height:130px;justify-content:space-around;-webkit-justify-content:space-around;left:calc(50% - 300px);top:calc(50% - 65px);width:600px}.unit{background:linear-gradient(#aaa,#777);border-radius:15px;box-shadow:0 2px 2px #444;font-size:5em;height:100%;line-height:130px;margin:0 10px;text-shadow:0 2px 2px #666;width:23%}#time{bottom:2%;right:2%;color:rgba(255,255,255,.8);font-size:50px;line-height:normal;text-align:right;z-index:-1}#daydiv{font-size:25px}#timediv{letter-spacing:3px}@media screen and (max-width:550px){.logo-img{width:100%;height:auto;margin-top:-100px}body,html{background-size:cover}}@media screen and (max-width:767px){#time{display:none}}
    </style>
</head>

<body>
    <div class="disable">
        <div class="section-demo" style="position: absolute;">
            <canvas id="demo" style="position: absolute;"></canvas>
        </div>
        <div class="container-fluid flex-center full-height">
            <div class="logo-center">
                <img src="{{ asset('img/logo.png') }}" class="swingimage img img-responsive logo-img" alt="" />
            </div>
        </div>
        <div id="time">
            <div id="daydiv"></div>
            <div id="timediv"></div>
        </div>
    </div>
</body>
<script>
    var WIDTH,HEIGHT,canvas,con,g,pxs=[],rint=60;function func_Animate_blow(){WIDTH=window.innerWidth,HEIGHT=window.innerHeight;var t=document.getElementById("demo");t.setAttribute("height",HEIGHT),t.setAttribute("width",WIDTH),con=t.getContext("2d");for(var i=0;i<100;i++)pxs[i]=new Circle,pxs[i].reset();setInterval(draw,rint)}function draw(){con.clearRect(0,0,WIDTH,HEIGHT);for(var t=0;t<pxs.length;t++)pxs[t].fade(),pxs[t].move(),pxs[t].draw()}function Circle(){this.s={ttl:8e3,xmax:3,ymax:2,rmax:200,rt:1,xdef:960,ydef:540,xdrift:2,ydrift:2,random:!0,blink:!0};var t=[["rgba(255,255,255,0)","rgba(255,255,255,0.3)"],["rgba(200,200,200,0)","rgba(200,200,200,0.3)"],["rgba(180,180,180,0)","rgba(180,180,180,0.3)"],["rgba(120,120,120,0)","rgba(120,120,120,0.3)"]],i="."+Math.floor(5*Math.random())+1;this.reset=function(){this.x=this.s.random?WIDTH*Math.random():this.s.xdef,this.y=this.s.random?HEIGHT*Math.random():this.s.ydef,this.r=(this.s.rmax-1)*Math.random()+1,this.dx=Math.random()*this.s.xmax*(Math.random()<.5?-1:1),this.dy=Math.random()*this.s.ymax*(Math.random()<.5?-1:1),this.hl=this.s.ttl/rint*(this.r/this.s.rmax),this.rt=Math.random()*this.hl,this.s.rt=Math.random()+1,this.stop=.2*Math.random()+.4,this.s.xdrift*=Math.random()*(Math.random()<.5?-1:1),this.s.ydrift*=Math.random()*(Math.random()<.5?-1:1),this.opacityFill=i,this.currentColor=Math.floor(Math.random()*t.length)},this.fade=function(){this.rt+=this.s.rt},this.draw=function(){this.s.blink&&(this.rt<=0||this.rt>=this.hl)?this.s.rt=-1*this.s.rt:this.rt>=this.hl&&this.reset(),con.beginPath(),con.arc(this.x,this.y,this.r,0,2*Math.PI,!0),con.globalAlpha=i;var e=1-this.rt/this.hl,a=this.r*e;gradient=con.createRadialGradient(this.x,this.y,0,this.x,this.y,a<=0?1:a),gradient.addColorStop(0,t[this.currentColor][1]),gradient.addColorStop(.7,t[this.currentColor][1]),gradient.addColorStop(1,t[this.currentColor][0]),con.fillStyle=gradient,con.fill(),con.closePath()},this.move=function(){this.x+=this.rt/this.hl*this.dx,this.y+=this.rt/this.hl*this.dy,(this.x>WIDTH||this.x<0)&&(this.dx*=-1),(this.y>HEIGHT||this.y<0)&&(this.dy*=-1)},this.getX=function(){return this.x},this.getY=function(){return this.y}}function startTime(){var t=new Date,i=t.getHours(),e=t.getMinutes(),a=t.getSeconds();i=checkTime(i),e=checkTime(e),a=checkTime(a),document.getElementById("timediv").innerHTML=i+":"+e+":"+a}function checkTime(t){return t<10&&(t="0"+t),t}document.addEventListener("DOMContentLoaded",function(t){document.getElementsByClassName("disable")[0].addEventListener("contextmenu",function(t){t.preventDefault()},!1),func_Animate_blow()}),setInterval(startTime,500);var months=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],myDays=["Minggu","Senin","Selasa","Rabu","Kamis","Jum&#39;at","Sabtu"],date=new Date,day=date.getDate(),month=date.getMonth(),thisDay=myDays[thisDay=date.getDay()],yy=date.getYear(),year=yy<1e3?yy+1900:yy;document.getElementById("daydiv").innerHTML=thisDay+", "+day+" "+months[month]+" "+year;
</script>

</html>