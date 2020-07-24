<?php


namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Validation;
use App\Models\Contribution;
use App\Models\Order;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;

class DashboardController extends BaseController{
    public function __construct()
    {
        if(!isAuthenticated()){
            Redirect::to('/login');
        }
    }
    public function show(){

        $total_customers = Customer::all()->count();

         // Total completed
        $t_contribution = Contribution::where([
            ['request_type', '=' , 'credit'],
            ['status', '=' , 'approved'],
        ])->get();
        $total_contribution = number_format($t_contribution->sum('amount'));
//
        $t_revenue = Contribution::where([
            ['request_type', '=' , 'credit'],
            ['status', '=' , 'approved'],
        ])->get();
        $total_revenue = number_format($t_revenue->sum('gain'));

        $total_staff = User::all()->count();

        $contributions = Contribution::where('status', 'approved')->with(['user'])->orderBy('id','desc')->limit(10)->get();

        return view('user.dashboard', ['total_customers' => $total_customers,
                                                'total_contribution' => $total_contribution,
                                                'total_revenue' => $total_revenue,
                                                'total_staff' => $total_staff,
                                                'contributions' => $contributions
                                                ]);
    }

    public function get(){
        $data = Request::old('post', 'name');
        $request = Request::get('post');

    }

    public function store(){

        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                var_dump('hia chim oo');

                $rules = [
                    'surname' => ['required' => true, 'maxLength' => 7, 'string' => true, 'unique' =>'users']
                ];
                $validation = new Validation();
                $validation->validate($_POST, $rules);
                if($validation->hasError()){
                    var_dump($validation->getErrorMessages());
                    exit();
                }
                return view('user/dashboard', compact('error'));
            }

            throw new \Exception('Token mismatch');
        }


    }


}