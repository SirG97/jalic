<?php

namespace App\Controllers;

use App\Classes\Encryption;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Classes\CSRFToken;
use App\Classes\Random;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Validation;
use App\Models\Customer;
use App\Models\Contribution;

class ContributionController extends BaseController {

    public $table_name = 'contributions';
    public $customers;
    public $links;

    public function __construct()
    {
        if(!isAuthenticated()){
            Redirect::to('/login');
        }
    }

    public function get_all(){
        $contributions = Contribution::where('status', 'approved')->with(['user'])->get();

        return view('user\contributions', ['contributions' => $contributions]);
    }

    public function unapproved(){
        $contributions = Contribution::where('status','!=', 'approved')->with(['user'])->get();

        return view('user\unapproved', ['contributions' => $contributions]);
    }

    public function approve(){
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){

                $rules = [
                    'contribution_id' => ['required' => true]
                ];
                $validation = new Validation();
                $validation->validate($_POST, $rules);
                if($validation->hasError()){
                    $errors = $validation->getErrorMessages();
                    Session::add('error', 'Validation failed..');
                    Redirect::to('/unapproved');
                    exit();
                }

                $details = [
                    'status' => 'approved',
                    'approved_by' => Session::get('SESSION_USER_ID')
                ];

                Contribution::where('contribution_id', $request->contribution_id)->update($details);
                Session::add('success', 'Transaction approved');

                Redirect::to('/unapproved');
                exit();

            }

