function CheckPassword(inputtxt) 
{ 
var passw=  /^[A-Za-z]\w{7,14}$/;
if(inputtxt.value.match(passw)) 
{ 
return true;
}
else
{ 
alert('Invalid Password! Enter 7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter')
return false;
}
}