<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = "beneficiaries";

    protected $fillable = [
        "user_id",
        "firstname",
        "middlename",
        "lastname",
        "suffix",
        "sex",
        "birthdate",
        "status",
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function service(){
        return $this->hasMany(Service::class);
    }

}
