<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeLocation extends Model
{
    use HasFactory;

    protected $table = 'practice_locations';
    protected $fillable = [
        'practice_id',
        'practice_location_status',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at',
        'name',
        'npi_code',
        'address1',
        'address2',
        'city',
        'state',
        'zip',


    ];

}
