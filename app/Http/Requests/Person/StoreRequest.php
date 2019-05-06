<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'birthdate' => 'required|string',
            'voterid' => 'required|string|unique:people,voterid',
            'state' => 'required|string',
            'street' => 'required|string',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
            'zipcode' => 'required|string',
            'signature' => 'required|string'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'NOME não pode ficar vazio',
            'birthdate.required' => 'DATA DE ANIVERSÁRIO não pode ficar vazio',
            'voterid.required' => 'TÍTULO DE ELEITOR não pode ficar vazio',
            'voterid.unique' => 'TÍTULO DE ELEITOR já existente na base de dados',
            'state.required' => 'ESTADO não pode ficar vazio',
            'street.required' => 'RUA não pode ficar vazio',
            'neighborhood.required' => 'BAIRRO não pode ficar vazio',
            'city.required' => 'CIDADE não pode ficar vazio',
            'zipcode.required' => 'CEP não pode ficar vazio',
            'signature.required' => 'ASSINATURA não pode ficar vazio'
        ];
    }
}
