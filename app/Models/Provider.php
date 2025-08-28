<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'providers';
    protected $fillable = [
        'first_name',
        'last_name',
        'organization_name',
        'provider_type',
        'type',
        'credentials',
        'mi',
        'npi_code',
        'taxonomy_spec_id',
        'reference',
        'provider_code',
        'pager',
        'provider_status',
        'home_phone',
        'cell_phone',
        'fax',
        'address1',
        'address2',
        'city',
        'state',
        'tax_id',
        'qualification',
        'phone',
        'extenison',
        'email',
        'specialty_license',
        'state_license',
        'anesthesia_license',
        'upin',
        'blue_cross',
        'tricare_champus',
        'revenue_code_id',
        'facility_id',
        'customer_id',
        'user_id',
        'recently_accessed',
        'deleted_at',
        'created_at',
        'updated_at',
        'note_id',
        'alert_id',

    ];
    public function billing()
    {
        return $this->hasOne(ProviderBilling::class, 'provide_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'model_id');
    }
    public function alert(){
        return $this->hasMany(Alert::class, 'model_id');
    }
}
    