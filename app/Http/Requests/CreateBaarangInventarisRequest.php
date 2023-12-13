<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBaarangInventarisRequest extends FormRequest
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
            'kode' => 'unique:barangs,kode',
            'cover' => 'mimes:jpg,jpeg,png,bmp,tiff |max:4096',
            'name' => 'required|string',
            'harga_sewa' => 'required|integer',
            'kategori' => 'required',
            'description' => 'required|max:250',
            'status' => 'required',
            'qty' => 'required',
            'keterangan' => 'in_array:ada,tidak-ada',
        ];
    }
}
