function CheckPassword(inputtxt)   
{   
var passw=  /^[A-Za-z]\w{7,14}$/;  
if(inputtxt.value.match(passw))   
{   
alert('Correct, try another...')  
return true;  
}  
else  
{   
alert('Wrong...!')  
return false;  
}  
} 


function passid_validation(passid)
{
	var pl=passid.value.length;
	if(pl==0 || pl>=my || pl<mx)
	{
		alert("password should not be empty/length must be between "+mx+" to "+my);
		passid.focus();
		return false;
	}
	return true;
}


function passid_validation(passid)
{
	var pl=passid.value.length;
	if(pl==0 || pl>=my || pl<mx)
	{
		alert("password should not be empty/length must be between "+mx+" to "+my);
		passid.focus();
		return false;
	}
	return true;
}