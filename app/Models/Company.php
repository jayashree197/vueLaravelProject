<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abn',
        'email',
        'address',
    ];

    //This is the relationship method
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}