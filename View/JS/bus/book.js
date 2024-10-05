

let coupon_data = false;
let _bus_id;
function isValid(pForm)
{
	const seat_input = pForm.seat.value;

	const seat = JSON.parse(seat_input);

	const seatErr = document.getElementById("seatErr");
	const couponErr = document.getElementById("couponErr");

    seatErr.innerHTML = "";

	let flag = true;

    // seat validation
	if(seat.length == 0)
	{
		seatErr.innerHTML = "Please select at least one seat";
		flag= false;
	}
	if(couponErr.innerHTML != "")
	{
		flag = false;
	}
	if(flag)
	{
		const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				const response_data = this.responseText;
				// const response_data = JSON.parse(this.responseText);
				try
				{
					json_data = JSON.parse(response_data);
					console.log(json_data);
					if(json_data.status == true)
					{
						
						window.location.href = "../ticket/details.php?ticket_id=" + json_data.ticket_id;
						
					}
				}
				catch
				{
					console.log(response_data);
				}
			}
		}
		xhttp.open("POST", "../../Controller/bus/book_request.php?bus_id="+_bus_id, true);
		console.log(_bus_id);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
		// const content = JSON.stringify({seat: seat, coupon: coupon_data.coupon});
		let content;
		if(coupon_data != false)
		{
			content = "seat="+JSON.stringify(seat)
					+"&coupon="+coupon_data.coupon;
		}
		else
		{
			content = "seat="+JSON.stringify(seat);
		}
		
		console.log(content);
		xhttp.send(content);
	}
	return false;

}
function updateBookingData()
{
	var seat_input = document.getElementById("seat-input");
	var seat_price = document.getElementById("seat_price").innerHTML;
	var seatChoosen = document.getElementById("seat-choosen-data");
	var total_price = document.getElementById("total_price");
	var discount_price = document.getElementById("discount_price");
	var final_price = document.getElementById("final_price");

	var formBody = document.getElementById("booking-form");
	var form = new FormData(formBody);
	const seat = form.getAll("seat[]");
	seat_input.value = JSON.stringify(seat);
	seatChoosen.innerHTML = seat;
	total_price.innerHTML = seat_price * seat.length;

	if(coupon_data != false)
	{
		// console.log(coupon_data);
		const percentage = coupon_data.percentage;
		const max_discount = coupon_data.max_discount;
		discount1 = total_price.innerHTML*percentage/100.00;
		discount2 = max_discount;
		discount_price.innerHTML = Math.min(discount1, discount2).toString();
	}
	else{
		discount_price.innerHTML = "0";
	}
	final_price.innerHTML = (total_price.innerHTML - discount_price.innerHTML).toString();
}

function load_page(bus_id){
	const xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			const response_data = JSON.parse(this.responseText);
			_bus_id = response_data.bus_data.id;
			document.getElementById("bus_id").innerHTML = response_data.bus_data.id;
			document.getElementById("bus_name").innerHTML = response_data.bus_data.bus_name;
			document.getElementById("total_seat").innerHTML = response_data.bus_data.total_seat;
			document.getElementById("seat_price").innerHTML = response_data.bus_data.seat_price;
			document.getElementById("start_place").innerHTML = response_data.start_place;
			document.getElementById("end_place").innerHTML = response_data.end_place;
			document.getElementById("start_datetime").innerHTML = response_data.bus_data.start_datetime;
			document.getElementById("end_datetime").innerHTML = response_data.bus_data.end_datetime;
			document.getElementById("status").innerHTML = response_data.bus_data.status;

			// Assuming busData, booked_seat, and seat are already defined in your JavaScript context
			const total_seat = response_data.bus_data.total_seat;
			const booked_seat_data = response_data.booked_seat_data;
			for (let i = 1; i <= total_seat; i++) {
				let checkbox = document.createElement("input");
				checkbox.type = "checkbox";
				checkbox.className = "checkbox-seat";
				checkbox.value = i;
				checkbox.name = "seat[]";
				checkbox.id = "seat_" + i;

				// Check if the seat is already booked
				if (booked_seat_data.includes(i)) {
					checkbox.checked = true;
					checkbox.disabled = true;
				}
				checkbox.addEventListener("change", updateBookingData);

				let label = document.createElement("label");
				label.className = "seat-label";
				label.htmlFor = "seat_" + i;
				label.appendChild(document.createTextNode(i));

				// Append the checkbox and label to a container element (e.g., a div)
				let container = document.getElementById("seat-view"); // replace with the actual container ID
				container.appendChild(checkbox);
				container.appendChild(label);
			}

		}
	}
	xhttp.open("GET", "../../controller/bus/get_bus_data.php?bus_id="+bus_id);
	xhttp.send();
}

function validatedCoupon(coupon){
	if(coupon == "")
	{
		document.getElementById("couponErr").innerHTML = "";
	}
	else
	{
		const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				const response_data = JSON.parse(this.responseText);
				coupon_data = response_data;
				// console.log(response_data);
				if(response_data == false){
					document.getElementById("couponErr").innerHTML = "Coupon is not valid";
				}
				else{
					document.getElementById("couponErr").innerHTML = "";
				}
				updateBookingData();

			}
		}
		xhttp.open("GET", "../../controller/bus/get_coupon_data.php?coupon="+coupon);
		xhttp.send();
	}
}