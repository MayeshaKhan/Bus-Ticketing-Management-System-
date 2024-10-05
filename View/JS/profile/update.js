


function isValid(pForm)
{
	const uname = pForm.uname.value;
	const email = pForm.email.value;
	const contact = pForm.contact.value;
	const address = pForm.address.value;

    const unameErr = document.getElementById("unameErr");
	const emailErr = document.getElementById("emailErr");
	const contactErr = document.getElementById("contactErr");
	const addressErr = document.getElementById("addressErr");

    unameErr.innerHTML = "";
    emailErr.innerHTML = "";
    contactErr.innerHTML = "";
    addressErr.innerHTML = "";

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
    
	return flag;
}