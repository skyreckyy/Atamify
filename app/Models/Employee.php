<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'active',
        'duty',
        'code_employee',
        'created_at'
    ];

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The primary key associated with the table
     * @var string
     */
    protected $primaryKey = 'id';

}
