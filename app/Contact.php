<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'dob', 
        'cemail', 'phno', 'address',
        'emergency_person', 'emergency_contact_no', 'photo'
    ];
}
