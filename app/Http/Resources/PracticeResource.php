<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PracticeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
               'name' => $this->name,
                'orgTypeId' => $this->org_type_id,
                'taxonomySpecId' => $this->taxonomy_spec_id,
                'reference' => $this->reference,
                'tcnPrefix' => $this->tcn_prefix,
                'practiceCode' => $this->practice_code,
                'address1' => $this->address1,
                'address2' => $this->address2,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
                'phone' => $this->phone,
                'fax' => $this->fax,
                'email' => $this->email,
                'extension' => $this->extension,
                'website' => $this->website,
                'taxId' => $this->tax_id,
                'payAddress1' => $this->pay_address1,
                'payAddress2' => $this->pay_address2,
                'payCity' => $this->pay_city,
                'payState' => $this->pay_state,
                'payZip' => $this->pay_zip,
                'practiceStatus' => $this->practice_status,
                'statementTcnPrefix' => $this->statement_tcn_prefix,
                'customerId' => $this->customer_id,
                'userId' => $this->user_id,
                'recentlyAccessed' => $this->recently_accessed,
                'deletedAt' => $this->deleted_at,
                'updatedAt' => $this->updated_at,
                'npiCode' => $this->npi_code,
                'payaddressSamePa' => $this->payaddress_same_pa

        ];
    }
}