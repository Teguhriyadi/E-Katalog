<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuFormRequest extends FormRequest
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
            'id_buku' => [
                'required',
                'string',
                'max:6'
            ],
            'cover_buku' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:5120'
            ],
            'judul_buku' => [
                'required',
                'string'
            ],
            'nama_penulis' => [
                'required',
                'string'
            ],
            'tgl_terbit' => [
                'nullable',
                'date'
            ],
            'halaman' => [
                'nullable',
                'string'
            ],
            'ukuran' => [
                'nullable',
                'string'
            ],
            'isbn' => [
                'nullable',
                'string',
                'min:17'
            ],
            'keterangan_buku' => [
                'required',
                'string'
            ],
            'status_buku' => [
                'nullable'
            ]
        ];
    }
}
