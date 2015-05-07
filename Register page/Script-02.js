function get_dates()
{
	var i;
	var option;
	var select=document.getElementById("date");
	var d=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
	
	for(i=30;i>=0;i--)
	{
		option=document.createElement("option");
		option.value=d[i];
		option.text=d[i];
		select.add(option,0);
	}
	
	option=document.createElement("option");
	option.value="0";
	option.text="Day";
	select.add(option,0);
	
	get_months();
	get_years();
}

function get_months()
{
	var i;
	var option;
	var m=["01","02","03","04","05","06","07","08","09","10","11","12"];
	var mon=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

	var select=document.getElementById("month");
	
	for(i=11;i>=0;i--)
	{
		option=document.createElement("option");

		option.value=m[i];
		option.text=mon[i];
		
		select.add(option,0);
	}
	
	option=document.createElement("option");
	option.value=0;
	option.text="Month";
	select.add(option,0);
}

function get_years()
{
	var i;
	var option;
	var y=["1954","1955","1956","1957","1958","1959","1960","1961","1962","1963","1964","1965","1966","1967","1968","1969","1970","1971","1972","1973","1974","1975","1976","1977","1978","1979","1980","1981","1982","1983","1984","1985","1986","1987","1988","1989","1990","1991","1992","1993","1994","1995","1996"];

	var select=document.getElementById("year");
	
	for(i=0;i<=42;i++)
	{
		option=document.createElement("option");
		option.value=y[i];
		option.text=y[i];
		select.add(option,0);
	}
	
	option=document.createElement("option");
	option.value=0;
	option.text="Year";
	select.add(option,0);
}

function empty(form)
{
	form.value="";
}
