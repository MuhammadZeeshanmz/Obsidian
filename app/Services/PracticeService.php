<?php

namespace App\Services;

use App\Models\Practice;
use App\Models\PracticeLocation;
use Illuminate\Support\Facades\DB;

class PracticeService
{
    public function createPractice($request)
    {
        DB::beginTransaction();
        try {
            $practice = Practice::create([
                'name' => $request->name,
                'org_type_id' => $request->org_type_id,
                'taxonomy_spec_id' => $request->taxonomy_spec_id,
                'reference' => $request->reference,
                'tcn_prefix' => $request->tcn_prefix,
                'practice_code' => $request->practice_code,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'extension' => $request->extension,
                'website' => $request->website,
                'tax_id' => $request->tax_id,
                'pay_address1' => $request->pay_address1,
                'pay_address2' => $request->pay_address2,
                'pay_city' => $request->pay_city,
                'pay_state' => $request->pay_state,
                'pay_zip' => $request->pay_zip,
                'practice_status' => $request->practice_status,
                'statement_tcn_prefix' => $request->statement_tcn_prefix,
                'customer_id' => $request->customer_id,
                'user_id' => $request->user_id,
                'npi_code' => $request->npi_code,
                'payaddress_same_pa' => $request->payaddress_same_pa


            ]);
            PracticeLocation::create([
                'practice_id' => $practice->id,
                'name' => $practice->name,
                'address1' => $practice->address1,
                'address2' => $practice->address2,
                'city' => $practice->city,
                'state' => $practice->state,
                'zip' => $practice->zip,
                'npi_code' => $practice->npi_code,



            ]);
            $this->locations($request, $practice);
            DB::commit();
            return $practice;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    private function locations($request, $practice)
    {
        if (!empty($request->locations)) {
            foreach ($request->locations as $location) {
                $practiceLocation = PracticeLocation::updateOrCreate(
                    [
                        'practice_id' => $practice['id'],
                        'id' => $location['id'] ?? null
                    ],
                    [
                        'practice_location_status' => $location['practice_location_status'] ?? 1,
                        'user_id' => $location['user_id'] ?? null,
                        'name' => $location['name'],
                        'npi_code' => $location['npi_code'],
                        'address1' => $location['address1'],
                        'address2' => $location['address2'],
                        'city' => $location['city'],
                        'state' => $location['state'],
                        'zip' => $location['zip'],
                    ]
                );
            }
        }
        return $practiceLocation;
    }


    public function updatePractice($request, $id)
    {
        $practice = Practice::findOrFail($id);
        try {
            $practice->update([
                'name' => $request->name,
                'org_type_id' => $request->org_type_id,
                'taxonomy_spec_id' => $request->taxonomy_spec_id,
                'reference' => $request->reference,
                'tcn_prefix' => $request->tcn_prefix,
                'practice_code' => $request->practice_code,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'extension' => $request->extension,
                'website' => $request->website,
                'tax_id' => $request->tax_id,
                'pay_address1' => $request->pay_address1,
                'pay_address2' => $request->pay_address2,
                'pay_city' => $request->pay_city,
                'pay_state' => $request->pay_state,
                'pay_zip' => $request->pay_zip,
                'practice_status' => $request->practice_status,
                'statement_tcn_prefix' => $request->statement_tcn_prefix,
                'customer_id' => $request->customer_id,
                'user_id' => $request->user_id,
                'recently_accessed' => $request->recently_accessed,
                'deleted_at' => $request->deleted_at,
                'updated_at' => $request->updated_at,
                'npi_code' => $request->npi_code,
                'payaddress_same_pa' => $request->payaddress_same_pa
            ]);
            $location = PracticeLocation::where('practice_id',$practice->id)->first();
            $location->update([
                'name' => $practice->name,
                'address1' => $practice->address1,
                'address2' => $practice->address2,
                'city' => $practice->city,
                'state' => $practice->state,
                'zip' => $practice->zip,
                'npi_code' => $practice->npi_code,
            ]);
            $this->locations($request, $practice);
            return $practice;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function accessed()
    {
        try {
            $practice = Practice::orderBy('recently_accessed', 'desc')
                ->take(5)
                ->get();
            return $practice;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
