	document.addEventListener("DOMContentLoaded", function() 
	{
		var back = document.getElementById("back-btn");
		
		back.addEventListener("click",function()
		{
			window.history.back();
		})
		
	});