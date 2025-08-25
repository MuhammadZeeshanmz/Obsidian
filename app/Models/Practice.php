<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;
    protected $table = 'practices';
    protected $fillable = [
        'name',
        'org_type_id',
        'taxonomy_spec_id',
        'reference',
        'tcn_prefix',
        'statement_tcn_prefix',
        'practice_code',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'fax',
        'email',
        'extenison',
        'website',
        'pay_address1',
        'pay_address2',
        'pay_city',
        'pay_state',
        'pay_zip',
        'practice_status',
        'customer_id',
        'user_id',
        'recently_accessed',
        'npi_code',
        'payaddress_same_pa',

    ];

}
