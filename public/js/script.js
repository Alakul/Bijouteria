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
			materials++;
			var x = document.getElementById("materialsList");
			var childX = document.createElement('li');
			childX.innerHTML = '<input name="materials_'+materials+'" class="inputText materialsInput" type="text" maxlength="100" required><i id="materialsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i>';
			x.appendChild(childX);
		}	
	}
	else if	(id=='toolsButton'){
		if(tools<=5){
			tools++;
			var x = document.getElementById("toolsList");
			var childX = document.createElement('li');
			childX.innerHTML = '<input name="tools_'+tools+'" class="inputText toolsInput" type="text" maxlength="100" required><i id="toolsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i>';
			x.appendChild(childX);
		}
	}
	else if	(id=='stepsButton'){
		if(steps<=5){
			steps++;
			var x = document.getElementById("stepsList");
			var childX = document.createElement('li');
			childX.setAttribute('id','step_'+steps);
			childX.setAttribute('class','steps');
			childX.innerHTML = '<h3 id="h3_'+steps+'">Krok '+steps+':</h3><i id="stepsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i><i id="stepsIcon" class="fas fa-arrow-down" onclick="replaceDown(this);"></i><i id="stepsIcon" class="fas fa-arrow-up" onclick="replaceUp(this);"></i><br><label>Zdjęcie <span class="asterisk">*</span></label><input name="image_'+steps+'" class="imageToUpload" id="image_'+steps+'" type="file" onfocus="inputRequired(this)" accept=".jpeg, .jpg, .png, .gif, .svg" onchange="loadPreview(this);" required><div class="imageInput"><div style="height: 100%; display: table-cell;"><a id="imageButton_'+steps+'"class="imageButton" onclick="imageInput(this);">Przeglądaj...</a></div><span id="fileName_'+steps+'" class="fileName">Nie wybrano pliku.</span></div><img id="imagePreview_'+steps+'" src="#" class="previewImg" style="display: none;"/><br><label>Opis <span class="asterisk">*</span></label><textarea name="description_'+steps+'" class="inputText" type="text" maxlength="1000" required></textarea>';
			x.appendChild(childX);
		}
	}
}

