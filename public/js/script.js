
function listMenu(obj) {
	var id=obj.id;
	if (id=='categories'){
		var x = document.getElementById("categoriesMenu");	
	}	
	else if	(id=='user'){
		var x = document.getElementById("userMenu");
	}

  
    if (x.style.display === "block"){
        x.style.display = "none";
    }
    else{
        x.style.display = "block";
    }
}


function addToList(obj){
	var id=obj.id;
	if (id=='materialsButton'){
		var x = document.getElementById("materialsList");
		var childX = document.createElement('li');
		childX.innerHTML = '<input id="materials" name="materials" class="inputText" type="text" style="width: 80%; margin: 6px 20px 6px 20px;"><i class="fa fa-close" onclick="deleteFromList(this);"></i>';
		x.appendChild(childX);
	}
	else if	(id=='toolsButton'){
		var x = document.getElementById("toolsList");
		var childX = document.createElement('li');
		childX.innerHTML = '<input id="tools" name="tools" class="inputText" type="text" style="width: 80%; margin: 6px 20px 6px 20px;"><i class="fa fa-close" onclick="deleteFromList(this);"></i>';
		x.appendChild(childX);	
	}
	else if	(id=='stepsButton'){
		var x = document.getElementById("stepsList");
		var childX = document.createElement('li');
		childX.setAttribute('id','steps');
		childX.innerHTML = '<h3>Krok:</h3><i class="fa fa-close" onclick="deleteFromList(this);" style="float: right; margin-right: 20px;"></i><i class="fas fa-arrow-down" style="float: right; margin-right: 20px;"></i><i class="fas fa-arrow-up" style="float: right; margin-right: 20px;" onclick="replaceUp(this);"></i></br><label>Zdjęcie</label></br><textarea id="photo" name="photo" class="inputText" type="text" rows="4" cols="50"></textarea><br/><label>Opis</label><input id="descriptionStep" name="descriptionStep" class="inputText" type="text"><br/>';
		x.appendChild(childX);	
	}
}

function deleteFromList(obj){
	obj.parentNode.parentNode.removeChild(obj.parentNode);
}

function replaceUp(obj){
	//var x=obj.parentNode.parentNode.innerHTML;
//wychodzę do ul
	var id=obj.id;
	var x=obj.parentNode.innerHTML;
	var y= obj.parentNode.previousElementSibling.innerHTML;


	var tmp;
	tmp=x;
	x.innerHTML=y;
	y.innerHTML=tmp;

}

function replaceDown(obj){

}