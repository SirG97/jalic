<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



class Customer extends Model{
    use SoftDeletes;

    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = ['customer_id', 'name', 'title', 'marital_status', 'dob', 'phone', 'email', 'address',
                            'occupation', 'sex', 'image', 'saving_period', 'amount', 'account_number', 'account_name',
                            'bank', 'purpose', 'kin_name', 'kin_address', 'kin_phone', 'kin_relationship', 'kin_image',
                            'branch', 'unit_manager', 'unit_manager_phone', 'office', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function transform($data){
        $customers = [];
        foreach ($data as $item){
            array_push($customers,[
                'status' => $item->status,
                'customer_id' => $item->customer_id,
                'surname' => $item->surname,
                'firstname' => $item->firstname,
                'email' => $item->email,
                'phone' => $item->phone,
                'address' => $item->address,
                'city' => $item->city,
                'state' => $item->state,
                'amount' => $item->amount,
            ]);

        }
        return $customers;
    }
}