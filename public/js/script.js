var materials=1;
var tools=1;
var steps=1;

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
		if (materials<=5){
			var x = document.getElementById("materialsList");
			var childX = document.createElement('li');
			childX.innerHTML = '<input id="materials" name="materials" class="inputText" type="text" style="width: 80%; margin: 6px 20px 6px 20px;"><i id="materialsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i>';
			x.appendChild(childX);
			materials++;
		}	
	}
	else if	(id=='toolsButton'){
		if(tools<=5){
			var x = document.getElementById("toolsList");
			var childX = document.createElement('li');
			childX.innerHTML = '<input id="tools" name="tools" class="inputText" type="text" style="width: 80%; margin: 6px 20px 6px 20px;"><i id="toolsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i>';
			x.appendChild(childX);
			tools++;
		}
		
	}
	else if	(id=='stepsButton'){
		if(steps<=5){
			steps++;
			var x = document.getElementById("stepsList");
			var childX = document.createElement('li');
			childX.setAttribute('id','step_'+steps);
			childX.setAttribute('class','steps');
			childX.innerHTML = '<h3 id="h3_'+steps+'">Krok '+steps+':</h3><i id="stepsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="float: right; margin-right: 20px;"></i><i class="fas fa-arrow-down" style="float: right; margin-right: 20px;"></i><i class="fas fa-arrow-up" style="float: right; margin-right: 20px;"></i></br><label>Zdjęcie</label></br><input id="input_'+steps+'" class="fileToUpload"  type="file" name="fileToUpload" onchange="loadPreview(this);"></br><img id="imagePreview" src="#" class="preview" height="100px"/></br><label>Opis</label><input id="description_'+steps+'" name="descriptionStep" class="inputText" type="text"><br/>';
			x.appendChild(childX);
		}
		
	}
}

function deleteFromList(obj){
	var id=obj.id;
	if (id=='materialsIcon'){
		materials--;
		obj.parentNode.parentNode.removeChild(obj.parentNode);
	}
	else if (id=='toolsIcon'){
		tools--;
		obj.parentNode.parentNode.removeChild(obj.parentNode);
	}
	else if(id=='stepsIcon'){
		
		steps--;
		obj.parentNode.parentNode.removeChild(obj.parentNode);
		var step=obj.parentNode.getAttribute('id');
		var idStep = step.substring(step.indexOf('_')+1, step.length);

		var ul = document.getElementById("stepsList");
		var items = ul.getElementsByTagName("li");
		
		for (var i = 0; i < items.length; ++i) {
			
			items[i].setAttribute('id','step_'+i);
			console.log(items[i]);

			items[i].firstElementChild.setAttribute('id','h3_'+i);
			document.getElementById('h3_'+i).innerHTML="Krok "+i+":";
			
			// do something with items[i], which is a <li> element
		}
		
	}

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

function loadPreview(input, id) {
    id = id || '.preview';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
			.attr('src', e.target.result)
			.height('auto');
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }

 