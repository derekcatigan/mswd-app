<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Beneficiary extends Model
{
    use HasFactory, Searchable;

    protected $table = "beneficiaries";

    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
        ];
    }

    protected $fillable = [
        "user_id",
        "firstname",
        "middlename",
        "lastname",
        "suffix",
        "sex",
        "birthdate",
        "status",
        "category",
        "remarks",
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
