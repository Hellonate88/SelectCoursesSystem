String.prototype.trim = function(){
    return this.replace(/^\s*/,"").replace(/\s*$/,"");
}


var checkForm = function(){

    var Form = document.getElementById("student");

    console.log(Form.id.value);
    var errStr = "";
    if(Form.id.value == null || Form.id.value.trim() == ""){
        errStr += "\nPlease enter Student ID！";
        Form.id.focus();
    }
    if(Form.first_name.value == null || Form.first_name.value.trim() == ""){
        errStr += "\nPlease enter Student First Name！";
        Form.first_name.focus();
    }
    if(Form.last_name.value == null || Form.last_name.value.trim() == ""){
        errStr += "\nPlease enter Student Last Name！";
        Form.last_name.focus();
    }
    if(Form.DOB.value == null || Form.DOB.value.trim() == ""){
        errStr += "\nPlease enter Student DOB！";
        Form.DOB.focus();
    }
    if(Form.Home_phone.value == null || Form.Home_phone.value.trim() == ""){
        errStr += "\nPlease enter Student Home Phone！";
        Form.Home_phone.focus();
    }
    if(Form.Mobile.value == null || Form.Mobile.value.trim() == ""){
        errStr += "\nPlease enter Student Mobile！";
        Form.Mobile.focus();
    }
    if(Form.email.value == null || Form.email.value.trim() == ""){
        errStr += "\nPlease enter Student Email！";
        Form.email.focus();
    }
    if(Form.firstContactName.value == null || Form.firstContactName.value.trim() == ""){
        errStr += "\nPlease enter Student First Contact！";
        Form.firstContactName.focus();
    }
    if(Form.fistContactPhone.value == null || Form.fistContactPhone.value.trim() == ""){
        errStr += "\nPlease enter Student First Contact Number！";
        Form.fistContactPhone.focus();
    }
    if(Form.schoolYear.value == null || Form.schoolYear.value.trim() == "" || (Form.schoolYear.value != 7 && Form.schoolYear.value != 8 && Form.schoolYear.value != 9 && Form.schoolYear.value != 10 && Form.schoolYear.value != 11 && Form.schoolYear.value != 12 )){
        errStr += "\nPlease enter Student enrolled school year (7-12)！";
        Form.schoolYear.focus();
    }
    if(Form.enrollmentDate.value == null || Form.enrollmentDate.value.trim() == ""){
        errStr += "\nPlease enter Student Enrollment Date！";
        Form.enrollmentDate.focus();
    }
    if(errStr != ""){
        alert(errStr);
        return false;
    }
}