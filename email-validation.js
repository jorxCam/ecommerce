

function ValidateEmaillogin(inputText,inputPass)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var passformat = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/;
//document.write($inputText);
if(inputText.value.match(mailformat) && inputPass.value.match(passformat)     )
    {
        //alert(inputText.value);
        //alert("bon email address!");
        document.form1.login.focus();
        return true;
    }
else
    {
        alert("votre email address nest pas valable! ou password trop faible!");
        document.form1.login.focus();
        return false;
    }
}



function ValidateEmailinscrire(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var passformat = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/;
//document.write($inputText);
if(inputText.value.match(mailformat) && inputPass.value.match(passformat)   )
    {
        //alert(inputText.value);
        //alert("bon email address!");
        document.form2.email.focus();
        return true;
    }
else
    {
        alert("votre email address nest pas valable! ou password trop faible!");
        document.form2.email.focus();
        return false;
    }
}