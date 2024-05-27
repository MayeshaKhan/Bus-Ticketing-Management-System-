


function isValid(pForm)
{
	const security_question = pForm.security_question.value;
	const security_answer = pForm.security_answer.value;
	const password = pForm.password.value;

	const security_questionErr = document.getElementById("security_questionErr");
	const security_answerErr = document.getElementById("security_answerErr");
	const passwordErr = document.getElementById("passwordErr");

    security_questionErr.innerHTML = "";
    security_answerErr.innerHTML = "";
    passwordErr.innerHTML = "";

	let flag=true;

    
    // security_question validation
	if(security_question === "")
	{
		security_questionErr.innerHTML = "Please enter User security_question";
		flag= false;
	}

    // security_answer validation
	if(security_answer === "")
	{
		security_answerErr.innerHTML = "Please enter User security_answer";
		flag= false;
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