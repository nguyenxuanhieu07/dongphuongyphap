var regexTelephone = /^\+?[0189]{1}\s*\.*\-*\d+\s*\.*\-*\d+\s*\.*\-*\d+\s*\.*\-*\d+$/;
var regexEmail = /^\w+@{1}[a-zA-Z]+\.{1}[a-zA-Z]+$/;
var txtNameInfo = '';
var txtPhoneInfo = '';
var txtEmailInfo = '';
var txtNoiDungInfo = '';

//Kiểm tra họ tên
function validateFullName(fullname){
	if (fullname.length <= 0 ) {
		txtNameInfo = "Vui lòng nhập họ tên của bạn!";
		return false;
		
	}else if(fullname.length < 5 || fullname.length > 40) {
		txtNameInfo = "Vui lòng nhập họ tên từ 5 - 40 kí tự!";
		return false;
	}
	txtNameInfo = "";
	return true;
}

//Kiểm tra số điện thoại
function validateTelephone(telephone, regexTelephone){
	if (telephone.length <= 0) {
		txtPhoneInfo = "Vui lòng nhập số điện thoại của bạn!";
		return false;
	}else if(telephone.length < 8 || telephone.length > 13){
		txtPhoneInfo = "Số điện thoại của bạn không hợp lệ!";
		return false;	
	}else if (!regexTelephone.test(telephone)) {
		txtPhoneInfo = "Số điện thoại của bạn không hợp lệ!";
		return false;
	}
	txtPhoneInfo = "";
	return true;
}

//Kiểm tra email
function validateEmail(email, regexEmail){
	if (email.length <= 0) {
		txtEmailInfo = "Vui lòng nhập email của bạn!";
		return false;
	}else if (email.length > 40) {
		txtEmailInfo = "Trường email không vượt quá 40 kí tự!";
		return false;
	}else if (!regexEmail.test(email)) {
		txtEmailInfo = "Email của bạn không hợp lệ!";
		return false;
	}
	txtEmailInfo = "";
	return true;
}

//Kiểm tra tình trạng sức khỏe
function validateNoiDung(noiDung){
	if (noiDung.length <= 0) {
		txtNoiDungInfo = "Trường này không được để trống!";
		return false;
	}
	txtNoiDungInfo = "";
	return true;
}

//Lấy ngày hiện tại
function getDate(){
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();
	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;
	return day + "-" + month + "-" + year;
	
}