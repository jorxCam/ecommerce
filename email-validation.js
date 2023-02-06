function ValidateEmaillogin(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//document.write($inputText);
if(inputText.value.match(mailformat))
    {
        alert(inputText.value);
        //alert("bon email address!");
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
function ValidateEmailinscrire(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//document.write($inputText);
if(inputText.value.match(mailformat))
    {
        alert(inputText.value);
        //alert("bon email address!");
        document.form2.email.focus();
        return true;
    }
else
    {
        alert("votre email address nest pas valable!");
        document.form2.email.focus();
        return false;
    }
}