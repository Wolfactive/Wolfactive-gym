/*Var*/
var valueName = document.querySelector('#HovaTen');
var valueNameVal = document.querySelector('#HovaTenVal');
var valueEmail = document.querySelector('#Email');
var valueEmailVal = document.querySelector('#EmailVal');
var valueSDT = document.querySelector('#SDT');
var valueSDTVal = document.querySelector('#SDTVal');
var valueNoiDung = document.querySelector('#Noidung');
var valueNoiDungVal = document.querySelector('#NoidungVal');
var formLienHe = document.querySelector('#Noidung');
var contactSubmit = document.querySelector('#ContactFromBtn');
var isValidate = false;
var isName = false;
var isPhone = false;
var isEmail = false;
var isComment =false;

/*Function*/
valueName ? valueName.onfocus = function(){
  valueNameVal.style.opacity="0";
}:{};
valueEmail ? valueEmail.onfocus = function(){
  valueEmailVal.style.opacity="0";
}:{};
valueSDT ? valueSDT.onfocus = function(){
  valueSDTVal.style.opacity="0";
}:{};
valueNoiDung ? valueNoiDung.onfocus = function(){
  valueNoiDungVal.style.opacity="0";
}:{};

function checkName(){
  valueNameVal.style.opacity = "1";
  isName = false;
};
function CheckPhoneNumber(){
  var patternPhone = new RegExp(
     "^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
 );
 if(valueSDT.value){
   if (!valueSDT.test(valueSDT.value)) {
       valueSDTVal.style.opacity = "1";
       isPhone = false;
   }else{
     isPhone = true;
   }
 }else{
   valueSDTVal.style.opacity = "1";
   isPhone = true;
 }
};
function checkEmptyPhone(){
  valueSDTVal.style.opacity = "1";
  isPhone = false;
};
function checkEmptyEmail(){
  valueEmailVal.style.opacity = "1";
  isEmail = false;
};

function checkValue(){
  console.log(valueName);
}
