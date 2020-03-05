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
			childX.innerHTML = '<input id="materials" name="materials" class="inputText" type="text" style="width: 80%; margin: 6px 15px 6px 20px;"><i id="materialsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i>';
			x.appendChild(childX);
			materials++;
		}	
	}
	else if	(id=='toolsButton'){
		if(tools<=5){
			var x = document.getElementById("toolsList");
			var childX = document.createElement('li');
			childX.innerHTML = '<input id="tools" name="tools" class="inputText" type="text" style="width: 80%; margin: 6px 15px 6px 20px;"><i id="toolsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i>';
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
			childX.innerHTML = '<h3 id="h3_'+steps+'">Krok '+steps+':</h3><i id="stepsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="float: right; margin-right: 20px;"></i><i class="fas fa-arrow-down" onclick="replaceDown(this);" style="float: right; margin-right: 20px;"></i><i class="fas fa-arrow-up" onclick="replaceUp(this);" style="float: right; margin-right: 20px;"></i></br><label>Zdjęcie</label></br><input id="input_'+steps+'" class="fileToUpload"  type="file" name="fileToUpload" onchange="loadPreview(this);"></br><img id="imagePreview_'+steps+'" src="#" class="preview" height="200px"/></br><label>Opis</label><input id="description_'+steps+'" name="descriptionStep" class="inputText" type="text"><br/>';
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
	else if (id=='stepsIcon'){
		steps--;
		obj.parentNode.parentNode.removeChild(obj.parentNode);
		changeId();
	}
}

function replaceUp(obj){
	var idStep= obj.parentNode.id;
	var number = idStep.substring(idStep.indexOf('_')+1, idStep.length);
	var numberPrevious=number-1;

	var list = document.getElementById('stepsList');

	if (numberPrevious==0){
		return;
	}
	else {
		list.insertBefore(document.getElementById("step_"+number),list.childNodes[numberPrevious]);
		changeId();
	}
	
}

function replaceDown(obj){
	var idStep= obj.parentNode.id;
	var number = idStep.substring(idStep.indexOf('_')+1, idStep.length);
	var numberNext=number-(-1);

	var list = document.getElementById('stepsList');
	var listLenght=document.getElementById("stepsList").getElementsByTagName("li").length;

	if (numberNext>listLenght){
		return;
	}
	else {
		list.insertBefore(document.getElementById("step_"+numberNext),list.childNodes[number]);
		changeId();
	}
}

function changeId(){
	var list = document.getElementById("stepsList");
	var items = list.getElementsByTagName("li");
		
	var temp=1;
	for (var i = 0; i < items.length; ++i){
			
		items[i].setAttribute('id','step_'+temp);

		items[i].firstElementChild.setAttribute('id','h3_'+temp);
		document.getElementById('h3_'+temp).innerHTML="Krok "+temp+":";
			
		items[i].children[7].setAttribute('id','input_'+temp);
		items[i].children[9].setAttribute('id','imagePreview_'+temp);
		items[i].children[12].setAttribute('id','description_'+temp);

		temp++;
	}
}

function loadPreview(input, id){
	
	var idInput=input.id;
	var number = idInput.substring(idInput.indexOf('_')+1, idInput.length);

	if (idInput=='fileToUpload'){
		number=0;
	}

    id = id || '#imagePreview_'+number;
    if (input.files && input.files[0]){
        var reader = new FileReader();
 
        reader.onload = function (event){
            $(id)
			.attr('src', event.target.result)
			.height('auto');
        };

		reader.readAsDataURL(input.files[0]);
	}
 }

 