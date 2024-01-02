<?php

namespace App\Http\Requests\Layanan;

use App\Models\MasterData\Layanan;
//  use gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

// this rule only applies at update request
use Illuminate\Validation\Rule;

class UpdateLayananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel at here
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
            'name' => [
                'required', 'string', 'max:255', Rule::unique('layanan')->ignore($this->layanan),
                // rule unique only works for other record id
            ],
            'price' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}
