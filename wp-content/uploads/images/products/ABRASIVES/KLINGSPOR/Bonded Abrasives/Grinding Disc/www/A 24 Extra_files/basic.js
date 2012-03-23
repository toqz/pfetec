//Begin dHTML Toolltip Timer
var tipTimer;
//End dHTML Toolltip Timer

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
var ns4=document.layers?1:0
var ie4=document.all?1:0
var ns6=document.getElementById&&!document.all?1:0

function ANZ_X(NAME,INDEX){ // der-hoelzemann.de
	document.all[NAME].style.left=(226)
	if (ie4||ns6) {
		var ziel =NAME;
		var X1 ="document.elementID(\"";
		var X2 = NAME;
		var X3 ="\").style.posLeft";
		var SOURCE = X1 + X2 + X3 ;
		var pos_X = eval(SOURCE);
		//alert (document.all[NAME].style.posLeft)
		document.all[NAME].style.left=(226)
	}else if (ns4){
		var ziel =NAME;
		var X1 ="document.images[\"";
		var X2 = NAME;
		var X3 ="\"].x";
		var SOURCE = X1 + X2 + X3 ;
		var pos_X = eval(SOURCE);
		alert (pos_X)
	}		
	
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function ZEIGEN(elemID){
	var obj
	if(document.all){
		obj = document.all(elemID)
	}else if(document.getElementByID){
		obj = document.getElementByID(elemID)
	}else if(document.layers){
		obj = document.layers[elemID]
	}
	
	if(obj){
		alert(obj.offsetTop + document.body.scrollLeft);
	}
}
function showhide(obj){
	var x = new getObj('testP');
	hide = !hide;
	x.style.visibility = (hide) ? 'hidden' : 'visible';
	setLyr(obj,'testP');
}

function setLyr(obj,lyr,EIN){
	var newX = findPosX(obj);
	var newY = findPosY(obj);
	if (lyr == 'testP') newY -= 50;
	var x = new getObj(lyr);
	if(ie4 || ns6){
		x.style.top = newY - 6;
	}else if (ns4){
		x.style.top = newY;
	}
	x.style.left = newX+155;
	LAYER_AUS(EIN)
	lyrAUS = lyr
}
function setLyrSUB(obj,lyr,EIN){
	var newX = findPosX(obj);
	var newY = findPosY(obj);
	if (lyr == 'testP') newY -= 50;
	var x = new getObj(lyr);
	if(ie4 || ns6){
		x.style.top = newY - 8;
	}else if (ns4){
		x.style.top = newY;
	}
	x.style.left = newX+18;
	LAYER_AUS(EIN)
	lyrAUS = lyr
}
function setLyrSUB2(obj,lyr,EIN,PART){
	var newX = findPosX(obj);
	var newY = findPosY(obj);
	var x = new getObj(lyr);
	if(ie4 || ns6){
		x.style.top = newY+20;
		x.style.left = newX-1;
	}else if (ns4){
		//x.style.top = newY+20;
	}
	
	LAYER_AUS(EIN,EIN,PART)
	lyrAUS = lyr
}
function setLyrSUB3(obj,lyr,EIN,PART){
	var newX = findPosX(obj);
	var newY = findPosY(obj);
	var x = new getObj(lyr);
	if(ie4 || ie5 || ns6){
		x.style.top = newY-1;
		x.style.left = newX+140;
	}else if (ns4){
		//x.style.top = newY+20;
	}
	
	LAYER_AUS(EIN,EIN,PART)
	lyrAUS = lyr
}
function setLyr2(lyr,newX,newY){
	var x = new getObj(lyr);
	if(ie4 || ns6){
		x.style.top = newY -5;
	}else if (ns4){
		x.style.top = newY;
	}
	x.style.left = newX;
}

function findPosX(obj){
	var curleft = 0;
	if (document.getElementById || document.all){
		while (obj.offsetParent){
			curleft += obj.offsetLeft
			obj = obj.offsetParent;
		}
	}else if (document.layers){
		curleft += obj.x;
	}
	return curleft;
}

function findPosY(obj){
	var curtop = 0;
	var printstring = '';
	if (document.getElementById || document.all){
		while (obj.offsetParent){
			printstring += ' element ' + obj.tagName + ' has ' + obj.offsetTop;
			curtop += obj.offsetTop
			obj = obj.offsetParent;
		}
	}	else if (document.layers)
		curtop += obj.y;
	//window.status = printstring;
	return curtop;
}
function findPosX2(obj,ZIEL){
	var curleft = 0;
	if (document.getElementById || document.all){
		while (obj.offsetParent){
			curleft += obj.offsetLeft
			obj = obj.offsetParent;
		}
	}else if (document.layers)
		curleft += obj.x;
		var X1 ="document.";
		var X2 = ZIEL;
		var X3 =".pos_X.value = ";
		var SOURCE = X1 + X2 + X3 + curleft;
		eval(SOURCE);		
}
function findPosY2(obj,ZIEL){
	var curtop = 0;
	var printstring = '';
	if (document.getElementById || document.all){
		while (obj.offsetParent){
			printstring += ' element ' + obj.tagName + ' has ' + obj.offsetTop;
			curtop += obj.offsetTop
			obj = obj.offsetParent;
		}
	}else if (document.layers)
		curtop += obj.y;
		var X1 ="document.";
		var X2 = ZIEL;
		var X3 =".pos_Y.value = ";
		var SOURCE = X1 + X2 + X3 + curtop;
		eval(SOURCE);	
}


function getObj(name){
 if (document.getElementById){
	   this.obj = document.getElementById(name);
	   this.style = document.getElementById(name).style;
 } else if (document.all){
	   this.obj = document.all[name];
	   this.style = document.all[name].style;
 } else if (document.layers){
	   if (document.layers[name]){
		   	this.obj = document.layers[name];
		   	this.style = document.layers[name];
	   }else{
		    this.obj = document.layers.testP.layers[name];
		    this.style = document.layers.testP.layers[name];
	   }
 }
}
function MM_showHideLayers() { //v3.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }
}

function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
//**************************************************************************************************************




//**************************************************************************************************************
function locateObject(n, d) { //v3.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=locateObject(n,d.layers[i].document); return x;
}

function hideTooltip(object)
{
if (document.all)
{
	locateObject(object).style.visibility="hidden"
	locateObject(object).style.left = 1;
	locateObject(object).style.top = 1;
return false
}
else if (document.layers)
{
	locateObject(object).visibility="hide"
	locateObject(object).left = 1;
	locateObject(object).top = 1;
	return false
}
else
	return true
}

function showTooltip(object,e, tipContent, backcolor, bordercolor, textcolor, displaytime)
{
	window.clearTimeout(tipTimer)
	
	if (document.all)
		{
			locateObject(object).style.top=document.body.scrollTop+event.clientY+20
			
			locateObject(object).innerHTML='<table style="font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 11px; border: '+bordercolor+'; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; background-color: '+backcolor+'" width="10" border="0" cellspacing="1" cellpadding="1"><tr><td nowrap><font style="font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 11px; color: '+textcolor+'">'+unescape(tipContent)+'</font></td></tr></table> '

			if ((e.x + locateObject(object).clientWidth) > (document.body.clientWidth + document.body.scrollLeft))
				{	
					locateObject(object).style.left = (document.body.clientWidth + document.body.scrollLeft) - locateObject(object).clientWidth-10;
				}
			else
			{
			locateObject(object).style.left=document.body.scrollLeft+event.clientX
			}
		locateObject(object).style.visibility="visible"
		tipTimer=window.setTimeout("hideTooltip('"+object+"')", displaytime);
		return true;
		}
	else if (document.layers)
		{
		locateObject(object).document.write('<table width="10" border="0" cellspacing="1" cellpadding="1"><tr bgcolor="'+bordercolor+'"><td><table width="10" border="0" cellspacing="0" cellpadding="2"><tr bgcolor="'+backcolor+'"><td nowrap><font style="font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 11px; color: '+textcolor+'">'+unescape(tipContent)+'</font></td></tr></table></td></tr></table>')
		locateObject(object).document.close()
		locateObject(object).top=e.y+20

		if ((e.x + locateObject(object).clip.width) > (window.pageXOffset + window.innerWidth))
			{
				locateObject(object).left = window.innerWidth - locateObject(object).clip.width-10;
			}
		else
			{
			locateObject(object).left=e.x;
			}
		locateObject(object).visibility="show"
		tipTimer=window.setTimeout("hideTooltip('"+object+"')", displaytime);
		return true;
	}
	else
	{
		return true;
	}
}
//***************************************************************************************************************************
function return_html(text){
	var return_string;
	var regex = new RegExp("&lt;","g");
	returnstring =  text.replace(regex, "<");
	regex = new RegExp("&gt;","g");
	return returnstring.replace(regex, ">");
}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
