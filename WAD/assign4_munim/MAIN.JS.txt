function formvalidateform1()
{
    var fname = document.forms["frmUser"]["firstName"];
    var lname = document.forms["frmUser"]["lastName"];
    var uname = document.forms["frmUser"]["userName"];
    var email = document.forms["frmUser"]["EMail"];
    var psw = document.forms["frmUser"]["password"];

    if (uname.value == "User Name")
    {
        window.alert("Please enter your User name.");
        fname.focus();
        return false;
    }
    if (fname.value == "First Name")
    {
        window.alert("Please enter your First name.");
        fname.focus();
        return false;
    }

    if (lname.value == "Last Name")
    {
        window.alert("Please enter your Last name.");
        lname.focus();
        return false;
    }
    if(psw.value == "password")
    {
        window.alert("Please enter password.");
        psw.focus();
        return false;
    }
    if (email.value == "E-mail")
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (!validateEmail(email.value))
    {
        window.alert("Please enter valid email.");
        email.focus();
        return false;
    }

    return true;
}
function formvalidateform2()
{
    var uname = document.forms["frmUser"]["password"];
    var email = document.forms["frmUser"]["EMail"];

    if (uname.value == "password")
    {
        window.alert("Please enter your Password.");
        uname.focus();
        return false;
    }
    if (email.value == "E-mail") {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (!validateEmail(email.value))
    {
        window.alert("Please enter valid email.");
        email.focus();
        return false;
    }
    return true;
}

function validateEmail(email)
{
    var re = /\S+@\S+\.\S/;
    return re.test(email);
}
