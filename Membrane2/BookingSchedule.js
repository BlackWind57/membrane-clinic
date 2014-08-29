// JavaScript Document
var theMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var daysPerMonth = [];
var datesPerWeek = [];
var daysOfWeek = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var todayDate = new Date();
var todayDay = daysOfWeek[todayDate.getDay()];

//Checking whether the day is today
function TodaysDay(fullDate)
{
	var curDate = todayDate.getDate();var curMonth = todayDate.getMonth() + 1; var curYear = todayDate.getFullYear();
	var selectedDate = fullDate.split("/");
	if(curDate == selectedDate[0] && curMonth == selectedDate[1] && curYear == selectedDate[2])
	{
		return true;
	}
	return false;
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
//Calculating the dates in one week
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
				var overflowedDays = (date - relative) - days;
				datesPerWeek.push(DateFormat(overflowedDays,todayDate.getMonth()+2,todayDate.getFullYear()));
			}
			else
			{
				datesPerWeek.push(DateFormat(date - relative,todayDate.getMonth()+1,todayDate.getFullYear())); 
			}
		}
	}
}
//Calculating the dates for next week
function nextWeek()
{
	for(var i in datesPerWeek)
	{
		var selectedDate = datesPerWeek[i].split("/");
		if( parseInt(selectedDate[0]) + 7 > parseInt(daysPerMonth[selectedDate[1]-1]))
		{
			var overflowed = (parseInt(selectedDate[0]) + 7) - parseInt(daysPerMonth[selectedDate[1]-1]);
			datesPerWeek[i] = DateFormat(overflowed, parseInt(selectedDate[1]) + 1, selectedDate[2]);
		}
		else
		{
			datesPerWeek[i] = DateFormat(parseInt(selectedDate[0]) + 7, selectedDate[1], selectedDate[2]);
		}
	}
	createTable();
}
//Calculating the dates for last week
function lastWeek()
{
	for(var i in datesPerWeek)
	{
		var selectedDate = datesPerWeek[i].split("/");
		if(parseInt(selectedDate[0]) - 7 < 1)
		{
			var relative = parseInt(selectedDate[0]) - 7;
			datesPerWeek[i] = DateFormat(daysPerMonth[selectedDate[1]-2] + relative, parseInt(selectedDate[1] - 1), selectedDate[2]);
		}
		else
		{
			datesPerWeek[i] = DateFormat(parseInt(selectedDate[0] - 7), selectedDate[1], selectedDate[2]);
		}
	}
	createTable();
}
//The standard format of date
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

//String Function for String Format
String.format = function() {
  var s = arguments[0];
  for (var i = 0; i < arguments.length - 1; i++) {       
	  var reg = new RegExp("\\{" + i + "\\}", "gm");             
	  s = s.replace(reg, arguments[i + 1]);
  }
  return s;
}

//Creating table header
function createTableHeader()
{
	CalculateHour();
	var firstRow = true;
	var rowCount = 2;
	var fieldCount = 8;
	var firstColumn = true;
	var tbl = "<div id = "+"schedule "+"><table id = "+"tableHeader"+">";
	for (var ri = 0; ri < rowCount ; ri++) 
	{
		tbl += "<tr>";

			for (var ci = 0; ci < fieldCount; ci++) 
			{
				if(firstRow)
				{
					if(firstColumn)
					{
						tbl+= "<th id="+"days"+">Date/Time</th>";
						firstColumn = false;
					}
					else
					{
						if(TodaysDay(datesPerWeek[ci-1]))
						{
							tbl += "<th id="+"selectedDay"+">"+daysOfWeek[ci-1]+"</th>";
						}
						else 
						{
							tbl += "<th id="+"days"+">"+daysOfWeek[ci-1]+"</th>";
						}
					}
				}
				else
				{
					if(firstColumn)
					{
						tbl += "<th id = "+"days"+"></th>";	
						firstColumn = false;
					}
					else
					{
						tbl += "<th id="+"days"+">"+datesPerWeek[ci-1]+"</th>";
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
	var firstRow = true;
	var rowCount = 42;
	var fieldCount = 8;
	var tbl = createTableHeader() + "<div class ="+"scroll"+"><table id = "+"bookingTable"+">";
	for (var ri = 0; ri < rowCount ; ri++) 
	{
		tbl += "<tr>";
		for (var ci = 0; ci < fieldCount; ci++) 
		{
			if(firstColumn && firstRow)
			{
				tbl+= "<td id="+"days"+">Date/Time</td>";
				firstColumn = false;
			}
			else if(firstRow)
			{
				tbl += "<td id="+"days"+">"+datesPerWeek[ci-1]+"</td>";
				if(ci == 7)
				{
					firstColumn = true;
					firstRow = false;
				}
			}
			else if(firstColumn)
			{
				tbl += "<td class ="+"time"+" style = "+"font-weight:bold"+">"+rangeOfTime[parseInt(ci)+parseInt(ri)]+"</td>";
				firstColumn = false;
			}
			else
			{

				if(ri == 12 || ri == 13){tbl += "<td class ="+"check"+"><div class = "+"break"+" /></td>";}
				else{tbl += "<td class ="+"check"+"><div class = "+"box"+" /></td>";}
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
	onTableClick();
	RetrieveDb();
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
loaded('doctorSelection',createDropMenu);

var valueFromDb = new Array();

function onTableClick()
{
	$('#bookingTable').on('click', 'td', function(e) 
	{
		if($(this).find('div').hasClass('box'))
		{
			var regTime  = this.parentNode.cells[0];
			var regDay = e.delegateTarget.rows[0].cells[this.cellIndex];
			var doctor = $('#doctorSelect');
			var name = $('#name').val();
			var phone = $('#phone').val();
			var age = $('#age').val();
			alert($(regDay).text()+' '+$(regTime).text()+' '+$(doctor).val()+' '+name+' '+phone+' '+age);
			if(name.value && phone.value && age.value)
			{
				if(confirm("Are you sure you want to book this room ?") == true)
				{
					$(this).find('div').css('background-color','red');
					$.post('appointmentsubmit.php', { registDay: $(regDay).text() , 
					registTime: $(regTime).text(), registDoctor: $(doctor).val() }, 
					function(data) {alert( data );})
				}
			}
			else
			{
				alert("You need to fill in the name, age, and phone textbox");
			}
		}
	});
}

function RetrieveDb()
{	
	$('body').ready(function(e) {
		$.ajax({
			type:"GET",
			url:"RetrievingDatabase.php",
			dataType:"json",
			success: function(response)
			{
				valueFromDb = response.slice();
				alert('retrieved from database');
				ConvertToTable();
			}
		});
	});
}

function ConvertToTable()
{
	var rowCount = 0;
	$('#bookingTable tr td').each(function() 
	{
		if(rowCount > 7)
		{
			rowCount = 0;
		}
		var regTime  = $(this).closest('tr').children(':first');
		var regDay = $(this).closest('tr').parent().children(':first').children('td:eq('+rowCount+')');
		rowCount++;
		for(var i = 0; i < valueFromDb.length; i++)
		{
			var date = valueFromDb[i].split('|')[0];
			var time = valueFromDb[i].split('|')[1];
			var doctor = valueFromDb[i].split('|')[3];
			if(date == $(regDay).text() && time == $(regTime).text() && doctor == $('#doctorSelect').val())
			{
				$(this).find('div').css('backgroundColor','rgb(255,0,0)');
			}
		}
	});
}

function onChange()
{
	clearTable();
	RetrieveDb();
}

function clearTable()
{
	$('#bookingTable tr td').each(function()
	{
		$(this).find('div').css('backgroundColor','');
	});
}
 
