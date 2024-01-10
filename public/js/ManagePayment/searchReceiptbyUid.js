	var role = document.getElementById("role").value;
	
	document.getElementById("type").addEventListener("change",function()
	{
		if(document.getElementById("date").selected==true)
		{
			var month = document.getElementById("month").value;
			var year = document.getElementById("year").value;
			
			document.getElementById("month").disabled = false;
			document.getElementById("year").disabled = false;
			
			//show receipt by date
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", '/staff/'+role+'/refreshReceipt?month='+month+'&type=date&year='+year, true);
			xhttp.send();
			xhttp.onreadystatechange = function() 
			{
				if (this.readyState == 4 && this.status == 200) 
				{
					$('#tbody').empty();
					$('#tbody').prepend(xhttp.responseText);
				}
			};
			
		}
		else
		{
			var uid = document.getElementById("uid").value;
			
			document.getElementById("month").disabled = true;
			document.getElementById("year").disabled = true;
			
			//show all receipt
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", '/staff/'+role+'/refreshReceipt?uid='+uid+'&type=all', true);
			xhttp.send();
			xhttp.onreadystatechange = function() 
			{
				if (this.readyState == 4 && this.status == 200) 
				{
					$('#tbody').empty();
					$('#tbody').prepend(xhttp.responseText);
				}
			};			
		}

	});
	
	document.getElementById("month").addEventListener("change",function()
	{
		var month = document.getElementById("month").value;
		var year = document.getElementById("year").value;
		
		//show receipt by date
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", '/staff/'+role+'/refreshReceipt?month='+month+'&type=date&year='+year, true);
		xhttp.send();
		xhttp.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				$('#tbody').empty();
				$('#tbody').prepend(xhttp.responseText);
			}
		};		
		
	});
	
	document.getElementById("year").addEventListener("change",function()
	{
		var month = document.getElementById("month").value;
		var year = document.getElementById("year").value;
		
		//show receipt by date
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", '/staff/'+role+'/refreshReceipt?month='+month+'&type=date&year='+year, true);
		xhttp.send();
		xhttp.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				$('#tbody').empty();
				$('#tbody').prepend(xhttp.responseText);
			}
		};	
	});