            Redirect::to('/unapproved');
        }
    }

    public function contribute_form(){
        $staff = User::all();
        return view('user\contribute', ['staff' => $staff]);
    }

    public function contribute(){
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                //Validation Rules
                $rules = [
                    'customer_id' => ['required' => true],
                    'name' => ['required' => true,'string' => true],
                    'collected_by' => ['mixed' => true],
                    'posted_by' => ['required' => true, 'mixed' => true],
                    'amount' => ['required' => true, 'number' => true],
                    'request_type' => ['required' => true, 'string' => true],
                    'savings_type' => ['required' => true, 'string' => true],
                    'collected_on' => ['mixed' => true],
                    'description' => [ 'mixed' => true],
                ];
                //Run Validation and return errors
                $validation = new Validation();
                $validation->validate($_POST, $rules);
                if($validation->hasError()){
                    $errors = $validation->getErrorMessages();
                    return view('user\contribute', ['errors' => $errors]);
                }

                $is_registered_customer = Customer::where('customer_id', '=', $request->customer_id)->first();
                if($is_registered_customer == null){
                    Session::add('error', 'This customer details not found');
                    Redirect::to('/contribute');
                    exit();
                }
                //get his last contribution and see if it is null, a debit or a credit
                $last_contribution = Contribution::where('customer_id', $request->customer_id)->latest('id')->first();
                if($last_contribution == null){
                    // It means he is a first timer
                    if($request->request_type === 'credit'){
                        if($request->savings_type === 'savings' or $request->savings_type === 'property'){
                            $amount = (int)$request->amount;
                            $available_balance = $amount - ($amount * 0.033);
                            $gain = $amount * 0.033;
                            Contribution::create([
                                'contribution_id' => Random::generateId(16),
                                'customer_id' => $request->customer_id,
                                'amount' => $amount,
                                'balance' => $available_balance,
                                'gain' => $gain,
                                'loan' => '',
                                'request_type' => $request->request_type,
                                'savings_type' => $request->savings_type,
                                'collected_by' => $request->collected_by,
                                'posted_by' => $request->posted_by,
                                'collected_on' => $request->collected_on,
                                'description' => $request->description,
                                'status' => 'awaiting approval'
                            ]);
                            Request::refresh();
                            Session::add('success', 'Account credited successfully');
                            return view('user\contribute');
                        }elseif($request->savings_type === 'loan'){
                            Request::refresh();
                            Session::add('error', 'You have no loan to payback');
                            return view('user\contribute');
                        }else{
                            //bad request
                            Request::refresh();
                            Session::add('error', 'This request is not understood');
                            return view('user\contribute');
                        }
                    }elseif($request->request_type === 'debit'){
                        if($request->savings_type === 'savings' or $request->savings_type === 'property'){
                            if($last_contribution->balance >= $request->amount){
                                $remaining_balance = $last_contribution->balance - (int)$request->amount;
                                Contribution::create([
                                    'contribution_id' => Random::generateId(16),
                                    'customer_id' => $request->customer_id,
                                    'amount' => $request->amount,
                                    'balance' => $remaining_balance,
                                    'gain' => 0,
                                    'loan' => 0,
                                    'request_type' => $request->request_type,
                                    'savings_type' => $request->savings_type,
                                    'collected_by' => $request->collected_by,
                                    'posted_by' => $request->posted_by,
                                    'collected_on' => $request->collected_on,
                                    'description' => $request->description,
                                    'status' => 'awaiting approval'
                                ]);
                                Session::add('success', 'Savings debit successful');
                                Redirect::to('/mark_contribution');
                                exit();
                            }else{
                                Session::add('error', 'Available balance is less than them amount you want to withdraw');
                                Redirect::to('/mark_contribution');
                                exit();
                            }
                        }elseif($request->savings_type === 'loan'){
                            $loan = (int)$request->amount;
                            Contribution::create([
                                'contribution_id' => Random::generateId(16),
                                'customer_id' => $request->customer_id,
                                'amount' => $request->amount,
                                'balance' => 0,
                                'gain' => 0,
                                'loan' => $loan,
                                'request_type' => $request->request_type,
                                'savings_type' => $request->savings_type,
                                'collected_by' => $request->collected_by,
                                'posted_by' => $request->posted_by,
                                'collected_on' => $request->collected_on,
                                'description' => $request->description,
                                'status' => 'awaiting approval'
                            ]);
                            Session::add('success', 'Loan debit successful');
                            Redirect::to('/mark_contribution');
                            exit();
                        }else{
                            //bad request
                            Session::add('error', 'This request is not understood');
                            Redirect::to('/mark_contribution');
                            exit();
                        }
                    }else{
                        //Something is wrong with the request
                        Session::add('error', 'This request is not understood');
                        Redirect::to('/mark_contribution');
                        exit();
                    }

                }else{
                    /*
                     * When he is no long a first timer
                     */
                    if($request->request_type === 'credit'){
                        if($request->savings_type === 'savings' or $request->savings_type === 'property'){
                            $amount = (int)$request->amount;
                            $available_balance = (int)$last_contribution->balance + ($amount - ($amount * 0.033));
                            $gain = $amount * 0.033;
                            Contribution::create([
                                'contribution_id' => Random::generateId(16),
                                'customer_id' => $request->customer_id,
                                'amount' => $amount,
                                'balance' => $available_balance,
                                'gain' => $gain,
                                'loan' => 0,
                                'request_type' => $request->request_type,
                                'savings_type' => $request->savings_type,
                                'collected_by' => $request->collected_by,
                                'posted_by' => $request->posted_by,
                                'collected_on' => $request->collected_on,
                                'description' => $request->description,
                                'status' => 'awaiting approval'
                            ]);
                            Request::refresh();
                            Session::add('success', 'Account credited successfully');
                            return view('user\contribute');
                        }elseif($request->savings_type === 'loan'){
                            if((int)$last_contribution->loan > 0 and (int)$request->amount <= (int)$last_contribution->loan){
                                $loan_balance = $last_contribution->loan - $request->amount;
                                Contribution::create([
                                    'contribution_id' => Random::generateId(16),
                                    'customer_id' => $request->customer_id,
                                    'amount' => $request->amount,
                                    'balance' => $last_contribution->balance,
                                    'gain' => 0,
                                    'loan' => $loan_balance,
                                    'request_type' => $request->request_type,
                                    'savings_type' => $request->savings_type,
                                    'collected_by' => $request->collected_by,
                                    'posted_by' => $request->posted_by,
                                    'collected_on' => $request->collected_on,
                                    'description' => $request->description,
                                    'status' => 'awaiting approval'
                                ]);
                                Request::refresh();
                                Session::add('success', 'Loan credited successfully');
                                Redirect::to('/mark_contribution');
                            }else{
                                Session::add('error', 'The amount you want to pay back is bigger than the loan');
                                return view('user\contribute');
                            }

                        }else{
                            //bad request
                            Request::refresh();
                            Session::add('error', 'This request is not understood');
                            return view('user\contribute');
                        }
                    }elseif($request->request_type === 'debit'){
                        if($request->savings_type === 'savings' or $request->savings_type === 'property'){
                            if($last_contribution->balance >= $request->amount){
                                $remaining_balance = $last_contribution->balance - (int)$request->amount;
                                Contribution::create([
                                    'contribution_id' => Random::generateId(16),
                                    'customer_id' => $request->customer_id,
                                    'amount' => $request->amount,
                                    'balance' => $remaining_balance,
                                    'gain' => 0,
                                    'loan' => 0,
                                    'request_type' => $request->request_type,
                                    'savings_type' => $request->savings_type,
                                    'collected_by' => $request->collected_by,
                                    'posted_by' => $request->posted_by,
                                    'collected_on' => $request->collected_on,
                                    'description' => $request->description,
                                    'status' => 'awaiting approval'
                                ]);
                                Session::add('success', 'Savings debit successful');
                                Redirect::to('/mark_contribution');
                                exit();
                            }else{
                                Session::add('error', 'Available balance is less than them amount you want to withdraw');
                                Redirect::to('/mark_contribution');
                                exit();
                            }
                        }elseif($request->savings_type === 'loan'){
                            $loan = (int)$last_contribution->loan + (int)$request->amount;
                            Contribution::create([
                                'contribution_id' => Random::generateId(16),
                                'customer_id' => $request->customer_id,
                                'amount' => $request->amount,
                                'balance' => $last_contribution->balance,
                                'gain' => 0,
                                'loan' => $loan,
                                'request_type' => $request->request_type,
                                'savings_type' => $request->savings_type,
                                'collected_by' => $request->collected_by,
                                'posted_by' => $request->posted_by,
                                'collected_on' => $request->collected_on,
                                'description' => $request->description,
                                'status' => 'awaiting approval'
                            ]);
                            Session::add('success', 'Loan debit successful');
                            Redirect::to('/mark_contribution');
                            exit();
                        }else{
                            //bad request
                            Session::add('error', 'This request is not understood');
                            Redirect::to('/mark_contribution');
                            exit();
                        }
                    }else{
                        //Something is wrong with the request
                        Session::add('error', 'This request is not understood');
                        Redirect::to('/mark_contribution');
                        exit();
                    }
                }
            }
        }
    }

    public  function message(){
        return view('user\message');
    }

    public function search_contribution($terms){
        //Get the value of the term from the array
        $term = trim($terms['terms']);
        $searchresult = Contribution::query()
            ->where('phone', 'LIKE', "%{$term}%")
            ->orWhere('pin', 'LIKE', "%{$term}%")->get();

        if(!empty($searchresult) and count($searchresult) > 0){
            echo json_encode(['success' => $searchresult]);
            exit();
        }else{
            echo json_encode(['error' => 'No result found']);
            exit();
        }

    }

    public function send_sms(){
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                //Validation Rules
                $rules = [
                    'customer_id' => ['required' => true],
                    'number' => ['required' => true,'number' => true],
                    'message' => ['required' => true,'mixed' => true],

                ];
                //Run Validation and return errors
                $validation = new Validation();
                $validation->validate($_POST, $rules);
                if($validation->hasError()){
                    $errors = $validation->getErrorMessages();
                    return view('user\message', ['errors' => $errors]);
                }

                $is_registered_customer = Customer::where('customer_id', '=', $request->customer_id)->first();
                if($is_registered_customer == null){
                    Session::add('error', 'This customer details not found');
                    Redirect::to('/message');
                    exit();
                }


                // Let's send our message
                $email = "sirgittarus@gmail.com";
                $password = "rrwcscrz1";
                $message = $request->message;
                $sender_name = "Jon Jalic";
                $recipients = $request->number;
                $forcednd = 1;

                $data = array(
                    "email" => $email,
                    "password" => $password,
                    "message"=>$message,
                    "sender_name"=>$sender_name,
                    "recipients"=>$recipients,
                    "forcednd"=>$forcednd);
                $data_string = json_encode($data);

                $ch = curl_init('https://app.multitexter.com/v2/app/sms');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
                $result = curl_exec($ch);
                $res_array = json_decode($result);
                dd($res_array);

            }
        }
    }

}