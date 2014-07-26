// JavaScript Document
var theMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var daysPerMonth = [];
var datesPerWeek = [];
var daysOfWeek = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var todayDate = new Date();
var todayDay = daysOfWeek[todayDate.getDay()];

function TodaysDay(day)
{
	return todayDay == day ? true:false;
}
// number of days in the month
function getMonthLen(theYear, theMonth) 
{
    var oneDay = 1000 * 60 * 60 * 24;
    var thisMonth = new Date(theYear, theMonth, 1);
    var nextMonth = new Date(theYear, theMonth + 1, 1);
    var len = Math.ceil((nextMonth.getTime() - thisMonth.getTime())/oneDay);
    return len;
}
//Calculating days per month
for(var i = 0; i < 12; i++)
{
	daysPerMonth.push(getMonthLen(todayDate.getFullYear(),i));
}

ReturnDate();
function ReturnDate()
{
	var date = todayDate.getDate();
	for(var i = 0; i < daysOfWeek.length;i++)
	{
		if(i == todayDate.getDay())
		{
			datesPerWeek.push(DateFormat(date,todayDate.getMonth()+1,todayDate.getFullYear()));
		}
		else
		{
			var relative = todayDate.getDay() - i;
			var days = daysPerMonth[todayDate.getMonth()];
			if(date - relative > days)
			{
				var overflowedDays = (days - date) + relative;
				datesPerWeek.push(DateFormat(overflowedDays,todayDate.getMonth()+2,todayDate.getFullYear()));
			}
			else
			{
				datesPerWeek.push(DateFormat(date - relative,todayDate.getMonth()+1,todayDate.getFullYear())); 
			}
		}
	}
}
function Return()
{
	var string;
	for(var i in daysPerMonth)
	{
		string += daysPerMonth[i]+"<br />";
	}
	document.getElementById('test').innerHTML = DateFormat(01,10,2014);
}
function DateFormat(date,month,year)
{
	return date+"/"+month+"/"+year;
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
	var rowCount = 2;
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
				else
				{
					if(firstColumn)
					{
						tbl += "<td id = "+"days"+"></td>";	
						firstColumn = false;
					}
					else
					{
						tbl += "<td id="+"days"+">"+datesPerWeek[ci-1]+"</td>";
					}
				}
				
			}
			firstRow = false;
			firstColumn = true;
			
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
		if (confirm("Are you sure you want to book this room ?") == true) 
		{
        	//Book a room
			divObj.style.backgroundColor = 'red';
    	} 
		else 
		{
        	
		}
	}
	else
	{
		alert("Sorry, room is already booked :( ");
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








 
