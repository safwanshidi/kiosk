	$(document).ready(function()
	{
		
	  $("#pay-btn").click(function(){
		  
		  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
		  var total = 0;
		  
		   checkboxes.forEach(function (checkbox)
		   {
			   //if selected,sum up all selected items
			   if(checkbox.checked)
			   {
				   var row = checkbox.closest('tr');
				   var cellValue = row.cells[2].textContent;
				   
				   total = Number(cellValue)+total;
				   total = Number(total.toFixed(2));
				   
			   }
		   });
		   
		   
		   var amountText = $("#amount-text");
		   amountText.text("Are you sure to pay RM "+total);

		   
	  });
	 
	});