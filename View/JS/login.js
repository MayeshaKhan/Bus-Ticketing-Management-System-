function isValid(pForm)
{
	const email = pForm.email.value;
	const password = pForm.password.value;

	const emailErr = document.getElementById("emailErr");
	const passwordErr = document.getElementById("passwordErr");

    emailErr.innerHTML = "";
    passwordErr.innerHTML = "";

	let flag=true;

    // email validation
	if(email === "")
	{
		emailErr.innerHTML = "Please enter User email";
		flag= false;
	}
    else{
        const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;;
        if(emailRegex.test(email) == false)
        {
            emailErr.innerHTML = "Invalid email format";
            flag= false;
        }
    }

    // password validation
	if(password === "")
	{
		passwordErr.innerHTML = "Please enter User password";
		flag= false;
	}
    else if(password.length < 6)
    {
        passwordErr.innerHTML = "Password must contain at least 6 digits.";
		flag= false;
    }
    
	return flag;
}