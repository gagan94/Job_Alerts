function clear(form)
{
	var i=form.options.length-1;
	
	while(i>=0)
	{
		form.remove(i);
		i--;
	}
}

function drop_1()
{
	var rad=document.getElementsByName("loc");
	for(var i=0;i<rad.length;i++)
	{
		rad[i].checked=false;
	}
	var form=document.getElementById("locations");
	if((form.options[form.selectedIndex].value)==100)
	{
		rad[0].checked=true;
	}
	form.form.submit();
}

function get_courses(form)
{
	var select_1=document.getElementById("courses");
	var select_2=document.getElementById("branch");
	clear(select_1);
	clear(select_2);
	
	var option=document.createElement("option");
	var value=form.options[form.selectedIndex].value;
	
	if(value==1)
	{
		var i;
		
		for(i=3;i>=1;i--)
		{
			option=document.createElement("option");
			option.value=i;
			
			if(i==1)
			{
				option.text="10th/Equivalent";
			}
			
			else if(i==2)
			{
				option.text="11th/Equivalent";
			}
			
			else if(i==3)
			{
				option.text="12th/Equivalent";
			}
			
			select_1.add(option,0);
		}
	}
	
	else if(value==2)
	{
		var i;
		
		for(i=16;i>=11;i--)
		{
			option=document.createElement("option");
			option.value=i;
			
			if(i==11)
			{
				option.text="Civil Engineering";
			}
	
			else if(i==12)
			{
				option.text="Chemical Engineering";
			}

			else if(i==13)
			{
				option.text="Computer Science and Engg";
			}

			else if(i==14)
			{
				option.text="Electrical and Electronics Engineering";
			}
	
			else if(i==15)
			{
				option.text="Electronics and Communication Engineering";
			}

			else if(i==16)
			{
				option.text="Mechanical Engineering";
			}
			
			select_1.add(option,0);
		}
	}
	
	else if(value==3)
	{
		var i;
		
		for(i=35;i>=31;i--)
		{
			option=document.createElement("option");
			option.value=i;
			
			if(i==31)
			{
				option.text="Bachelor of Arts";
			}
		
			else if(i==32)
			{
				option.text="Bachelor of Commerce";
			}

			else if(i==33)
			{
				option.text="Bachelor of Computer Applications";
			}

			else if(i==34)
			{
				option.text="Bachelor of Engineering";
			}

			else if(i==35)
			{
				option.text="Bachelor of Science";
			}
			
			select_1.add(option,0);
		}
	}
	
	else if(value==4)
	{
		var i;
		
		for(i=55;i>=51;i--)
		{
			option=document.createElement("option");
			option.value=i;
			
			if(i==51)
			{
				option.text="Master of Arts";
			}
		
			else if(i==52)
			{
				option.text="Master of Commerce";
			}

			else if(i==53)
			{
				option.text="Master of Computer Applications";
			}

			else if(i==54)
			{
				option.text="Master of Technology";
			}

			else if(i==55)
			{
				option.text="Master of Science";
			}

			select_1.add(option,0);			
		}
	}
	
	option=document.createElement("option");
	option.value="0";
	option.text="Select course";
	select_1.add(option,0);
}

