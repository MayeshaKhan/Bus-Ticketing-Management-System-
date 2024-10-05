


function isValid(pForm)
{
	const old_password = pForm.old_password.value;
	const new_password = pForm.new_password.value;
	const confirm_password = pForm.confirm_password.value;

	const new_passwordErr = document.getElementById("new_passwordErr");
	const old_passwordErr = document.getElementById("old_passwordErr");
	const confirm_passwordErr = document.getElementById("confirm_passwordErr");

    new_passwordErr.innerHTML = "";
    old_passwordErr.innerHTML = "";
    confirm_passwordErr.innerHTML = "";

	let flag=true;

    
    // new_password validation
	if(old_password === "")
	{
		old_passwordErr.innerHTML = "Please enter User old_password";
		flag= false;
	}
    else if(old_password.length < 6)
    {
        old_passwordErr.innerHTML = "old_password must contain at least 6 digits.";
		flag= false;
    }
    
    // new_password validation
	if(new_password === "")
	{
		new_passwordErr.innerHTML = "Please enter User new_password";
		flag= false;
	}
    else if(new_password.length < 6)
    {
        new_passwordErr.innerHTML = "new_password must contain at least 6 digits.";
		flag= false;
    }

    // confirm_password validation
	if(confirm_password === "")
	{
		confirm_passwordErr.innerHTML = "Enter the new_password to confirm";
		flag= false;
	}
	else if(confirm_password !== new_password)
	{
		confirm_passwordErr.innerHTML = "new_password does not match.";
		flag= false;
	}
    
	return flag;
}