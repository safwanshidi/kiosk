	var confirm = document.getElementById('confirm-btn');
	var save = document.getElementById('save-btn');
    var amount  = document.getElementById('amount');
    var confirmModel = document.getElementById('saveModal');
    var succesModal = document.getElementById('sucessModal');
	var pattern = /^[0-9]+(\.[0-9]{0,2})?$/;
	
	
	save.addEventListener("click",function()
	{
		document.getElementById("amount-text").innerHTML="Are you sure modify monthly amount to RM "+amount.value;
	})
	confirm.addEventListener("click",function()
    {
	   
       if(amount.value== "")
       {
			alert("Please insert number");       
       }
       else if(pattern.test(amount.value))
       {
            var parsAmount = Number(amount.value);

            if(parsAmount>=0)
            {

                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","/staff/bursary/updateAmount?amount="+parsAmount,false);
                xmlhttp.send();
                var affected = xmlhttp.responseText;  

               if(affected=="1")
               {
                   
                   var modal = bootstrap.Modal.getInstance(confirmModel) 
                   modal.hide();
                   var modalSuccess = bootstrap.Modal.getOrCreateInstance(succesModal) 
                   modalSuccess.show();

               }
                          
            }
            else
            {
                alert("Please insert valid price");
            }
       }
	   else
	   {
		   alert("Please insert valid price");
	   }
        

    });	