function organization_reg(){
	window.open("http://localhost/bloodbank/organization/signup.php");
}
function hospital_reg(){
	window.open("http://localhost/bloodbank/hospital/signup.php");
}
function donor_reg(){
	window.open("http://localhost/bloodbank/donor/signup.php");
}
function requester_reg(){
	window.open("http://localhost/bloodbank/requester/signup.php");
}

function show_tab(tab_number){
	document.getElementsByClassName("show")[0].classList.add("hide");
	document.getElementsByClassName("show")[0].classList.remove("show");
	document.getElementById("tabcontent-"+ tab_number).classList.add("show");
	document.getElementById("tabcontent-"+ tab_number).classList.remove("hide");
	document.getElementsByClassName("active")[0].classList.remove("active");
	document.getElementById("tab-"+ tab_number).classList.add("active");

}

/*Hospitals*/
function hospital_profile(){
	location.replace("profile.php");
}
function hospital_req_blood(){
	location.replace("list_hospital.php");
}