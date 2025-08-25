<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PracticeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'org_type_id' => 'required|integer|nullable',
            'taxonomy_spec_id' => 'required|integer|nullable',
            'reference' => 'string|nullable',
            'tcn_prefix' => 'integer|nullable',
            'practice_code' => 'string|nullable',
            'address1' => 'string',
            'address2' => 'string',
            'city' => 'string',
            'state' => 'string',
            'zip' => 'string',
            'phone' => 'string|nullable',
            'fax' => 'string|nullable',
            'email' => 'string|nullable',
            'extension' => 'string|nullable',
            'website' => 'string|nullable',
            'tax_id' => 'integer|nullable',
            'pay_address1' => 'string|nullable',
            'pay_address2' => 'string|nullable',
            'pay_city' => 'string|nullable',
            'pay_state' => 'string|nullable',
            'pay_zip' => 'string|nullable',
            'practice_status' => 'integer',
            'statement_tcn_prefix' => 'nullable|string|max:30',
            'customer_id' => 'integer|nullable',
            'user_id' => 'integer|nullable',
            'recently_accessed' => 'nullable|date',
            'deleted_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'npi_code' => 'string',
            'payaddress_same_pa' => 'integer'



        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422));
    }
}
