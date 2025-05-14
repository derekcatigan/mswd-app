<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        "user_id",
        "service_type",
        "service",
    ];

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }
}
