<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SendPushNotification;

 use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeInvalidRequestError; 
use Illuminate\Support\Facades\Input;
use Razorpay\Api\Api;
use Session;
use Redirect;
use Auth;
use Setting;
use Exception;
use App\Card;
use App\User;
use App\WalletPassbook;
use App\UserRequests;
use App\UserRequestPayment;


class PaymentController extends Controller
{
       /**
     * payment for user.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {

        // $this->validate($request, [
        //         'request_id' => 'required|exists:user_request_payments,request_id|exists:user_requests,id,paid,0,user_id,'.Auth::user()->id
        //     ]);


        $UserRequest = UserRequests::find($request->request_id);
         
        if($UserRequest->payment_mode == 'CARD') {

            $RequestPayment = UserRequestPayment::where('request_id',$request->request_id)->first(); 
            
            $razorCharge = $RequestPayment->total * 100;

            if($razorCharge  == 0){

                $RequestPayment->payment_mode = 'CARD';
                $RequestPayment->save();

                $UserRequest->paid = 1;
                $UserRequest->status = 'COMPLETED';
                $UserRequest->save();


                if($request->ajax()) {
                   return response()->json(['message' => trans('api.paid')]); 
                } else {
                    return redirect('dashboard')->with('flash_success','Paid');
                }

           }else{

              if( !empty($request->razorpay_payment_id)) {
                  try {
                      $api = new Api(Setting::get('razorpay_publishable_key'), Setting::get('razorpay_secret_key'));
        
                      $response = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>$razorCharge)); 

                      $RequestPayment->payment_id = $request->razorpay_payment_id;
                      $RequestPayment->payment_mode = 'CARD';
                      $RequestPayment->save();

                      $UserRequest->paid = 1;
                      $UserRequest->status = 'COMPLETED';
                      $UserRequest->save();

                      if($request->ajax()) {
                         return response()->json(['message' => trans('api.paid')]); 
                      } else {
                          return redirect('dashboard')->with('flash_success','Paid');
                      }

                  } catch (\Exception $e) {

                      if($request->ajax()){
                          return response()->json(['error' => $e->getMessage()], 500);
                      } else {
                          return back()->with('flash_error', $e->getMessage());
                      }
                  }
                }
            }
        }
    }

    /**
     * add wallet money for user.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_money(Request $request){

		
        /* $this->validate($request, [
                'amount' => 'required|integer',
                'card_id' => 'required|exists:cards,card_id,user_id,'.Auth::user()->id
            ]); */
		// razorpay code starts 
		//Input items of form
       // $input = Input::all();
        //get API Configuration 
        $api = new Api(Setting::get('razorpay_publishable_key'), Setting::get('razorpay_secret_key'));
        
        if( !empty($request->razorpay_payment_id)) {
            try {
                $response = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>$request->razorpay_amount * 100)); 

            } catch (\Exception $e) {
                return $e->getMessage();
                \Session::put('error',$e->getMessage());
               // return redirect()->back();
            }

            // Do something here for store payment details in database..
        }
		//razorpay code ends here
		
        try{
            
            // $StripeWalletCharge = $request->amount * 100;

            /* Stripe::setApiKey(Setting::get('stripe_secret_key'));

            $Charge = Charge::create(array(
                  "amount" => $StripeWalletCharge,
                  "currency" => "inr",
                  "customer" => Auth::user()->stripe_cust_id,
                  "card" => $request->card_id,
                  "description" => "Adding Money for ".Auth::user()->email,
                  "receipt_email" => Auth::user()->email
                )); */

            $update_user = User::find(Auth::user()->id);
			      $update_user->wallet_balance += $request->razorpay_amount; 
            $update_user->save();

            WalletPassbook::create([
              'user_id' => Auth::user()->id,
              'amount' => $request->razorpay_amount,
              'status' => 'CREDITED',
              'via' => 'CARD',
            ]); 

            // Card::where('user_id',Auth::user()->id)->update(['is_default' => 0]);
            //Card::where('card_id',$request->card_id)->update(['is_default' => 1]);

            //sending push on adding wallet money
            (new SendPushNotification)->WalletMoney(Auth::user()->id,currency($request->razorpay_amount));

            if($request->ajax()){
                return response()->json(['message' => currency($request->razorpay_amount).trans('api.added_to_your_wallet'), 'user' => $update_user]); 
            } else {
                return redirect('wallet')->with('flash_success',currency($request->razorpay_amount).' added to your wallet');
            }

        // } catch(StripeInvalidRequestError $e) {
        //     if($request->ajax()){
        //          return response()->json(['error' => $e->getMessage()], 500);
        //     }else{
        //         return back()->with('flash_error',$e->getMessage());
        //     }
        } catch(Exception $e) {
            if($request->ajax()) {
                return response()->json(['error' => $e->getMessage()], 500);
            } else {
                return back()->with('flash_error', $e->getMessage());
            }
        }
    }
}
