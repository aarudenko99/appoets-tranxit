var TripTimer = -1;
var audio = new Audio('../ride_alert.mp3');
var isPlaying = false;

$( document ).ready(function() {

   TripTimer = setInterval(
            () => getTripsUpdate(),
            1000
        );


    $("#to-dispatcher").click(function() {

        $.get('/admin/dispatcher/mark_as_read', function( data ) {
            
            window.location.href = "/admin/dispatcher";
        });
    })
});

function getTripsUpdate() {

    $.get('/admin/dispatcher/new_trips', function(result) {

            if(result.length > 0)
            {
                if (!isPlaying) {
                    audio.play();
                    isPlaying = true;
                }

                $("#request-notification").css("display", "block");

                var trip = result[0];

                $("#request-notification .request-name").html(trip.user.first_name + " " + trip.user.last_name);
                $("#request-notification .request-addrfrom").html("From: " + trip.s_address);
                $("#request-notification .request-addrto").html("To: " + trip.d_address);
                $("#request-notification .request-payment").html("Payment: " + trip.payment_mode);
                $("#request-notification .request-searchmode").html(trip.current_provider_id == 0 ? "Manual Assignment" : "Auto Search" + " : " + trip.created_at);
            }
            else {

                $("#request-notification").css("display", "none");
                audio.pause();
                audio.currentTime = 0;
                isPlaying = false;
            }
    });
}
