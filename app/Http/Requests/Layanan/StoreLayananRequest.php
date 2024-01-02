<?php

namespace App\Http\Requests\Layanan;

use App\Models\MasterData\Layanan;
//  use gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLayananRequest extends FormRequest
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
                'required', 'string', 'max:255', 'unique:layanan',
            ],
            'price' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}
