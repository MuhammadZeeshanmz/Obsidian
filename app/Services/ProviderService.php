<?php

namespace App\Services;

use App\Models\Practice;
use App\Models\PracticeLocation;
use App\Models\Provider;
use App\Models\ProviderBilling;
use Illuminate\Support\Facades\DB;

class ProviderService
{
    public function createProvider($request)
    {
        DB::beginTransaction();
        try {
            $provider = Provider::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'organization_name' => $request->organization_name,
                'provider_type' => $request->provider_type,
                'type' => $request->type,
                'credentials' => $request->credentials,
                'mi' => $request->mi,
                'npi_code' => $request->npi_code,
                'taxonomy_spec_id' => $request->taxonomy_spec_id,
                'reference' => $request->reference,
                'provider_code' => $request->provider_code,
                'pager' => $request->pager,
                'home_phone' => $request->home_phone,
                'cell_phone' => $request->cell_phone,
                'fax' => $request->fax,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'zip' => $request->zip,
                'state' => $request->state,
                'tax_id' => $request->tax_id,
                'qualification' => $request->qualification,
                'phone' => $request->phone,
                'extension' => $request->extension,
                'email' => $request->email,
                'specialty_license' => $request->specialty_license,
                'state_license' => $request->state_license,
                'anesthesia_license' => $request->anesthesia_license,
                'upin' => $request->upin,
                'blue_cross' => $request->blue_cross,
                'tricare_champus' => $request->tricare_champus,
                'revenue_code_id' => $request->revenue_code_id,
                'facility_id' => $request->facility_id,
                'customer_id' => $request->customer_id,
                'user_id' => $request->user_id,
                'note_id' => $request->note_id,
                'alert_id' => $request->alert_id,
            ]);
            $this->billing($request, $provider);
            DB::commit();
            return $provider;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
    private function billing($request, $provider){
        if (!empty($request->billing)) {
            ProviderBilling::updateOrCreate(
            [
                'provide_id' => $provider['id'],
                'id'=>$provider['id'],
                
            ],
            [
                'practice_id'=> $request->billing['practice_id'] ?? null,
                'bill_claim_under' => $request->billing['bill_claim_under'] ?? null,
                'claim_provider_id' => $request->billing['claim_provider_id'] ?? null,
                'check_eligibility_under_status' => $request->billing['check_eligibility_under_status'] ?? null,
                'check_eligibility_under_id' => $request->billing['check_eligibility_under_id'] ?? null,
                'ssn_type' => $request->billing['ssn_type'] ?? null,
                'id_num' => $request->billing['id_num'] ?? null,
                'bill_as' => $request->billing['bill_as'] ?? '',
                'ein' => $request->billing['ein'] ?? null,
                'ssn' => $request->billing['ssn'] ?? null,
                'professional_mode' => $request->billing['professional_mode'] ?? null,
                'institutional_mode' => $request->billing['institutional_mode'] ?? null,
                'specialty_license' => $request->billing['specialty_license'] ?? null,
                'state_license' => $request->billing['state_license'] ?? null,
                'anesthesia_license' => $request->billing['anesthesia_license'] ?? null,
                'upin' => $request->billing['upin'] ?? null,
                'blue_cross' => $request->billing['blue_cross'] ?? null,
                'champus_num' => $request->billing['champus_num'] ?? null,
                'revenue_codes_id' => $request->billing['revenue_codes_id'] ?? null,
                'customer_id' => $request->billing['customer_id'] ?? null,
                'user_id' => $request->billing['user_id'] ?? null,
            ]
            );
        }
    }
    public function updateProvider($request, $id)
    {
        try {
            $provider = Provider::findOrFail($id);
            $provider->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'organization_name' => $request->organization_name,
                'provider_type' => $request->provider_type,
                'type' => $request->type,
                'credentials' => $request->credentials,
                'mi' => $request->mi,
                'npi_code' => $request->npi_code,
                'taxonomy_spec_id' => $request->taxonomy_spec_id,
                'reference' => $request->reference,
                'provider_code' => $request->provider_code,
                'pager' => $request->pager,
                'provider_status' => $request->provider_status,
                'home_phone' => $request->home_phone,
                'cell_phone' => $request->cell_phone,
                'fax' => $request->fax,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'zip' => $request->zip,
                'state' => $request->state,
                'tax_id' => $request->tax_id,
                'qualification' => $request->qualification,
                'phone' => $request->phone,
                'extension' => $request->extension,
                'email' => $request->email,
                'specialty_license' => $request->specialty_license,
                'state_license' => $request->state_license,
                'anesthesia_license' => $request->anesthesia_license,
                'upin' => $request->upin,
                'blue_cross' => $request->blue_cross,
                'tricare_champus' => $request->tricare_champus,
                'revenue_code_id' => $request->revenue_code_id,
                'facility_id' => $request->facility_id,
                'note_id' => $request->note_id,
                'alert_id' => $request->alert_id,

            ]);
            $this->billing($request, $provider);
            return $provider;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function accessd()
    {
        try {
            $provider = Provider::orderBy('recently_accessed', 'desc')
                ->take(5)
                ->get();
            return $provider;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
