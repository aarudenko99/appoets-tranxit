<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php 
$amount= $_GET['amt'];
?> 
<form action="{!!route('login')!!}" method="POST" >
                        <!-- Note that the amount is in paise = 50 INR -->
                        <!--amount need to be in paisa-->
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="rzp_test_NTq6Lp0RfckNIk"
                                data-amount="<?php echo $amount; ?>"
                                data-buttontext="Pay 10 INR"
                                data-name="Laravelcode"
                                data-description="Order Value"
                                data-image="yout_logo_url"
                                data-prefill.name="name"
                                data-prefill.email="email"
                                data-theme.color="#ff7529">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    </form>
					<script>
					$(document).ready(function(){
						$('.razorpay-payment-button').hide();
						$('.razorpay-payment-button').trigger('click');
					});
					</script>
               