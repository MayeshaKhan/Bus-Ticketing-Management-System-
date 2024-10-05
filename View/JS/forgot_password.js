


function isValid(pForm)
{
	const email = pForm.email.value;
	const security_answer = pForm.security_answer.value;
	const new_password = pForm.new_password.value;
	const confirm_password = pForm.confirm_password.value;

	const emailErr = document.getElementById("emailErr");
	const security_answerErr = document.getElementById("security_answerErr");
	const new_passwordErr = document.getElementById("new_passwordErr");
	const confirm_passwordErr = document.getElementById("confirm_passwordErr");

    emailErr.innerHTML = "";
    security_answerErr.innerHTML = "";
    new_passwordErr.innerHTML = "";
    confirm_passwordErr.innerHTML = "";

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


    // security_answer validation
	if(security_answer === "")
	{
		security_answerErr.innerHTML = "Please enter User security_answer";
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
    if(emailErr.innerHTML === ""){
        return true;
    }
	return flag;
}