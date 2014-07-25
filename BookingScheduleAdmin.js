// JavaScript Document


var daysOfWeek = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var todayDate = new Date();
var todayDay = daysOfWeek[todayDate.getDay()];

function TodaysDay(day)
{
	return todayDay == day ? true:false;
}

//Setting the hours
var startHour = 480;
var hourInt = 0;
var minuteInt = 0;
var hour;
var minute;
var time;
var colOfTime = new Array();
var rangeOfTime = new Array();

//Calculating hours from 08:00 am to 22:00 pm
function CalculateHour()
{
	for(var i = 0;i < 43;i++)
	{
		hourInt = Math.floor(startHour/60);
		minuteInt = Math.round(startHour % 60);
		if(hourInt < 10)
		{
			hour = String.format("0"+hourInt);
		}
		else
		{
			hour = String.format(hourInt);	
		}
		if(minuteInt == 0)
		{
			minute = String.format("0"+minuteInt);
		}else{minute = String.format(minuteInt);}
		time = String.format(hour+":"+minute);
		colOfTime.push(time);
		startHour += 20;
	}
	ConvertToRangesOfHours();
}

//Converting hours into range of hours
function ConvertToRangesOfHours()
{
	for(var i= 0;i<43;i++)
	{
		var string = String.format(colOfTime[i]+"-"+colOfTime[i+1]);
		rangeOfTime.push(string);
	}
}

//Creating table header
function createTableHeader()
{
	CalculateHour();
	var firstRow = true;
	var rowCount = 1;
	var fieldCount = 8;
	var firstColumn = true;
	var tbl = "<div id = "+"schedule "+"><table>";
	for (var ri = 0; ri < rowCount ; ri++) 
	{
		tbl += "<tr>";

			for (var ci = 0; ci < fieldCount; ci++) 
			{
				if(firstRow)
				{
					if(firstColumn)
					{
						tbl+= "<td id="+"days"+"></td>";
						firstColumn = false;
					}
					else
					{
						if(TodaysDay(daysOfWeek[ci-1]))
						{
							tbl += "<td id="+"selectedDay"+">"+daysOfWeek[ci-1]+"</td>";
						}
						else 
						{
							tbl += "<td id="+"days"+">"+daysOfWeek[ci-1]+"</td>";
						}
					}
					
				}
			}
		tbl += "</tr>";
	}
	tbl += "</table>";
	return tbl;
}

//Creating the table of schedule which is scrollable
function createTable()
{
	var firstColumn = true;
	var rowCount = 42;
	var fieldCount = 8;
	var tbl = createTableHeader() + "<div class ="+"scroll"+"><table>";
	for (var ri = 0; ri < rowCount ; ri++) 
	{
		tbl += "<tr>";
		for (var ci = 0; ci < fieldCount; ci++) 
		{
			if(firstColumn)
			{
				tbl += "<td style = "+"font-weight:bold"+">"+rangeOfTime[parseInt(ci)+parseInt(ri)]+"</td>";
				firstColumn = false;
			}
			else
			{
				tbl += "<td><div class = "+"box"+" onclick = "+"BookARoom(this)"+" /></td>";
				if(ci == 7)
				{
					firstColumn = true;	
				}
			}
		}
		tbl += "</tr>";
	}
	tbl += "</table></div></div>";
	document.getElementById("schedule").innerHTML = tbl;	
}

//String Function for String Format
String.format = function() {
  var s = arguments[0];
  for (var i = 0; i < arguments.length - 1; i++) {       
	  var reg = new RegExp("\\{" + i + "\\}", "gm");             
	  s = s.replace(reg, arguments[i + 1]);
  }
  return s;
}

//Changing the color of boxes if occupied
function BookARoom(divObj)
{
	if(divObj.style.backgroundColor == '')
	{
		divObj.style.backgroundColor = 'red';
	}
	else
	{
		divObj.style.backgroundColor = '';
	}
}

// permission is granted to use this javascript provided that the below code is not altered
var pageLoaded = 0; 
window.onload = function() 
{
	pageLoaded = 1;
}

function loaded(i,f) 
{
	if (document.getElementById && document.getElementById(i) != null) f();
	else if (!pageLoaded) setTimeout('loaded(\''+i+'\','+f+')',100);
}

loaded('schedule',createTable);








 
