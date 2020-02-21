function listMenu(obj) {
	var id=obj.id;
	if (id=='categories')
	{
		var x = document.getElementById("categoriesMenu");	
	}
		
	else if	(id=='user')
	{
		var x = document.getElementById("userMenu");
	}

  
    if (x.style.display === "block")
    {
        x.style.display = "none";
    }
    else
    {
        x.style.display = "block";
    }
} 