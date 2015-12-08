<html>
<head>
<title>Ab's Kreative Korner :: Main</title>
<style type="text/css">
body {
    background-color: #666666;
}

.blkdiv {
    position: relative;
    float: left;
    width: 23;
    height: 23;   
    border: solid 1px #666666;
    background-color: #666666; 
}

div.cellholder {   
    position: absolute; 
    width: 100%; 
    height: 100%; 
    top: 0px; 
    left: 0px; 
}

.menud {
    position: absolute;
    top: 50;
    left: 50;
    width: 250;
    background-color: #000000;
    color: #ffffff;
    font-family: 'verdana';
    font-size: 12px;
    text-align: center;
    filter: alpha(opacity=78);
    -moz-opacity: 0.78;
    opacity: 0.78;
    visibility: visible;
}

.maind {
    position: absolute;
    top: 50;
    right: 50;
    width: 50%;
    background-color: #000000;
    color: #ffffff;
    font-family: 'verdana';
    font-size: 12px;
    visibility: hidden;
    padding: 10;
    filter: alpha(opacity=78);
    -moz-opacity: 0.78;
    opacity: 0.78;
}

table {
    border-with: 0;
}

a {
    color: #ffffff;
    text-decoration: none;
}

a:hover {
    color: red;
}  
</style>

<script type="text/javascript">
window.onresize = handleResize;
function handleResize()
{
    while(cholder.firstChild)
    {
        cholder.removeChild(cholder.firstChild);
    }
    icount = 0;   
    getMainDims();
    initAppend();
}

var icount = 0;
var divpref = "coldiv";
var arrCells = new Array();
var arrSearchCells = new Array();
var allDivs;

var arrGS = new Array();
arrGS[0] = "#1a1a1a";
arrGS[1] = "#262626";
arrGS[2] = "#333333";
arrGS[3] = "#404040";
arrGS[4] = "#4d4d4d";
arrGS[5] = "#5a5a5a";
arrGS[6] = "#666666";
arrGS[7] = "#737373";
arrGS[8] = "#808080";
arrGS[9] = "#8d8d8d";
arrGS[10] = "#999999";
arrGS[11] = "#a6a6a6";
arrGS[12] = "#b3b3b3";

var arrTxt = new Array();
arrTxt[0] = "txt0";
arrTxt[1] = "txt1";
arrTxt[2] = "txt2";
arrTxt[3] = "txt3";

var mainWidth;
var mainHeight;
function getMainDims()
{
    if(typeof(window.innerWidth == 'number'))
    {
        mainWidth = window.innerWidth;
        mainHeight = window.innerHeight;
    }
    else if(document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight))
    {
        mainWidth = document.documentElement.clientWidth;
        mainHeight = document.documentElement.clientHeight;
    }
    else if(document.body && (document.body.clientWidth || document.body.clientHeight))
    {
        mainWidth = document.body.clientWidth;
        mainHeight = document.body.clientHeight;
    }
}

function getRandInt(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

var cholder;
function init()
{
    cholder = document.getElementById('cellholder');
    getMainDims();
  
    fShow(arrTxt[0]);
    initAppend();
}

function appender()
{
    var newDiv = document.createElement("div");
    newDiv.setAttribute("id", (divpref + icount));
    newDiv.setAttribute("class", "blkdiv");
    newDiv.style.backgroundColor = arrGS[getRandInt(0, 12)];

    icount += 1;
    cholder.appendChild(newDiv);
}

function initAppend()
{
    var winWidth = document.body.clientWidth;
    var winHeight = document.body.clientHeight;

    var ilimitx = winWidth / 25; 
    var ilimity = winHeight / 25;
    var ilimit = Math.floor(ilimitx) * Math.floor(ilimity);
    var cholder = document.getElementById('bgcontainer');

    for(var i=0; i < ilimit; ++i)
    {
        appender();
    }

  allDivs = document.getElementById('cellholder').getElementsByTagName("div");
  //alert(allDivs.length);

    for(var i=0; i < allDivs.length; i++)
    {
        if(allDivs[i].id.length >= divpref.length && allDivs[i].id.indexOf(divpref) == 0)
        {
            arrSearchCells.push(allDivs[i]);
        } 
    }
}

function fMouse(event)
{
    if(event.offsetX || event.offsetY)
    {
        x = event.offsetX;
        y = event.offsetY;
    }
    else
    {
        x = event.pageX;
        y = event.pageY;
    }

    document.getElementById(arrSearchCells[getRandInt(0, (arrSearchCells.length - 1))].id).style.backgroundColor = arrGS[getRandInt(0,(arrGS.length -1))];
}

function fShow(ele)
{
    for(var i=0; i < arrTxt.length; i++)
    {
        document.getElementById(arrTxt[i]).style.visibility = 'hidden';
    }
    document.getElementById(ele).style.visibility = 'visible';
}


</script>
</head>

<body onload="init()" onMouseMove="fMouse(event)">
<div id="cellholder" class="cellholder">
</div>
    
<div id="mainmenu" class="menud">
    <p><h3>Ab's Kreative Korner</h3></p>
    <p><a href="#" onclick="fShow('txt1')">What?</a></p>
    <p><a href="#" onclick="fShow('txt2')">About</a></p>
    <p><a href="#" onclick="fShow('txt3')">Credits</a></p>
    <br />
    <p><a href="./index.php">Home</a></p>
</div>

<div id="txt0" class="maind">
    <p>Welcome to Ab's Kreative Korner, this page is under construction as of <?php echo date('r'); ?> &nbsp; </p>
</div>

<div id="txt1" class="maind">
    <p>This page is a result of my experiments with Python, PHP, HTML, CSS and Javascript!</p>
</div>

<div id="txt2" class="maind">
    <p><b>About me: </b></p>
    <p>Who am i? Well i am just your friendly neighborhood nerd!
    <br />
    I am a software guy based in Australia and this website contains some of my experiments, and some information on the various things that i consider fun. On a daily basis i work with C/C++, Python, and Web development - expect to see some of that here as well as other scripting, entertainment, books, music, videos and more.</p>
    <br / >
    <p><b>Technical details about the main style:</b></p>
    <p>While i drew inspiration about the looks and the art of this page from all over the place, all the underlying code and styling is my own work. </p>
    <p>More details coming soon! </p>
</div>

<div id="txt3" class="maind">
    <p>Most of what i do for myself i consider FOSS/Creative Commons, so feel free to browse my code, learn from it, modify it and use it as long as:
    <li>You give me credit for my work, </li>
    <li>You don't make your website look exactly like mine - come on, do you really want all webpages to look the same? Create, innovate - the two exhilarate! </li></p>
</div>


</body>

</html>

