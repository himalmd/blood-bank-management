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

function add_campaign(){

	window.open("http://localhost/bloodbank/organization/add_campaign.php");

}

function donor_1(){
	location.replace("https://himal.dev/bloodbank/donor/donate_blood.php");
}
function donor_2(){
	location.replace("https://himal.dev/bloodbank/donor/view_report.php");
}
function donor_3(){
	location.replace("https://himal.dev/bloodbank/donor/search_donor.php");
}
function donor_4(){
	location.replace("https://himal.dev/bloodbank/donor/donations.php");
}
function questions(){
	window.open("https://himal.dev/bloodbank/donor/questionnair.php");
}
function req_1(){
	location.replace("https://himal.dev/bloodbank/requester/search_donor.php");
}


/*

function show_tab(tab_number){

	document.getElementsByClassName("show")[0].classList.add("hide");

	document.getElementsByClassName("show")[0].classList.remove("show");

	document.getElementById("tabcontent-"+ tab_number).classList.add("show");

	document.getElementById("tabcontent-"+ tab_number).classList.remove("hide");

	document.getElementsByClassName("active")[0].classList.remove("active");

	document.getElementById("tab-"+ tab_number).classList.add("active");



}



*/

/*Hospitals*/



function openCity(evt, cityName) {

  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");

  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";

  }

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < tablinks.length; i++) {

    tablinks[i].className = tablinks[i].className.replace(" active", "");

  }

  document.getElementById(cityName).style.display = "block";

  evt.currentTarget.className += " active";

}



function hospital_profile(){

	location.replace("profile.php");

}

function hospital_req_blood(){

	location.replace("list_hospital.php");

}