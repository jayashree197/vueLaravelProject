<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'company_id',
    ];

    //Relationship: an employee belongs to a company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
