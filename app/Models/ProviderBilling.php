<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderBilling extends Model
{
    use HasFactory;
    protected $table = "provider_billings";
    protected $fillable = [
        'provide_id',
        'practice_id',
        'bill_claim_under',
        'claim_provider_id',
        'check_eligibility_under_status',
        'check_eligibility_under_id',
        'ssn_type',
        'id_num',
        'bill_as',
        'ein',
        'ssn',
        'professional_mode',
        'institutional_mode',
        'specialty_license',
        'state_license',
        'anesthesia_license',
        'upin',
        'blue_cross',
        'champus_num',
        'revenue_codes_id',
        'customer_id',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at',

    ];
    public function practice(){
        return $this->belongsTo(Practice::class, 'practice_id');
    }
}
