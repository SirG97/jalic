<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class User extends Model{
    public $timestamps = true;
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'lastname', 'firstname', 'email', 'password',
                            'admin_right', 'job_description', 'job_title', 'image','branch', 'unit_manager', 'address',
                            'online_status', 'phone'];
}