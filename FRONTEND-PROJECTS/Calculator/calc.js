var a=[1,2];
for(var i=0;i<20;i++)
{
	a[i]=null;
}
var m=document.getElementById('blank');
function num(d)
{
	for(var j=0;j<100;j++)
	{
		if(a[j]==null)
		{
			a[j]=d;
			break;
		}
	}
}
function do1()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row11').value;
	num('1');
	
}
function do2()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row12').value;
	num('2');
}
function do3()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row13').value;
	
	num('3');
	
	
}
function do4()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row21').value;
	num('4');
	
}
function do5()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row22').value;
	num('5');
}
function do6()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row23').value;
	num('6');
	
	
}
function do7()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row31').value;
	num('7');
	
}
function do8()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row32').value;
	num('8');
	
}
function do9()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row33').value;
	num('9');
	
}
function doa()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row14').value;
	num('+');
}
function dos()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row24').value;
	num('-');
	
	
}
function dom()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row34').value;
	num('*');
}
function dod()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row44').value;
	num('/');
	
}
function do0()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row41').value;
	num('0');
	
}
function dodot()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row42').value;
	num('.');
	
	
}
function doe()
{
	document.getElementById('blank').innerHTML+=document.getElementById('Row43').value;
	num('=');
	var x="";
	var z;
	var y="";
	var dummy=1;
	for(var k=0;k<100;k++)
	{
		if(a[k]=="+" || a[k]=="-" || a[k]=="*" || a[k]=="/")
		{
			z=a[k];
			dummy=k;
			break;
		}
		x+=a[k];
	}
	for(var k=dummy+1;k<dummy+50;k++)
	{
		if(a[k]=="=")
		{
			
			break;
		}
		y+=a[k];
	}
	var x2=parseFloat(x);
	var y2=parseFloat(y);
	if(x2==NaN||y2==NaN)
		alert("Enter appropriate value");
	if(z=="+")
		m.innerHTML=x2+y2;
	if(z=="-")
		m.innerHTML=x2-y2;
	if(z=="*")
		m.innerHTML=x2*y2;
	if(z=="/")
		m.innerHTML=x2/y2;
	
	
}
