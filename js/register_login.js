String.prototype.trim = function(){
	return this.replace(/^\s*/,"").replace(/\s*$/,"");
}


var checkLoginForm = function(){
	var loginForm = document.getElementById("login_form_id");
	var errStr = "";
	if(loginForm.account.value == null || loginForm.account.value.trim() == ""){
		errStr += "\nPlease enter user ID！";
		loginForm.account.focus();
	}
	if(loginForm.password.value == null || loginForm.password.value.trim() == ""){
		errStr += "\nPlease enter password！";
		loginForm.password.focus();
	}
	if(errStr != ""){
		alert(errStr);
		return false;
	}	
}

var login = function(){
	document.getElementById("login_id").style.display = "block";
	document.getElementById("register_id").style.display = "none";
}


