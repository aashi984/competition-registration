<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it's the default 'registrations')
    protected $table = 'registrations';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name',
        'contact_number',
        'gender',
        'email',
        'country',
        'college',
        'year',
        'domain'
    ];
}
