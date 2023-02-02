function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
alert("bon email address!");
document.form1.login.focus();
return true;
}
else
{
alert("votre email address nest pas valable!");
document.form1.login.focus();
return false;
}
}
