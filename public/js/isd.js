function refreshCaptcha(){
  var captcha=$('.captcha img');
  var cap_text=$('#captcha');
  if(captcha && cap_text){
    captcha.attr('src', APP_URL+'/bonecms_captcha?_=' + Math.random());
    cap_text.val('');
//    cap_text.focus();
  }
}
function checkingfn(field){
  
 var val=field.value;
  if (val.length>0)
  
  {
    
    return true;
  }
    
    return false;
}
function checkFieldSelect(field,type){
 if(type=="select"){
  var val=field.value;
  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please Select Request Type');
    return false;
}
}
function checkFieldSelectCard(field,type){
 if(type=="select"){
  var val=field.value;

  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please Select Card Type');
    return false;
}
}

function checkFieldSelectDepartment(field,type){
 if(type=="select"){
  var val=field.value;

  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please Select Your Department');
    return false;
}
}

function checkFieldSelectDistrict(field,type){
 if(type=="district"){
  var val=field.value;

  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please Select Your District');
    return false;
}
}
function checkFieldTextArea(field,type){
  // alert("text area");
 if(type=="null"){
  var val=field.value;
  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter Reason');
    return false;
}
function isDecimal(event) {
  var inputValue = event.which;
  // allow numbers and null (0), backspace (8), del(127) .
  if(!(inputValue > 47 && inputValue < 58) && (inputValue != 0 && inputValue != 8 && inputValue != 127  && inputValue!= 46)) {
      event.preventDefault();
  }
}
}
function checkField(field,type){
  
 if(type=="consumer_office"){
  var consumer_office=field.value;
  if (consumer_office.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Enter valid office name');
    return false;
}
else if(type=="office_head"){
  var office_head=field.value;
  if (office_head.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid card number');
    return false;
}
else if(type=="number"){
  var val=field.value;
  var filter = /^\d+$/;

  if(filter.test(val) && val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid value');
    return false;
}
else if(type=="card_num"){
  var card_num=field.value;
  if (card_num.length>=5 && card_num.length<=15)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid card number');
    return false;
}
else if(type=="password"){
  var password=field.value;
  if (password.length>=6 && password.length<=9)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Password length should be between 6 to 9');
    return false;
}
else if(type=="email"){
  var mail=field.value;
  var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (mailformat.test(mail))
  {
      validationChecks(0,field.id+'_msg',field.id,'');
      return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter valid email id');
    return false;
}
else if(type=="alt_email"){
  var mail=field.value;
  if(mail)
  {
  /////  alert('dsadsfds');
  var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (mailformat.test(mail))
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter valid email id( ex: abc123@gmail.com).');
    $('#'+field.id).val('');
    return false;
  }
  else {
    ////alert('fsdfsfsdc');
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
}
else if(type=="captcha"){
  var captcha=field.value;
  if (captcha.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter captcha');
    return false;
}
else if(type=="null"){
  var val=field.value;
  // alert(val);
  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a value');
    return false;
}
else if(type=="mobile"){
 var val=field.value;
  if (val.length==10 && (val.charAt(0)=='7' || val.charAt(0)=='8' || val.charAt(0)=='9' || val.charAt(0)=='6' || val.charAt(0)=='5'))
  {
     var filter = /^\d*(?:\.\d{1,2})?$/;

     if (filter.test(val))
     {
      validationChecks(0,field.id+'_msg',field.id,'');
      return true;
    }
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter valid mobile number');
    return false;
}
else if(type=="checkbox"){
  var val=field.value;
  if (field.checked==true)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please select checkbox');
    return false;
}

else if(type=="select"){
  // console.log(field);
  var val=field.value;
  
  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please select required value');
    return false;
}
else if(type=="date"){
  var val=field.value;
  if (val.length>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please select required value');
    return false;
}
else if(type=="ifsc"){
//console.log('ifsc'); 
//alert('ifsc');
/*
fixed by Karter Paul
The IFSC is an 11-character code with the first four alphabetic characters representing the bank name, and the last six characters (usually numeric, but can be alphabetic) representing the branch. The fifth character is 0 (zero) and reserved for future use
ref:https://en.wikipedia.org/wiki/Indian_Financial_System_Code
*/
var val=field.value;
 var pattern=/^[A-Za-z]{4}[0][A-Za-z0-9]{6}$/;
 
 //for indian bank IFSC code have some exception ex:IDIB000A001
 /* if(val.length==11)
  {
    if(pattern.test(val))
    {
     validationChecks(0,field.id+'_msg',field.id,'');
     return true;
    }
    else
    {
     alert('validation second');
     //ex:IDIB000A001
      pattern=/^[A-Za-z]{4}[0][A-Za-z0-9]{6}$/
      if(pattern.test(val))
      {
       
       console.log("pattern match"); 
       alert('second pattern match');
       validationChecks(0,field.id+'_msg',field.id,'');
       return true;
      }
      else
      {
      }
    }
  }
  else
  {
  }
  
 */ 
 if (val.length==11 && pattern.test(val))
  {
    //alert("Pattern matched");
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
 
 
 validationChecks(1,field.id+'_msg',field.id,'Please enter a valid IFSC code');
 return false;
}
else if(type=="address"){
  var val=field.value;
   var pattern = /^d*[a-zA-Z][a-zA-Z0-9_ \'\.\-\s\,\\\/\(\)]*$/i;
   if (val.length>=10 && pattern.test(val))
   {
     validationChecks(0,field.id+'_msg',field.id,'');
     return true;
   }
   validationChecks(1,field.id+'_msg',field.id,'Please enter a valid address with minimum 10 characters');
   return false;
}

else if(type=="pincode"){
  var val=field.value;
  if (val.length==6  && val.charAt(0)=='6')
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid pincode');
    return false;
}
else if(type=="ddno"){
  var val=field.value;
  if (val.length>=6 && parseFloat(val)>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid DD Number with minimum 6 numbers');
    return false;
}
else if(type=="ddo"){
  var val=field.value;
  if (val.length>=10 )
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid DDO code');
    return false;
}
else if(type=="phcode"){
  var val=field.value;
  if (val.length>=3 && val.length<=5 && parseFloat(val)>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid area code');
    return false;
}
else if(type=="faxcode"){
  var val=field.value;
  if (val.length>=2 && val.length<=5 && parseFloat(val)>0)
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid fax code');
    return false;
}
else if(type=="phnum"){
  var val=field.value;
  if (val.length>=6 && val.length<=10 && val.charAt(0)!='0')
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid phone number');
    return false;
}
else if(type=="faxnum"){
  var val=field.value;
  if (val.length>=6 && val.length<=10 && val.charAt(0)!='0')
  {
    validationChecks(0,field.id+'_msg',field.id,'');
    return true;
  }
  else {
    validationChecks(1,field.id+'_msg',field.id,'Please enter a valid FAX number');
    return false;
  }
}
}
function checkMail(mail_field){
  var mail=mail_field.value;
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (mail.match(mailformat))
  {
    validationChecks(0,mail_field.id+'_msg',mail_field.id,'');
    return true;
  }
    validationChecks(1,mail_field.id+'_msg',mail_field.id,'Please enter valid email id( ex: abc123@gmail.com).');
    return false;
}
function isEmail(event){
  var inputValue = event.which;
  // allow letters and numbers and whitespaces and null (0), backspace (8), del(127), dot(46), @(64), _(95).
  if(!(inputValue > 47 && inputValue < 58) && !(inputValue > 64 && inputValue < 91) && !(inputValue > 96 && inputValue < 123) && (inputValue != 32 && inputValue != 0 && inputValue != 8 && inputValue != 127 && inputValue != 46 && inputValue != 64 && inputValue != 95)) {
      event.preventDefault();
  }
}
function isNumber(event) {
  var inputValue = event.which;
  // allow numbers and null (0), backspace (8), del(127) .
  if(!(inputValue > 47 && inputValue < 58) && (inputValue != 0 && inputValue != 8 && inputValue != 127)) {
      event.preventDefault();
  }
}
function isNumber1(event) {
  var inputValue = event.which;
  // allow numbers and null (0), backspace (8), del(127) .
  if(!(inputValue > 47 && inputValue < 58) && (inputValue != 0 && inputValue != 8 && inputValue != 127 && inputValue != 46)) {
      event.preventDefault();
  }
}
function isAlphaNumeric(event) {
  var inputValue = event.which;
  // allow letters and numbers and whitespaces and null (0), backspace (8), del(127) .
  if(!(inputValue > 47 && inputValue < 58) && !(inputValue > 64 && inputValue < 91) && !(inputValue > 96 && inputValue < 123) && (inputValue != 32 && inputValue != 0 && inputValue != 8 && inputValue != 127)) {
      event.preventDefault();
  }
}
function isAlpha(event){
  var inputValue = event.which;
  // allow letters and whitespaces and null (0), backspace (8), del(127) .
  if(!(inputValue > 64 && inputValue < 91) && !(inputValue > 96 && inputValue < 123) && (inputValue != 32 && inputValue != 0 && inputValue != 8 && inputValue != 127)) {
      event.preventDefault();
  }
}
function isDate(event) {
  var inputValue = event.which;
  // allow numbers and / (47) and null (0), backspace (8), del(127) .
  if(!(inputValue >= 47 && inputValue < 58) && (inputValue != 0 && inputValue != 8 && inputValue != 127)) {
      event.preventDefault();
  }
}
 function onlyNumbersWithMinus(event) {           
          var inputValue = event.which;
          if(!(inputValue > 47 && inputValue < 58) && (inputValue != 0 && inputValue != 8 && inputValue != 45 && inputValue != 127)) 
          {
            event.preventDefault();
          }
  }
function phonewithspecial(event) {           
          var inputValue = event.which;
          if(!(inputValue > 47 && inputValue < 58) && (inputValue != 0 && inputValue != 8 && inputValue != 45 && inputValue != 127 && inputValue != 59 && inputValue != 44)) 
          {
            event.preventDefault();
          }
  }
        
function isLink(event) {
  var inputValue = event.which;
  // allow letters and numbers and null (0), backspace (8), del(127), dot(46), %(37), _(95), -(45), ?(63), /(47), :(58)
  if(!(inputValue > 47 && inputValue < 58) && !(inputValue > 64 && inputValue < 91) && !(inputValue > 96 && inputValue < 123) && (inputValue != 0 && inputValue != 8 && inputValue != 127 && inputValue != 46 && inputValue != 37 && inputValue != 95 && inputValue != 45 && inputValue != 63 && inputValue != 47 && inputValue != 58)) {
      event.preventDefault();
  }
}
function isAlphaDot(event) {
  var inputValue = event.which;
  // allow letters and whitespaces and null (0), backspace (8), del(127), dot(46) .
  if(!(inputValue > 64 && inputValue < 91) && !(inputValue > 96 && inputValue < 123) && (inputValue != 32 && inputValue != 0 && inputValue != 8 && inputValue != 127 && inputValue != 46)) {
      event.preventDefault();
  }
}
function isAddress(event){
  var inputValue = event.which;
  // allow letters and numbers and null (0), backspace (8), del(127), dot(46), /(47), -(45), \(92), space(32), ( (40), ) (41), comma (44), CR (13)
  if(!(inputValue > 47 && inputValue < 58) && !(inputValue > 64 && inputValue < 91) && !(inputValue > 96 && inputValue < 123) && (inputValue != 0 && inputValue != 8 && inputValue != 127 && inputValue != 46 && inputValue != 47 && inputValue != 45 && inputValue != 92 && inputValue != 32 && inputValue != 40 && inputValue != 41 && inputValue != 44 && inputValue != 13)) {
      event.preventDefault();
  }
}
function isHEIname(event){
  var inputValue = event.which;
  // allow letters and whitespaces and dot(46), -(45), '(39), null (0), backspace (8), del(127), ( (40), ) (41), comma (44).
  if(
    !(inputValue > 64 && inputValue < 91) &&
    !(inputValue > 96 && inputValue < 123) &&
    (
      inputValue != 32 && inputValue != 0 &&
      inputValue != 8 && inputValue != 127 &&
      inputValue != 46 && inputValue != 45 &&
      inputValue != 39 && inputValue!=40 &&
      inputValue != 41 && inputValue!=44
   )) {
      event.preventDefault();
  }
}
function validationChecks(status,msg_field,form_elt,message){
  if(status==1){
    $('#'+msg_field).html(message);
    $('#'+form_elt).attr('style','border-color:red');
//    if(focus==1){
//      $('#'+form_elt).focus();
//    }
  }
  else if(status==0){
    $('#'+form_elt).attr('style','border-color:#707070');
    $('#'+msg_field).html('');
  }
}
function resetDate(field){
  $(field).parent().parent().find('input[type=text]').val('');
}
function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}