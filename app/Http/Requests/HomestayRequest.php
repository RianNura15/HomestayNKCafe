<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomestayRequest extends FormRequest
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
            'nama_homestay' => 'required|max:255',
            'jenis_homestay' => 'required|max:255',
            'harga' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png',
            'desc_homestay' => 'required|max:255'
        ];
    }
}