function deleteFromList(obj){
	var id=obj.id;
	if (id=='materialsIcon'){
		materials--;
		obj.parentNode.parentNode.removeChild(obj.parentNode);
		changeIdMaterials();
	}
	else if (id=='toolsIcon'){
		tools--;
		obj.parentNode.parentNode.removeChild(obj.parentNode);
		changeIdTools();
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

function changeIdMaterials(){
	var list = document.getElementById("materialsList");
	var items = list.getElementsByTagName("li");
		
	var temp=1;
	for (var i = 0; i < items.length; ++i){	
		items[i].children[0].setAttribute('name','materials_'+temp);
		temp++;
	}
}

function changeIdTools(){
	var list = document.getElementById("toolsList");
	var items = list.getElementsByTagName("li");
		
	var temp=1;
	for (var i = 0; i < items.length; ++i){	
		items[i].children[0].setAttribute('name','tools_'+temp);
		temp++;
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
		
		items[i].children[6].setAttribute('name','image_'+temp);
		items[i].children[6].setAttribute('id','image_'+temp);
		items[i].children[7].children[0].children[0].setAttribute('id','imageButton_'+temp);
		items[i].children[7].children[1].setAttribute('id','fileName_'+temp);
		items[i].children[8].setAttribute('id','imagePreview_'+temp);
		items[i].children[11].setAttribute('name','description_'+temp);

		temp++;
	}
}

var nameLimit=30;
function loadPreview(input){
	var idInput = input.id;
	var number = idInput.substring(idInput.indexOf('_')+1, idInput.length);

	if (fileExtensionValidate(input)==false){
		if (idInput=="avatar"){
			document.getElementById('avatar').value='';
			document.getElementById('avatarPreview').setAttribute('src','#');
			document.getElementById('avatarPreview').style.display = "none";
			document.getElementById("avatarName").innerHTML = "Nie wybrano pliku.";
		}
		else {
			document.getElementsByName('image_'+number).value='';
			document.getElementById('imagePreview_'+number).setAttribute('src','#');
			document.getElementById('imagePreview_'+number).style.display = "none";
			document.getElementById("fileName_"+number).innerHTML = "Nie wybrano pliku.";
		}
		alert("Nieprawidłowe rozszerzenie pliku.");
	}
	else if (fileSizeValidate(input)==false){
		if (idInput=="avatar"){
			document.getElementById('avatar').value='';
			document.getElementById('avatarPreview').setAttribute('src','#');
			document.getElementById('avatarPreview').style.display = "none";
			document.getElementById("avatarName").innerHTML = "Nie wybrano pliku.";
		}
		else {
			document.getElementsByName('image_'+number).value='';
			document.getElementById('imagePreview_'+number).setAttribute('src','#');
			document.getElementById('imagePreview_'+number).style.display = "none";
			document.getElementById("fileName_"+number).innerHTML = "Nie wybrano pliku.";
		}
		alert('Maksymalny rozmiar pliku: 2 MB.');
	}

	if (fileExtensionValidate(input)==true && fileSizeValidate(input)==true){

		if (input.files && input.files[0]){
			var reader = new FileReader();

			reader.onload = function (event){
				if (idInput=="avatar"){
					var output = document.getElementById("avatarPreview");
				}
				else {
					var output = document.getElementById('imagePreview_'+number);
				}
				output.src = reader.result;
				output.style.display = "block";
			};

			reader.readAsDataURL(input.files[0]);
		}
		if (idInput=="avatar"){
			var fullPath = document.getElementById("avatar").value;
			var fileName = fullPath.split(/(\\|\/)/g).pop();
			document.getElementById("avatarName").innerHTML = fileName;
		}
		else {
			var fullPath = document.getElementById("image_"+number).value;
			var fileName = fullPath.split(/(\\|\/)/g).pop();
			document.getElementById("fileName_"+number).innerHTML = fileName;
		}
	}
	
}

function imageInput(obj){
	var idButton = obj.id;
	var number = idButton.substring(idButton.indexOf('_')+1, idButton.length);

	if (idButton=="avatarButton"){
		document.getElementsByName("avatar")[0].click()
	}
	else {
		document.getElementsByName("image_"+number)[0].click()
	}
}


var validExtension = ".png, .gif, .jpeg, .jpg";
function fileExtensionValidate(file) {
	var filePath = file.value;
	var getFileExtension = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
	var pos = validExtension.indexOf(getFileExtension);
	if(pos < 0) {
		return false;
	} else {
		return true;
	}
}

var maxSize = '2048';
function fileSizeValidate(file) {
	if (file.files && file.files[0]) {
		var fileSize = file.files[0].size/1024;
		if(fileSize > maxSize) {
			return false;
		} else {
			return true;
		}
	}
}

function clearInputs(){
	var list = document.getElementById("stepsList");
	var items = list.getElementsByTagName("li");

	document.getElementsByName('title').required = false;
	document.getElementById('category').required = false;

	for (var i = 0; i <= items.length; ++i){
		document.getElementsByName('image_'+i).required = false;
		document.getElementsByName('description_'+i).required = false;
	}

	var listMaterials = document.getElementById("materialsList");
	var itemsMaterials = listMaterials.getElementsByTagName("li");
	for (var i = 0; i < itemsMaterials.length; ++i){
		document.getElementsByName('materials_'+i).required = false;
	}

	var listTools = document.getElementById("toolsList");
	var itemsTools = listTools.getElementsByTagName("li");
	for (var i = 0; i < itemsTools.length; ++i){
		document.getElementsByName('tools_'+i).required = false;
	}
}

function inputRequired(){
	var list = document.getElementById("stepsList");
	var items = list.getElementsByTagName("li");

	document.getElementsByName('title').required = true;
	document.getElementById('category').required = true;
	document.getElementsByName('description_'+0).required = false;

	for (var i = 0; i <= items.length; ++i){
		document.getElementsByName('image_'+i).required = true;
		document.getElementsByName('description_'+i).required = true;
	}

	var listMaterials = document.getElementById("materialsList");
	var itemsMaterials = listMaterials.getElementsByTagName("li");
	for (var i = 0; i < itemsMaterials.length; ++i){
		document.getElementsByName('materials_'+i).required = true;
	}

	var listTools = document.getElementById("toolsList");
	var itemsTools = listTools.getElementsByTagName("li");
	for (var i = 0; i < itemsTools.length; ++i){
		document.getElementsByName('tools_'+i).required = true;
	}

	var materialsLength=document.getElementById("materialsList").getElementsByTagName("li").length;
	document.cookie="materials="+materialsLength;

	var toolsLength=document.getElementById("toolsList").getElementsByTagName("li").length;
	document.cookie="tools="+toolsLength;

	var stepsLength=document.getElementById("stepsList").getElementsByTagName("li").length;
	document.cookie="steps="+stepsLength;
}



function preventSymbolLogin(event) {
	if (event.which == 46 || event.which == 95 || (event.which >= 48 && event.which <= 57) || (event.which >= 65 && event.which <= 90) || (event.which >= 97 && event.which <= 122)) {  	
    	return true;
	}
	else {
		event.preventDefault();
		return false;
	}
}

function checkSpace(event) {
	if (event.which ==32) {
    	event.preventDefault();
    	return false;
	}
}

function chooseCategory(obj){
	var id=obj.id;
	document.cookie="category="+id;
}



