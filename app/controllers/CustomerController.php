<?php


namespace App\Controllers;

use App\Classes\Encryption;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Classes\CSRFToken;
use App\Classes\Random;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Validation;
use App\Models\Customer;
use App\Models\Contribution;

class CustomerController extends BaseController{
    public function show(){
        $customers = Customer::all();
        return view('user\customers', ['customers' => $customers]);
    }

    public function getcustomer($id){
        $customer_id = $id['customer_id'];
        $customer = Customer::where('customer_id', $customer_id)->first();

        $total = Contribution::where('phone', $customer->phone)->count();
        $object = new Contribution();
        $filter = ['phone' => $customer->phone];
        list($contributions, $links) = paginate(20,$total,'contributions', $object, $filter);

        $total_donation = 0;
        $total_available = 0;

        $all_contribution = Contribution::where('phone', $customer->phone)->get();
        for($i = 0; $i < count($all_contribution); $i++){
            $total_donation = $total_donation + (int)$all_contribution[$i]->ledger_bal;
            $total_available = $total_available + (int)$all_contribution[$i]->available_bal;
        }

        $maintenance = $total_donation - $total_available;

        return view('user\order', ['customer' =>$customer,
            'links' => $links,
            'contributions' => $contributions,
            'total_donation' => $total_donation,
            'total_available' => $total_available,
            'maintenance' => $maintenance]);
    }

    public function getcontribution($id){
        $contribution_id = $id['contribution_id'];
        return view('user/customercontributions');
    }


    public function showcustomerform(){
        return view('user\customer');
    }

    public function storecustomer(){
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){

                $rules = [
                    'email' => ['required' => true, 'maxLength' => 30, 'email' => true, 'unique' =>'customers'],
                    'name' => ['required' => true, 'maxLength' => 50, 'string' => true],
                    'title' => ['string' => true, 'maxLength' => 10],
                    'phone' => ['required' => true,'maxLength' => 14, 'minLength' => 11, 'number' => true, 'unique' => 'customers'],
                    'marital_status' => [ 'maxLength' => '50', 'string' => true],
                    'occupation' => ['maxLength' => '50', 'string' => true],
                    'address' => ['required' => true, 'maxLength' => '150'],
                    'dob' => ['mixed' => true],
                    'sex' => ['maxLength' => 10,  'string' => true],
                    'image' => ['string' => true],
                    'saving_period' => ['required' => true, 'string' => true],
                    'amount' => ['required' => true,  'number' => true],
                    'account_number' => ['number' => true],
                    'amount' => ['required' => true,  'number' => true],
                    'bank' => ['string' => true],
                    'purpose' => ['mixed' => true],
                    'kin_name' => ['mixed' => true],
                    'kin_address' => ['mixed' => true],
                    'kin_phone' => ['mixed' => true],
                    'office' => ['mixed' => true],
                    'kin_relationship' => ['mixed' => true],
                ];
                $validation = new Validation();
                $validation->validate($_POST, $rules);
                if($validation->hasError()){
                    $errors = $validation->getErrorMessages();
                    return view('user\customer', ['errors' => $errors]);
                }

                //Add the user
                $details = [
                    'customer_id' => Random::generateId(16),
                    'name' => $request->name,
                    'title' => $request->title,
                    'phone' => $request->phone,
                    'marital_status' => $request->marital_status,
                    'occupation' => $request->occupation,
                    'address' => $request->address,
                    'dob' => $request->dob,
                    'sex' => $request->sex,
//                    'image' => $request->image,
                    'saving_period' => $request->saving_period,
                    'amount' => $request->amount,
                    'account_number' => $request->account_number,
                    'account_name' => $request->account_name,
                    'bank' => $request->bank,
                    'purpose' => $request->purpose,
                    'kin_name' => $request->kin_name,
                    'kin_address' => $request->kin_address,
                    'kin_phone' => $request->kin_phone,
                    'kin_relationship' => $request->kin_relationship,
                    'office' => $request->office
                ];

                Customer::create($details);

                Request::refresh();

                Session::add('success', 'New customer created successfully');

                Redirect::to('/customers');
                exit();

            }

            Redirect::to('/customer');
        }
    }

    public function editcustomer($id){

        $customer_id = $id['customer_id'];
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                $rules = [
                    'email' => ['required' => true, 'maxLength' => 30, 'email' => true, 'unique_edit' => 'customers|' .$customer_id .'|customer_id'],
                    'firstname' => ['required' => true, 'maxLength' => 40, 'string' => true],
                    'surname' => ['string' => true, 'maxLength' => 40],
                    'phone' => ['required' => true,'maxLength' => 14, 'minLength' => 11],
                    'city' => ['required' => true, 'maxLength' => '50', 'string' => true],
                    'state' => ['required' => true, 'maxLength' => '50', 'string' => true],
                    'address' => ['required' => true, 'maxLength' => '150'],
                    'amount' => ['required' => true,  'number' => true]
                ];
                $validation = new Validation();
                $validation->validate($_POST, $rules);
                if($validation->hasError()){
                    $errors = $validation->getErrorMessages();
                    header('HTTP 1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit();
                }

                //Add the user
                $details = [
                    'surname' => $request->surname,
                    'firstname' => $request->firstname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'amount' => $request->amount,

                ];

                Customer::where('customer_id', $customer_id)->update($details);
                echo json_encode(['success' => 'Customer details updated successfully']);
                exit();

            }else{
                echo 'token error';
            }

            //Redirect::to('/customer');
        }else{
            echo 'request error';
        }

    }

    public  function deletecustomer($id){
        $customer_id = $id['customer_id'];

        if(Request::has('post')){
            $request = Request::get('post');

            if(CSRFToken::verifyCSRFToken($request->token)){

                $customer = Customer::where('customer_id', '=', $customer_id)->first();
                $customer->delete();
                Session::add('success', 'Customer deleted successfully');
                Redirect::to('/customers');
            }

        }else{
            echo 'request error';
        }

    }

    public function searchcustomer($terms){
        //Get the value of the term from the array
        $term = trim($terms['terms']);
        $searchresult = Customer::query()
            ->where('surname', 'LIKE', "%{$term}%")
            ->orWhere('firstname', 'LIKE', "%{$term}%")
            ->orWhere('email', 'LIKE', "%{$term}%")
            ->orWhere('phone', 'LIKE', "%{$term}%")->get();
        if(count($searchresult) > 0){
            echo json_encode(['success' => $searchresult]);
            exit();
        }else{
            echo json_encode(['success' => 'No result found']);
            exit();
        }

    }

}