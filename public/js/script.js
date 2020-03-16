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
			childX.innerHTML = '<h3 id="h3_'+steps+'">Krok '+steps+':</h3><i id="stepsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i><i id="stepsIcon" class="fas fa-arrow-down" onclick="replaceDown(this);"></i><i id="stepsIcon" class="fas fa-arrow-up" onclick="replaceUp(this);"></i><br><label>Zdjęcie <span class="asterisk">*</span></label><br><input name="image_'+steps+'" id="image_'+steps+'" class="fileToUpload" type="file" required onchange="loadPreview(this);"><br><img id="imagePreview_'+steps+'" src="#" class="preview" height="200px"/><br><label>Opis <span class="asterisk">*</span></label><textarea name="description_'+steps+'" class="inputText" type="text" maxlength="1000" required></textarea><br>';
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
		
		items[i].children[7].setAttribute('name','image_'+temp);
		items[i].children[7].setAttribute('id','image_'+temp);
		items[i].children[9].setAttribute('id','imagePreview_'+temp);
		items[i].children[12].setAttribute('name','description_'+temp);

		temp++;
	}
}

var nameLimit=30;
function loadPreview(input, id){
	var idInput = input.id;
	var number = idInput.substring(idInput.indexOf('_')+1, idInput.length);

	if (fileExtensionValidate(input)==false){
		document.getElementById('image_'+number).value='';
		document.getElementById('imagePreview_'+number).setAttribute('src','#');
		document.getElementById('imagePreview_'+number).style.height = "200px";
		alert("Nieprawidłowe rozszerzenie pliku.");
	}

	if (fileSizeValidate(input)==false){
		document.getElementById('image_'+number).value='';
		document.getElementById('imagePreview_'+number).setAttribute('src','#');
		document.getElementById('imagePreview_'+number).style.height = "200px";
		alert('Maksymalny rozmiar pliku: 2 MB.');
	}

	if (fileExtensionValidate(input)==true && fileSizeValidate(input)==true){

		if (input.files && input.files[0]){
			var reader = new FileReader();

			reader.onload = function (event){
				var output = document.getElementById('imagePreview_'+number);
				output.src = reader.result;
				output.setAttribute('height', 'auto');
			};

			reader.readAsDataURL(input.files[0]);
		}
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
		document.getElementById('image_'+i).required = false;
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
		document.getElementById('image_'+i).required = true;
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
