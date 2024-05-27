function isValid(pForm)
{
	const ammount = pForm.ammount.value;

	const ammountErr = document.getElementById("ammountErr");

    ammountErr.innerHTML = "";

	let flag=true;

    // email validation
	if(ammount === "")
	{
		ammountErr.innerHTML = "Please enter ammount";
		flag= false;
	}
    else if (ammount < 100)
    {
        ammountErr.innerHTML = "Minimum withdraw ammount is 100";
		flag= false;
    }
    
	return flag;
}