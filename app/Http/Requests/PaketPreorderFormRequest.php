<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketPreorderFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_paket' => [
                'required',
                'string',
                'max:6'
            ],
            'idkatalog' => [
                'required',
                'string',
                'max:6'
            ],
            'idbuku' => [
                'required',
                'string',
                'max:6'
            ],

            'nama_paket' => [
                'required',
                'string'
            ],
            'harga_paket' => [
                'required',
                'integer'
            ],
            'qty_paket' => [
                'required',
                'integer'
            ],
            'desc_paket' => [
                'required',
                'string'
            ],
            'status_paket' => [
                'nullable'
            ],
            'cover_paket' => [
                'nullable',
            ],
            'cover_paket.*' => [
                'mimes:jpg,jpeg,png'
            ]
        ];
    }
}
