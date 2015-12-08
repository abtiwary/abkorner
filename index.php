
<html>

<head>
<title>Ab's Kreative Korner - Welcome!</title>

<style type="text/css">
  body {
      background-color: #666666;
  }

  .menud {
      position: absolute;
      top: 50;
      left: 50;
      width: 20%;
      background-color: #000000;
      color: #ffffff;
      font-family: 'verdana';
      font-size: 12px;
      text-align: center;
      filter: alpha(opacity=78);
      -moz-opacity: 0.78;
      opacity: 0.78;
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

  .welcomed {
      position: absolute;
      top: 200;
      left: 250;
      width: 250;
      background-color: #000000;
      color: #ffffff;
      font-family: 'verdana';
      font-size: 12px;
      visibility: hidden;
      padding: 10;
      filter: alpha(opacity=78);
      -moz-opacity: 0.78;
      opacity: 0.78;
      text-align: center;
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

  .fadeout {
    position: absolute;
    top: 50;
    left: 35%;
    color: white;
    background-color: black;
    padding: 10;
    font-family: 'verdana';
    font-size: 12px;
    }

  .jserror {
    position: absolute;
    top: 120;
    left: 35%;
    color: white;
    background-color: black;
    padding: 10;
    font-family: 'verdana';
    font-size: 12px;
  }
</style>

<script type="text/javascript">
var mybody;
var allTds;
var x;
var y;
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
//arrTxt[0] = "txt0";
//arrTxt[1] = "txt1";
//arrTxt[2] = "txt2";
//arrTxt[3] = "txt3";
arrTxt[0] = "welcomediv";

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

window.onresize = handleResize;
function handleResize()
{
    chgTableDims();
    centerDiv('welcomediv');
}

function chgTableDims()
{
    getMainDims();
    if(mainWidth > mainHeight)
    {
        var ratio = mainWidth / mainHeight;
        var adj = Math.round((100 / ratio) / 10) * 10;
        //var fudgeFactor = 5;
        document.getElementById('bktbl').style.width = adj + '%';
        document.getElementById('bktbl').align = 'center';
    }
    else
    {
        document.getElementById('bktbl').style.width = '100%';
        document.getElementById('bktbl').style.height = '100%';
        document.getElementById('bktbl').align = 'left';
    }
}

document.onkeyup = handleKeyPress;
var mov = "";
var currPosTop;
var currPosLeft;
var newPosTop;
var newPosLeft;
var jmpFactor = 5;
function handleKeyPress(e)
{
    if(!e) var e = window.event;
    var userip = e.keyCode;

    currPosTop = document.getElementById(mov).offsetTop;
    currPosLeft = document.getElementById(mov).offsetLeft;
    
    switch(userip)
    {
        case 38: //up arrow and w
        case 87: 
            newPosTop = currPosTop - jmpFactor;
            break;

        case 40: //down arrow and s
        case 83:
            newPosTop = currPosTop + jmpFactor;
            break;

        case 37: //left arrow and a
        case 65:
            newPosLeft = currPosLeft - jmpFactor;
            break;

        case 39: //right arrow and d
        case 68:
            newPosLeft = currPosLeft + jmpFactor;
            break;

        case 107: // +
            jmpFactor += 5;
            break;

        case 109: // -
            if(jmpFactor > 5)
            {
                jmpFactor -= 5;
            }
            break;

        case 27:
            mov = "";
            break;

        default:
            break;
    }

    document.getElementById(mov).style.top = newPosTop;
    document.getElementById(mov).style.left = newPosLeft;
}

function fSetMovable(ele)
{
    mov = ele;
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

    document.getElementById(allTds[getRandInt(0, (allTds.length - 1))].id).style.backgroundColor = arrGS[getRandInt(0,(arrGS.length -1))];
}

function getRandInt(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function init()
{
    mybody = document.getElementsByTagName('body')[0];
    allTds = mybody.getElementsByTagName('td');
    
    for(var i=0; i < allTds.length; i++)
    {
        document.getElementById(allTds[i].id).style.backgroundColor = arrGS[getRandInt(0, 12)];
    }
    //document.getElementById('txt0').style.visibility = 'visible';
    document.getElementById(arrTxt[0]).style.visibility = 'visible';
    chgTableDims();
    centerDiv('welcomediv');
    document.getElementById('jserror').style.visibility = 'hidden';
    setTimeout("fadeout('fadeout')", 2000);
}

function fShow(ele)
{
    for(var i=0; i < arrTxt.length; i++)
    {
        document.getElementById(arrTxt[i]).style.visibility = 'hidden';
    }
    document.getElementById(ele).style.visibility = 'visible';
}

function centerDiv(ele)
{
    getMainDims();
    var eleObj = document.getElementById(ele);
    var x = (mainWidth / 2) - (eleObj.offsetWidth / 2);
    var y = (mainHeight / 2) - (eleObj.offsetHeight / 2);
    eleObj.style.top = y;
    eleObj.style.left = x;
}

var idTimeout = 0;
var elOpac = 1;
function fadeout(ele)
{
    var elFo = document.getElementById(ele);
    elFo.style.opacity = elOpac;
    elFo.style.MozOpacity = elOpac;
    elFo.style.filter = 'alpha(opacity=' + elOpac*100 + ')';
    elOpac -= 0.05;
    if (elOpac < 0)
    {
        clearTimeout(idTimeout);
    }
    idTimeout = setTimeout("fadeout('fadeout')", 125);
}
</script>
</head>

<body onLoad="init()" onMouseMove="fMouse(event)">
<table id="bktbl" width="100%" height="100%" align="left">
<tr>
<td id="col0" class="cello"></td>
<td id="col1" class="cello"></td>
<td id="col2" class="cello"></td>
<td id="col3" class="cello"></td>
<td id="col4" class="cello"></td>
<td id="col5" class="cello"></td>
<td id="col6" class="cello"></td>
<td id="col7" class="cello"></td>
<td id="col8" class="cello"></td>
<td id="col9" class="cello"></td>
<td id="col10" class="cello"></td>
<td id="col11" class="cello"></td>
<td id="col12" class="cello"></td>
<td id="col13" class="cello"></td>
<td id="col14" class="cello"></td>
<td id="col15" class="cello"></td>
<td id="col16" class="cello"></td>
<td id="col17" class="cello"></td>
<td id="col18" class="cello"></td>
<td id="col19" class="cello"></td>
<td id="col20" class="cello"></td>
<td id="col21" class="cello"></td>
<td id="col22" class="cello"></td>
<td id="col23" class="cello"></td>
<td id="col24" class="cello"></td>
</tr>
<tr>
<td id="col25" class="cello"></td>
<td id="col26" class="cello"></td>
<td id="col27" class="cello"></td>
<td id="col28" class="cello"></td>
<td id="col29" class="cello"></td>
<td id="col30" class="cello"></td>
<td id="col31" class="cello"></td>
<td id="col32" class="cello"></td>
<td id="col33" class="cello"></td>
<td id="col34" class="cello"></td>
<td id="col35" class="cello"></td>
<td id="col36" class="cello"></td>
<td id="col37" class="cello"></td>
<td id="col38" class="cello"></td>
<td id="col39" class="cello"></td>
<td id="col40" class="cello"></td>
<td id="col41" class="cello"></td>
<td id="col42" class="cello"></td>
<td id="col43" class="cello"></td>
<td id="col44" class="cello"></td>
<td id="col45" class="cello"></td>
<td id="col46" class="cello"></td>
<td id="col47" class="cello"></td>
<td id="col48" class="cello"></td>
<td id="col49" class="cello"></td>
</tr>
<tr>
<td id="col50" class="cello"></td>
<td id="col51" class="cello"></td>
<td id="col52" class="cello"></td>
<td id="col53" class="cello"></td>
<td id="col54" class="cello"></td>
<td id="col55" class="cello"></td>
<td id="col56" class="cello"></td>
<td id="col57" class="cello"></td>
<td id="col58" class="cello"></td>
<td id="col59" class="cello"></td>
<td id="col60" class="cello"></td>
<td id="col61" class="cello"></td>
<td id="col62" class="cello"></td>
<td id="col63" class="cello"></td>
<td id="col64" class="cello"></td>
<td id="col65" class="cello"></td>
<td id="col66" class="cello"></td>
<td id="col67" class="cello"></td>
<td id="col68" class="cello"></td>
<td id="col69" class="cello"></td>
<td id="col70" class="cello"></td>
<td id="col71" class="cello"></td>
<td id="col72" class="cello"></td>
<td id="col73" class="cello"></td>
<td id="col74" class="cello"></td>
</tr>
<tr>
<td id="col75" class="cello"></td>
<td id="col76" class="cello"></td>
<td id="col77" class="cello"></td>
<td id="col78" class="cello"></td>
<td id="col79" class="cello"></td>
<td id="col80" class="cello"></td>
<td id="col81" class="cello"></td>
<td id="col82" class="cello"></td>
<td id="col83" class="cello"></td>
<td id="col84" class="cello"></td>
<td id="col85" class="cello"></td>
<td id="col86" class="cello"></td>
<td id="col87" class="cello"></td>
<td id="col88" class="cello"></td>
<td id="col89" class="cello"></td>
<td id="col90" class="cello"></td>
<td id="col91" class="cello"></td>
<td id="col92" class="cello"></td>
<td id="col93" class="cello"></td>
<td id="col94" class="cello"></td>
<td id="col95" class="cello"></td>
<td id="col96" class="cello"></td>
<td id="col97" class="cello"></td>
<td id="col98" class="cello"></td>
<td id="col99" class="cello"></td>
</tr>
<tr>
<td id="col100" class="cello"></td>
<td id="col101" class="cello"></td>
<td id="col102" class="cello"></td>
<td id="col103" class="cello"></td>
<td id="col104" class="cello"></td>
<td id="col105" class="cello"></td>
<td id="col106" class="cello"></td>
<td id="col107" class="cello"></td>
<td id="col108" class="cello"></td>
<td id="col109" class="cello"></td>
<td id="col110" class="cello"></td>
<td id="col111" class="cello"></td>
<td id="col112" class="cello"></td>
<td id="col113" class="cello"></td>
<td id="col114" class="cello"></td>
<td id="col115" class="cello"></td>
<td id="col116" class="cello"></td>
<td id="col117" class="cello"></td>
<td id="col118" class="cello"></td>
<td id="col119" class="cello"></td>
<td id="col120" class="cello"></td>
<td id="col121" class="cello"></td>
<td id="col122" class="cello"></td>
<td id="col123" class="cello"></td>
<td id="col124" class="cello"></td>
</tr>
<tr>
<td id="col125" class="cello"></td>
<td id="col126" class="cello"></td>
<td id="col127" class="cello"></td>
<td id="col128" class="cello"></td>
<td id="col129" class="cello"></td>
<td id="col130" class="cello"></td>
<td id="col131" class="cello"></td>
<td id="col132" class="cello"></td>
<td id="col133" class="cello"></td>
<td id="col134" class="cello"></td>
<td id="col135" class="cello"></td>
<td id="col136" class="cello"></td>
<td id="col137" class="cello"></td>
<td id="col138" class="cello"></td>
<td id="col139" class="cello"></td>
<td id="col140" class="cello"></td>
<td id="col141" class="cello"></td>
<td id="col142" class="cello"></td>
<td id="col143" class="cello"></td>
<td id="col144" class="cello"></td>
<td id="col145" class="cello"></td>
<td id="col146" class="cello"></td>
<td id="col147" class="cello"></td>
<td id="col148" class="cello"></td>
<td id="col149" class="cello"></td>
</tr>
<tr>
<td id="col150" class="cello"></td>
<td id="col151" class="cello"></td>
<td id="col152" class="cello"></td>
<td id="col153" class="cello"></td>
<td id="col154" class="cello"></td>
<td id="col155" class="cello"></td>
<td id="col156" class="cello"></td>
<td id="col157" class="cello"></td>
<td id="col158" class="cello"></td>
<td id="col159" class="cello"></td>
<td id="col160" class="cello"></td>
<td id="col161" class="cello"></td>
<td id="col162" class="cello"></td>
<td id="col163" class="cello"></td>
<td id="col164" class="cello"></td>
<td id="col165" class="cello"></td>
<td id="col166" class="cello"></td>
<td id="col167" class="cello"></td>
<td id="col168" class="cello"></td>
<td id="col169" class="cello"></td>
<td id="col170" class="cello"></td>
<td id="col171" class="cello"></td>
<td id="col172" class="cello"></td>
<td id="col173" class="cello"></td>
<td id="col174" class="cello"></td>
</tr>
<tr>
<td id="col175" class="cello"></td>
<td id="col176" class="cello"></td>
<td id="col177" class="cello"></td>
<td id="col178" class="cello"></td>
<td id="col179" class="cello"></td>
<td id="col180" class="cello"></td>
<td id="col181" class="cello"></td>
<td id="col182" class="cello"></td>
<td id="col183" class="cello"></td>
<td id="col184" class="cello"></td>
<td id="col185" class="cello"></td>
<td id="col186" class="cello"></td>
<td id="col187" class="cello"></td>
<td id="col188" class="cello"></td>
<td id="col189" class="cello"></td>
<td id="col190" class="cello"></td>
<td id="col191" class="cello"></td>
<td id="col192" class="cello"></td>
<td id="col193" class="cello"></td>
<td id="col194" class="cello"></td>
<td id="col195" class="cello"></td>
<td id="col196" class="cello"></td>
<td id="col197" class="cello"></td>
<td id="col198" class="cello"></td>
<td id="col199" class="cello"></td>
</tr>
<tr>
<td id="col200" class="cello"></td>
<td id="col201" class="cello"></td>
<td id="col202" class="cello"></td>
<td id="col203" class="cello"></td>
<td id="col204" class="cello"></td>
<td id="col205" class="cello"></td>
<td id="col206" class="cello"></td>
<td id="col207" class="cello"></td>
<td id="col208" class="cello"></td>
<td id="col209" class="cello"></td>
<td id="col210" class="cello"></td>
<td id="col211" class="cello"></td>
<td id="col212" class="cello"></td>
<td id="col213" class="cello"></td>
<td id="col214" class="cello"></td>
<td id="col215" class="cello"></td>
<td id="col216" class="cello"></td>
<td id="col217" class="cello"></td>
<td id="col218" class="cello"></td>
<td id="col219" class="cello"></td>
<td id="col220" class="cello"></td>
<td id="col221" class="cello"></td>
<td id="col222" class="cello"></td>
<td id="col223" class="cello"></td>
<td id="col224" class="cello"></td>
</tr>
<tr>
<td id="col225" class="cello"></td>
<td id="col226" class="cello"></td>
<td id="col227" class="cello"></td>
<td id="col228" class="cello"></td>
<td id="col229" class="cello"></td>
<td id="col230" class="cello"></td>
<td id="col231" class="cello"></td>
<td id="col232" class="cello"></td>
<td id="col233" class="cello"></td>
<td id="col234" class="cello"></td>
<td id="col235" class="cello"></td>
<td id="col236" class="cello"></td>
<td id="col237" class="cello"></td>
<td id="col238" class="cello"></td>
<td id="col239" class="cello"></td>
<td id="col240" class="cello"></td>
<td id="col241" class="cello"></td>
<td id="col242" class="cello"></td>
<td id="col243" class="cello"></td>
<td id="col244" class="cello"></td>
<td id="col245" class="cello"></td>
<td id="col246" class="cello"></td>
<td id="col247" class="cello"></td>
<td id="col248" class="cello"></td>
<td id="col249" class="cello"></td>
</tr>
<tr>
<td id="col250" class="cello"></td>
<td id="col251" class="cello"></td>
<td id="col252" class="cello"></td>
<td id="col253" class="cello"></td>
<td id="col254" class="cello"></td>
<td id="col255" class="cello"></td>
<td id="col256" class="cello"></td>
<td id="col257" class="cello"></td>
<td id="col258" class="cello"></td>
<td id="col259" class="cello"></td>
<td id="col260" class="cello"></td>
<td id="col261" class="cello"></td>
<td id="col262" class="cello"></td>
<td id="col263" class="cello"></td>
<td id="col264" class="cello"></td>
<td id="col265" class="cello"></td>
<td id="col266" class="cello"></td>
<td id="col267" class="cello"></td>
<td id="col268" class="cello"></td>
<td id="col269" class="cello"></td>
<td id="col270" class="cello"></td>
<td id="col271" class="cello"></td>
<td id="col272" class="cello"></td>
<td id="col273" class="cello"></td>
<td id="col274" class="cello"></td>
</tr>
<tr>
<td id="col275" class="cello"></td>
<td id="col276" class="cello"></td>
<td id="col277" class="cello"></td>
<td id="col278" class="cello"></td>
<td id="col279" class="cello"></td>
<td id="col280" class="cello"></td>
<td id="col281" class="cello"></td>
<td id="col282" class="cello"></td>
<td id="col283" class="cello"></td>
<td id="col284" class="cello"></td>
<td id="col285" class="cello"></td>
<td id="col286" class="cello"></td>
<td id="col287" class="cello"></td>
<td id="col288" class="cello"></td>
<td id="col289" class="cello"></td>
<td id="col290" class="cello"></td>
<td id="col291" class="cello"></td>
<td id="col292" class="cello"></td>
<td id="col293" class="cello"></td>
<td id="col294" class="cello"></td>
<td id="col295" class="cello"></td>
<td id="col296" class="cello"></td>
<td id="col297" class="cello"></td>
<td id="col298" class="cello"></td>
<td id="col299" class="cello"></td>
</tr>
<tr>
<td id="col300" class="cello"></td>
<td id="col301" class="cello"></td>
<td id="col302" class="cello"></td>
<td id="col303" class="cello"></td>
<td id="col304" class="cello"></td>
<td id="col305" class="cello"></td>
<td id="col306" class="cello"></td>
<td id="col307" class="cello"></td>
<td id="col308" class="cello"></td>
<td id="col309" class="cello"></td>
<td id="col310" class="cello"></td>
<td id="col311" class="cello"></td>
<td id="col312" class="cello"></td>
<td id="col313" class="cello"></td>
<td id="col314" class="cello"></td>
<td id="col315" class="cello"></td>
<td id="col316" class="cello"></td>
<td id="col317" class="cello"></td>
<td id="col318" class="cello"></td>
<td id="col319" class="cello"></td>
<td id="col320" class="cello"></td>
<td id="col321" class="cello"></td>
<td id="col322" class="cello"></td>
<td id="col323" class="cello"></td>
<td id="col324" class="cello"></td>
</tr>
<tr>
<td id="col325" class="cello"></td>
<td id="col326" class="cello"></td>
<td id="col327" class="cello"></td>
<td id="col328" class="cello"></td>
<td id="col329" class="cello"></td>
<td id="col330" class="cello"></td>
<td id="col331" class="cello"></td>
<td id="col332" class="cello"></td>
<td id="col333" class="cello"></td>
<td id="col334" class="cello"></td>
<td id="col335" class="cello"></td>
<td id="col336" class="cello"></td>
<td id="col337" class="cello"></td>
<td id="col338" class="cello"></td>
<td id="col339" class="cello"></td>
<td id="col340" class="cello"></td>
<td id="col341" class="cello"></td>
<td id="col342" class="cello"></td>
<td id="col343" class="cello"></td>
<td id="col344" class="cello"></td>
<td id="col345" class="cello"></td>
<td id="col346" class="cello"></td>
<td id="col347" class="cello"></td>
<td id="col348" class="cello"></td>
<td id="col349" class="cello"></td>
</tr>
<tr>
<td id="col350" class="cello"></td>
<td id="col351" class="cello"></td>
<td id="col352" class="cello"></td>
<td id="col353" class="cello"></td>
<td id="col354" class="cello"></td>
<td id="col355" class="cello"></td>
<td id="col356" class="cello"></td>
<td id="col357" class="cello"></td>
<td id="col358" class="cello"></td>
<td id="col359" class="cello"></td>
<td id="col360" class="cello"></td>
<td id="col361" class="cello"></td>
<td id="col362" class="cello"></td>
<td id="col363" class="cello"></td>
<td id="col364" class="cello"></td>
<td id="col365" class="cello"></td>
<td id="col366" class="cello"></td>
<td id="col367" class="cello"></td>
<td id="col368" class="cello"></td>
<td id="col369" class="cello"></td>
<td id="col370" class="cello"></td>
<td id="col371" class="cello"></td>
<td id="col372" class="cello"></td>
<td id="col373" class="cello"></td>
<td id="col374" class="cello"></td>
</tr>
<tr>
<td id="col375" class="cello"></td>
<td id="col376" class="cello"></td>
<td id="col377" class="cello"></td>
<td id="col378" class="cello"></td>
<td id="col379" class="cello"></td>
<td id="col380" class="cello"></td>
<td id="col381" class="cello"></td>
<td id="col382" class="cello"></td>
<td id="col383" class="cello"></td>
<td id="col384" class="cello"></td>
<td id="col385" class="cello"></td>
<td id="col386" class="cello"></td>
<td id="col387" class="cello"></td>
<td id="col388" class="cello"></td>
<td id="col389" class="cello"></td>
<td id="col390" class="cello"></td>
<td id="col391" class="cello"></td>
<td id="col392" class="cello"></td>
<td id="col393" class="cello"></td>
<td id="col394" class="cello"></td>
<td id="col395" class="cello"></td>
<td id="col396" class="cello"></td>
<td id="col397" class="cello"></td>
<td id="col398" class="cello"></td>
<td id="col399" class="cello"></td>
</tr>
<tr>
<td id="col400" class="cello"></td>
<td id="col401" class="cello"></td>
<td id="col402" class="cello"></td>
<td id="col403" class="cello"></td>
<td id="col404" class="cello"></td>
<td id="col405" class="cello"></td>
<td id="col406" class="cello"></td>
<td id="col407" class="cello"></td>
<td id="col408" class="cello"></td>
<td id="col409" class="cello"></td>
<td id="col410" class="cello"></td>
<td id="col411" class="cello"></td>
<td id="col412" class="cello"></td>
<td id="col413" class="cello"></td>
<td id="col414" class="cello"></td>
<td id="col415" class="cello"></td>
<td id="col416" class="cello"></td>
<td id="col417" class="cello"></td>
<td id="col418" class="cello"></td>
<td id="col419" class="cello"></td>
<td id="col420" class="cello"></td>
<td id="col421" class="cello"></td>
<td id="col422" class="cello"></td>
<td id="col423" class="cello"></td>
<td id="col424" class="cello"></td>
</tr>
<tr>
<td id="col425" class="cello"></td>
<td id="col426" class="cello"></td>
<td id="col427" class="cello"></td>
<td id="col428" class="cello"></td>
<td id="col429" class="cello"></td>
<td id="col430" class="cello"></td>
<td id="col431" class="cello"></td>
<td id="col432" class="cello"></td>
<td id="col433" class="cello"></td>
<td id="col434" class="cello"></td>
<td id="col435" class="cello"></td>
<td id="col436" class="cello"></td>
<td id="col437" class="cello"></td>
<td id="col438" class="cello"></td>
<td id="col439" class="cello"></td>
<td id="col440" class="cello"></td>
<td id="col441" class="cello"></td>
<td id="col442" class="cello"></td>
<td id="col443" class="cello"></td>
<td id="col444" class="cello"></td>
<td id="col445" class="cello"></td>
<td id="col446" class="cello"></td>
<td id="col447" class="cello"></td>
<td id="col448" class="cello"></td>
<td id="col449" class="cello"></td>
</tr>
<tr>
<td id="col450" class="cello"></td>
<td id="col451" class="cello"></td>
<td id="col452" class="cello"></td>
<td id="col453" class="cello"></td>
<td id="col454" class="cello"></td>
<td id="col455" class="cello"></td>
<td id="col456" class="cello"></td>
<td id="col457" class="cello"></td>
<td id="col458" class="cello"></td>
<td id="col459" class="cello"></td>
<td id="col460" class="cello"></td>
<td id="col461" class="cello"></td>
<td id="col462" class="cello"></td>
<td id="col463" class="cello"></td>
<td id="col464" class="cello"></td>
<td id="col465" class="cello"></td>
<td id="col466" class="cello"></td>
<td id="col467" class="cello"></td>
<td id="col468" class="cello"></td>
<td id="col469" class="cello"></td>
<td id="col470" class="cello"></td>
<td id="col471" class="cello"></td>
<td id="col472" class="cello"></td>
<td id="col473" class="cello"></td>
<td id="col474" class="cello"></td>
</tr>
<tr>
<td id="col475" class="cello"></td>
<td id="col476" class="cello"></td>
<td id="col477" class="cello"></td>
<td id="col478" class="cello"></td>
<td id="col479" class="cello"></td>
<td id="col480" class="cello"></td>
<td id="col481" class="cello"></td>
<td id="col482" class="cello"></td>
<td id="col483" class="cello"></td>
<td id="col484" class="cello"></td>
<td id="col485" class="cello"></td>
<td id="col486" class="cello"></td>
<td id="col487" class="cello"></td>
<td id="col488" class="cello"></td>
<td id="col489" class="cello"></td>
<td id="col490" class="cello"></td>
<td id="col491" class="cello"></td>
<td id="col492" class="cello"></td>
<td id="col493" class="cello"></td>
<td id="col494" class="cello"></td>
<td id="col495" class="cello"></td>
<td id="col496" class="cello"></td>
<td id="col497" class="cello"></td>
<td id="col498" class="cello"></td>
<td id="col499" class="cello"></td>
</tr>
<tr>
<td id="col500" class="cello"></td>
<td id="col501" class="cello"></td>
<td id="col502" class="cello"></td>
<td id="col503" class="cello"></td>
<td id="col504" class="cello"></td>
<td id="col505" class="cello"></td>
<td id="col506" class="cello"></td>
<td id="col507" class="cello"></td>
<td id="col508" class="cello"></td>
<td id="col509" class="cello"></td>
<td id="col510" class="cello"></td>
<td id="col511" class="cello"></td>
<td id="col512" class="cello"></td>
<td id="col513" class="cello"></td>
<td id="col514" class="cello"></td>
<td id="col515" class="cello"></td>
<td id="col516" class="cello"></td>
<td id="col517" class="cello"></td>
<td id="col518" class="cello"></td>
<td id="col519" class="cello"></td>
<td id="col520" class="cello"></td>
<td id="col521" class="cello"></td>
<td id="col522" class="cello"></td>
<td id="col523" class="cello"></td>
<td id="col524" class="cello"></td>
</tr>
<tr>
<td id="col525" class="cello"></td>
<td id="col526" class="cello"></td>
<td id="col527" class="cello"></td>
<td id="col528" class="cello"></td>
<td id="col529" class="cello"></td>
<td id="col530" class="cello"></td>
<td id="col531" class="cello"></td>
<td id="col532" class="cello"></td>
<td id="col533" class="cello"></td>
<td id="col534" class="cello"></td>
<td id="col535" class="cello"></td>
<td id="col536" class="cello"></td>
<td id="col537" class="cello"></td>
<td id="col538" class="cello"></td>
<td id="col539" class="cello"></td>
<td id="col540" class="cello"></td>
<td id="col541" class="cello"></td>
<td id="col542" class="cello"></td>
<td id="col543" class="cello"></td>
<td id="col544" class="cello"></td>
<td id="col545" class="cello"></td>
<td id="col546" class="cello"></td>
<td id="col547" class="cello"></td>
<td id="col548" class="cello"></td>
<td id="col549" class="cello"></td>
</tr>
<tr>
<td id="col550" class="cello"></td>
<td id="col551" class="cello"></td>
<td id="col552" class="cello"></td>
<td id="col553" class="cello"></td>
<td id="col554" class="cello"></td>
<td id="col555" class="cello"></td>
<td id="col556" class="cello"></td>
<td id="col557" class="cello"></td>
<td id="col558" class="cello"></td>
<td id="col559" class="cello"></td>
<td id="col560" class="cello"></td>
<td id="col561" class="cello"></td>
<td id="col562" class="cello"></td>
<td id="col563" class="cello"></td>
<td id="col564" class="cello"></td>
<td id="col565" class="cello"></td>
<td id="col566" class="cello"></td>
<td id="col567" class="cello"></td>
<td id="col568" class="cello"></td>
<td id="col569" class="cello"></td>
<td id="col570" class="cello"></td>
<td id="col571" class="cello"></td>
<td id="col572" class="cello"></td>
<td id="col573" class="cello"></td>
<td id="col574" class="cello"></td>
</tr>
<tr>
<td id="col575" class="cello"></td>
<td id="col576" class="cello"></td>
<td id="col577" class="cello"></td>
<td id="col578" class="cello"></td>
<td id="col579" class="cello"></td>
<td id="col580" class="cello"></td>
<td id="col581" class="cello"></td>
<td id="col582" class="cello"></td>
<td id="col583" class="cello"></td>
<td id="col584" class="cello"></td>
<td id="col585" class="cello"></td>
<td id="col586" class="cello"></td>
<td id="col587" class="cello"></td>
<td id="col588" class="cello"></td>
<td id="col589" class="cello"></td>
<td id="col590" class="cello"></td>
<td id="col591" class="cello"></td>
<td id="col592" class="cello"></td>
<td id="col593" class="cello"></td>
<td id="col594" class="cello"></td>
<td id="col595" class="cello"></td>
<td id="col596" class="cello"></td>
<td id="col597" class="cello"></td>
<td id="col598" class="cello"></td>
<td id="col599" class="cello"></td>
</tr>
<tr>
<td id="col600" class="cello"></td>
<td id="col601" class="cello"></td>
<td id="col602" class="cello"></td>
<td id="col603" class="cello"></td>
<td id="col604" class="cello"></td>
<td id="col605" class="cello"></td>
<td id="col606" class="cello"></td>
<td id="col607" class="cello"></td>
<td id="col608" class="cello"></td>
<td id="col609" class="cello"></td>
<td id="col610" class="cello"></td>
<td id="col611" class="cello"></td>
<td id="col612" class="cello"></td>
<td id="col613" class="cello"></td>
<td id="col614" class="cello"></td>
<td id="col615" class="cello"></td>
<td id="col616" class="cello"></td>
<td id="col617" class="cello"></td>
<td id="col618" class="cello"></td>
<td id="col619" class="cello"></td>
<td id="col620" class="cello"></td>
<td id="col621" class="cello"></td>
<td id="col622" class="cello"></td>
<td id="col623" class="cello"></td>
<td id="col624" class="cello"></td>
</tr>

</table>

<!--
<div id="mainmenu" class="menud" onclick="fSetMovable('mainmenu')">
    <p><h3>Ab's Kreative Korner</h3></p>
    <p><a href="#" onclick="fShow('txt1')">What?</a></p>
    <p><a href="#" onclick="fShow('txt2')">About</a></p>
    <p><a href="#" onclick="fShow('txt3')">Credits</a></p>
</div>

<div id="txt0" class="maind">
    <p>Welcome to Ab's Kreative Korner, this page is under construction as of <?php echo date('r'); ?> &nbsp; </p>
</div>

<div id="txt1" class="maind">
    <p>This page is a result of my experiments with Python, HTML, CSS and Javascript!</p>
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
-->

<div id="welcomediv" class="welcomed" onclick="fSetMovable('welcomediv')">
    <p><b>Welcome to Ab's Kreative Korner</b></p>
    <p><a href="./abmainpage.php">Click</a> to <a href="./abmainpage.php">continue</a>...</p>
</div>

<div id="jserror" class="jserror">
    <p>Please enable Javascript!</p>
</div>

<div id="fadeout" class="fadeout">
    <p>Written in Vim, and tested on Google Chrome and Mozilla Firefox.</p>
</div>

</body>
</html>

