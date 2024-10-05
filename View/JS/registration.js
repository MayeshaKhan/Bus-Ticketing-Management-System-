


function isValid(pForm)
{
	const uname = pForm.uname.value;
	const email = pForm.email.value;
	const contact = pForm.contact.value;
	const address = pForm.address.value;
	const security_question = pForm.security_question.value;
	const security_answer = pForm.security_answer.value;
	const password = pForm.password.value;
	const confirm_password = pForm.confirm_password.value;

    const unameErr = document.getElementById("unameErr");
	const emailErr = document.getElementById("emailErr");
	const contactErr = document.getElementById("contactErr");
	const addressErr = document.getElementById("addressErr");
	const security_questionErr = document.getElementById("security_questionErr");
	const security_answerErr = document.getElementById("security_answerErr");
	const passwordErr = document.getElementById("passwordErr");
	const confirm_passwordErr = document.getElementById("confirm_passwordErr");

    unameErr.innerHTML = "";
    emailErr.innerHTML = "";
    contactErr.innerHTML = "";
    addressErr.innerHTML = "";
    security_questionErr.innerHTML = "";
    security_answerErr.innerHTML = "";
    passwordErr.innerHTML = "";
    confirm_passwordErr.innerHTML = "";

	let flag=true;

    // uname validation
	if(uname === "")
	{
		unameErr.innerHTML = "Please enter User Name";
		flag= false;
	}
    else{
        const unameRegex = /^[a-zA-Z ]*$/;
        if(unameRegex.test(uname) == false)
        {
            unameErr.innerHTML = "Only alphabets and white space are allowed";
            flag= false;
        }
    }

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

    // contact validation
	if(contact === "")
	{
		contactErr.innerHTML = "Please enter User contact";
		flag= false;
	}
    else{
        const contactRegex = /^[0-9]*$/;
        if(contactRegex.test(contact) == false)
        {
            contactErr.innerHTML = "Only numeric value is allowed.";
            flag= false;
        }
        else if(contact.length != 11)
        {
            contactErr.innerHTML = "Mobile no must contain 11 digits.";
            flag= false;
        }
    }

    // address validation
	if(address === "")
	{
		addressErr.innerHTML = "Please enter User address";
		flag= false;
	}

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

    // confirm_password validation
	if(confirm_password === "")
	{
		confirm_passwordErr.innerHTML = "Enter the password to confirm";
		flag= false;
	}
	else if(confirm_password !== password)
	{
		confirm_passwordErr.innerHTML = "Password does not match.";
		flag= false;
	}
    
	return flag;
}