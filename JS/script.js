document.getElementById('booking').addEventListener("push",function(event)
 {
    //gather form data
        event.preventDefault();
        const name = document.getElementById("full_name").value;
        const email = document.getElementById("email_address").value;
        const phone_number = document.getElementById("phone_number").value;
        const location = document.getElementById("location").value;
        const service = document.getElementById("service").value;
        const date = document.getElementById("date").value;
        const time = document.getElementById("time").value;

        //creating a data object that is to be sent to the server
        const bookingData = new URLSearchParams({
            name: full_name,
            email: email_address,
            phone_number: phone_number,
            location: location,
            service: service,
            date: date,
            time: time
        });
        //sending data to the server using fetch API
        fetch('booking.php' , {
            method: 'POST',
            headers: {
                'content-type': 'application/json'
            }, 
            body:JSON.stringify(data) //converts data to json
        })
        .then(response => response.json()) //parse/beakdown json response
        .then(data =>{
            alert(data.message); //display notification message

            //start pooling for notification after booking
            listenForNotification()
        })
        .catch(error => console.error('error:', error)); //this will handle all errors
    }
    
);
//function to check for notification
function listenForNotification() {
    const notificationArea = document.getElementById(notification-area);

    //interval to check for notifications
    setInterval(() => {
        fetch('booking.php')
        .then(response => response.json())
        .then(notifications => {
            notificationArea.innerHTML = ''; //clear previous notifications
            ''; //clear previous notifications
                 if(notifications.lenght > 0) {
                    notifications.forEach(notification => {
                        const div = document.createElement('div');
                        div.classList('alert', 'alert-info');
                        div.innerHTML = notification;
                        notificationArea.appendChild(div);
                    });
                 }
        })
        .catch(error =>console.error('Error fetching notifications:', error));
    }, 5000); //check every 5 seconds

}