function get_branches(form)
{
	var select=document.getElementById("branch");
	clear(select);
	
	var value=form.options[form.selectedIndex].value;
	
	if(value<30 || value==33 || value==53)
	{
		var option=document.createElement("option");
		
		if(value==33)
		{
			option.value=301;
		}
		
		else if(value==53)
		{
			option.value=5301;
		}
		
		else
		{
			option.value=value;
		}
		
		select.selectedIndex=0;
		select.add(option,0);
		alert(select.options[select.selectedIndex].value);
	}
	
	else if(value>30 && (value!=33 || value!=53))
	{
		var option=document.createElement("option");
		
		if(value==31)
		{
			var i;
			
			for(i=104;i>=101;i--)
			{
				var option=document.createElement("option");
				option.value=i;

				if(i==101)
				{
					option.text="Economics";
				}

				else if(i==102)
				{
					option.text="Hotel Management";
				}
				
				else if(i==103)
				{
					option.text="Journalism";
				}
				
				else if(i==104)
				{
					option.text="Political Science";
				}
				
				select.add(option,0);
			}
		}
		
		else if(value==32)
		{
			var i;
			
			for(i=204;i>=201;i--)
			{
				var option=document.createElement("option");
				option.value=i;

				if(i==201)
				{
					option.text="Banking and Finance";
				}

				else if(i==202)
				{
					option.text="Business Administration";
				}

				else if(i==203)
				{
					option.text="Cost & Works Accounting";
				}

				else if(i==204)
				{
					option.text="Marketing Management";
				}
				
				select.add(option,0);
			}			
		}
		
		else if(value==34)
		{
			var i;
			
			for(i=406;i>=401;i--)
			{
				var option=document.createElement("option");
				option.value=i;

				if(i==401)
				{
					option.text="Civil Engineering";
				}

				else if(i==402)
				{
					option.text="Computer Science";
				}

				else if(i==403)
				{
					option.text="Information Science";
				}

				else if(i==404)
				{
					option.text="Electrical & Electronics";
				}

				else if(i==405)
				{
					option.text="Electronics & Communication";
				}
				
				else if(i==406)
				{
					option.text="Mechanical Engineering";
				}
				
				select.add(option,0);
			}
		}
		
		else if(value==35)
		{
			var i;
			
			for(i=504;i>=501;i--)
			{
				var option=document.createElement("option");
				option.value=i;
				
				if(i==501)
				{
					option.text="Home Science";
				}
				
				else if(i==502)
				{
					option.text="Bio-Chemistry";
				}
				
				else if(i==504)
				{
					option.text="Electronics";
				}
				
				else if(i==503)
				{
					option.text="Mathematics";
				}
				
				select.add(option,0);
			}
		}
		
		else if(value==51)
		{
			var i;
			
			for(i=5104;i<=5101;i--)
			{
				var option=document.createElement("option");
				option.value=i;
				
				if(i==5101)
				{
					option.text="History";
				}
				
				else if(i==5102)
				{
					option.text="Kannada";
				}
				
				else if(i==5103)
				{
					option.text="English";
				}
				
				else if(i==5104)
				{
					option.text="Economics";
				}
				
				select.add(option,0);
			}
		}
		
		else if(value==52)
		{
			var i;
			
			for(i=5204;i>=5201;i--)
			{
				var option=document.createElement("option");
				option.value=i;
				
				if(i==5201)
				{
					option.text="Business Environment";
				}
				
				else if(i==5202)
				{
					option.text="E-Commerce";
				}
				
				else if(i==5203)
				{
					option.text="Financial Management";
				}
				
				else if(i==5204)
				{
					option.text="Statistical Analysis";
				}
				
				select.add(option,0);
			}
		}
		
		else if(value==53)
		{
			var i;
		}
		
		else if(value==54)
		{
			var i;
			
			for(i=5404;i>=5401;i--)
			{
				var option=document.createElement("option");
				option.value=i;
				
				if(i==5402)
				{
					option.text="Engineering Materials";
				}
				
				else if(i==5401)
				{
					option.text="Digital Communication";
				}
				
				else if(i==5403)
				{
					option.text="Thermal Engineering";
				}
				
				else if(i==5404)
				{
					option.text="Transportation Engineering";
				}
				
				select.add(option,0);
			}
		}
		
		else if(value==55)
		{
			var i;
			
			for(i=5505;i>=5501;i--)
			{
				var option=document.createElement("option");
				option.value=i;
				
				if(i==5501)
				{
					option.text="Physics";
				}
				
				else if(i==5502)
				{
					option.text="Chemistry";
				}
				
				else if(i==5503)
				{
					option.text="Electronics";
				}
				
				else if(i==5504)
				{
					option.text="Mathematics";
				}
				
				else if(i==5505)
				{
					option.text="Biology";
				}
				
				select.add(option,0);
			}			
		}
	}
	
	option=document.createElement("option");
	option.value="0";
	option.text="Select course";
	select.add(option,0);
}

function get_values(form)
{
	var value=form.options[form.selectedIndex].value;
	
	alert(value);
}