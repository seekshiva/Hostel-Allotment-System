// JavaScript Document
var req;
var displayXML;


function loadXMLDoc(url,val) {
	displayXML = document.getElementById('displayXML');
	req = false;
	// branch for native XMLHttpRequest object
	if(window.XMLHttpRequest) {
		try {
			req = new XMLHttpRequest();
		} catch(e) {
			req = false;
		}
	// branch for IE/Windows ActiveX version
	} else if(window.ActiveXObject) {
		try {
			req = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try {
			req = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e) {
			req = false;
			}
		}
	}
	if(req) {
		if(val) {
			switch(val) {
				case 'install':
				{
					sForm = document.forms['installationForm'];
					host = sForm.elements['host'];
					username = sForm.elements['username'];
					password = sForm.elements['password'];
					database = sForm.elements['database'];
					tablepref = sForm.elements['tablepref'];
					institute = sForm.elements['institute'];
					
					if(host.value == "" || username.value == "" || password.value == "" || database.value == "" || tablepref.value == "" || institute.value == "") {
						displayXML.innerHTML = "All fields are mandatory. They cannot be left blank.";
						return;
					}
					sParams = "";
					sParams = addPostParam(sParams, "host", host.value);
					sParams = addPostParam(sParams, "username", username.value);
					sParams = addPostParam(sParams, "password", password.value);
					sParams = addPostParam(sParams, "database", database.value);
					sParams = addPostParam(sParams, "tablepref", tablepref.value);
					sParams = addPostParam(sParams, "institute", institute.value);
					req.onreadystatechange = processReqChange;
					req.open("POST", url, true);
					req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					req.send(sParams);
					break;
				}
				case 'login':
				{
					sForm = document.forms['loginForm'];
					username = sForm.elements['username'];
					password = sForm.elements['password'];
					
					if(username.value == "" || password.value == "") {
						displayXML.innerHTML = "All fields are mandatory. They cannot be left blank.";
						return;
					}
					sParams = "";
					sParams = addPostParam(sParams, "username", username.value);
					sParams = addPostParam(sParams, "password", password.value);
					req.onreadystatechange = processReqChangeLogin;
					req.open("POST", url, true);
					req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					req.send(sParams);
					break;
				}
				case 'register':
				{
					
					if(!sForm) { // to get around a bug in IE
						 sForm = document.forms['sForm'];
					}
					sName = sForm.elements['sName'];
					sFName = sForm.elements['sFName'];
					sRelation = sForm.elements['sRelation'];
					sTitle = sForm.elements['sTitle'];
					sSex = sForm.elements['sSex'];
					sRollno = sForm.elements['sRollno'];
					sClass = sForm.elements['sClass'];
					sHostel = sForm.elements['sHostel'];
					sRoom = sForm.elements['sRoom'];
					sDate = sForm.elements['sDate'];
					sParams = "";
					sParams = addPostParam(sParams, "sName", sName.value);
					sParams = addPostParam(sParams, "sFName", sFName.value);
					sParams = addPostParam(sParams, "sRelation", sRelation.value);
					sParams = addPostParam(sParams, "sTitle", sTitle.value);
					sParams = addPostParam(sParams, "sSex", sSex.value);
					sParams = addPostParam(sParams, "sRollno", sRollno.value);
					sParams = addPostParam(sParams, "sClass", sClass.value);
					sParams = addPostParam(sParams, "sHostel", sHostel.value);
					sParams = addPostParam(sParams, "sRoom", sRoom.value);
					sParams = addPostParam(sParams, "sDate", sDate.value);
					req.onreadystatechange = processReqChangeLogin;
					req.open("POST", url, true);
					req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					req.send(sParams);
					break;
				}
			}
		}
		else {
			req.onreadystatechange = processReqChange;
			req.open("GET", url, true);
			req.send("");
		}
	}
}

function processReqChange() {
if((req.readyState == 4) && (req.status == 200)) {
	document.getElementById('displayXML').innerHTML = req.responseText;
}
}
function processReqChangeLogin() {
if((req.readyState == 4) && (req.status == 200)) {
	document.getElementById('displayXML').innerHTML = req.responseText;
	if(req.responseText == 'Login successful') {
		window.location = './index.php';
	}
}
}

function addPostParam(sParams, sParamName, sParamValue) {
	if(sParams.length > 0) {
		sParams += "&";
	}
	return sParams + encodeURIComponent(sParamName) + "=" + encodeURIComponent(sParamValue);
}

function validate() {
	displayXML = document.getElementById('displayXML');
	username = document.getElementById('username');
	password = document.getElementById('password');
	displayXML.innerHTML = "<img src=\"./images/loading.gif\" align=\"absmiddle\" />Validating...";
	if(username.value == "" || password.value == "") {
		displayXML.innerHTML = "The username and password fields must not be left blank.";
	return false;
	}
	else {
		loadXMLDoc("authenticate.php","login");
		if(displayXML.innerHTML == "Login successful") {
			return true;
		}
		else {
			return false;
		}
	}
}

function showHostelCAOption(hostel) {
	Hostel = hostel;
	List = document.getElementById('hostelList');
	L = List.childNodes;
	for(i = 0; i < L.length; i++)
	for(j=0; j < L[i].childNodes.length; j++)
	 {
		if(L[i].childNodes[j].nodeName == 'DIV') { del = L[i].childNodes[j];
	 	L[i].removeChild(del);}
	}
	for(i = 0; i < L.length; i++)
	if(L[i].childNodes[0].firstChild.nodeValue == hostel)
	 {
		newContainer = L[i];
		newDiv = document.createElement('div');
		newContainer.appendChild(newDiv);
		displaySearch(newDiv);
	}
}
function displaySearch(div) {
	newElement = document.createTextNode('Enter a room number:');
	div.appendChild(newElement);

	newElement = document.createElement('input');
	newElement.setAttribute('id','searchRoomString');
	newElement.setAttribute('type','text');
	div.appendChild(newElement);
	newElement.focus();

	newElement = document.createElement('span');
	newElement.setAttribute('id','err_msg');
	div.appendChild(newElement);

	newElement = document.createElement('input');
	newElement.setAttribute('type','button');
	newElement.setAttribute('value','Check Availability');
	newElement.setAttribute('onClick','checkavailability();');
	div.appendChild(newElement);

	newElement = document.createElement('div');
	newElement.setAttribute('id','displayXML');
	div.appendChild(newElement);
	displayXML = newElement;
}

function checkavailability() {
	room = document.getElementById('searchRoomString');
	errDet = room.parentNode.childNodes[2];

	if(room.value == '') {
	errDet.innerHTML = "Field cannot be left blank";
	displayXML.innerHTML = "";
	room.focus();
	}
	else {
	errDet.innerHTML = "";
	loadXMLDoc("ca.php?hostel=" + Hostel + "&room=" + room.value);
	}
}