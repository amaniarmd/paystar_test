<?php

namespace Modules\Transaction\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TransactionCreateRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|integer|numeric',
            'description' =>'required|string|max:30',
            'destinationFirstname' => 'required|string|min:2|max:33',
            'destinationLastname' => 'required|string|min:2|max:33',
            'destinationNumber' => 'required|string|size:26',
            'paymentNumber' => 'nullable|integer|numeric|digits_between:1,30',
            'reasonDescription' => 'nullable|integer|numeric|digits_between:1,2',
            'deposit' => 'nullable|string|digits_between:1,26',
            'sourceFirstName' => 'nullable|string|min:2|max:33',
            'sourceLastName' => 'nullable|string|min:2|max:33',
            'secondPassword' => 'nullable|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
