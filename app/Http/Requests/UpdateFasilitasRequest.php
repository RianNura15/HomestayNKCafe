<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFasilitasRequest extends FormRequest
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
            'nama_fasilitas' => 'required|max:255',
            'jumlah_fasilitas' => 'required|max:255',
            'desc_fasilitas' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png'
        ];
    }
}
