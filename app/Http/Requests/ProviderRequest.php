<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'organization_name'=> 'string|nullable',
            'provider_type'=> 'string',
            'type'=> 'string|nullable',
            'credentials'=> 'string|nullable',
            'mi'=> 'string|nullable',
            'npi_code'=> 'required|string',
            'taxonomy_spec_id'=> 'integer',
            'reference'=> 'string|nullable',
            'provider_code'=> 'string|nullable',
            'pager'=> 'string|nullable',
            'provider_status'=> 'integer',
            'home_phone'=> 'string|nullable',
            'cell_phone'=> 'string|nullable',
            'fax'=> 'string|nullable',
            'address1'=> 'string|nullable',
            'address2'=> 'string|nullable',
            'city'=> 'string|nullable',
            'state'=> 'string|nullable',
            'tax_id'=> 'integer|nullable',
            'qualification'=> 'string',
            'phone'=> 'string|nullable',
            'extenison'=> 'string|nullable',
            'email'=> 'string|nullable',
            'specialty_license'=> 'string',
            'state_license'=> 'string|nullable',
            'anesthesia_license'=> 'string|nullable',
            'upin'=> 'string|nullable',
            'blue_cross'=> 'string|nullable',
            'tricare_champus'=> 'string|nullable',
            'revenue_code_id'=> 'integer|nullable',
            'facility_id'=> 'integer|nullable',
            'customer_id'=> 'integer',
            'user_id'=> 'integer',
            'recently_accessed'=>'nullable|date',
            'deleted_at'=>'nullable|date',
            'created_at'=>'nullable|date',
            'updated_at'=>'nullable|date',
            'note_id' => 'integer|nullable',
            'alert_id'=> 'integer|nullable',
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ],422));
    }

}
