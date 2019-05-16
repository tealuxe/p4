<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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

    // https://laraveldaily.com/upload-multiple-files-laravel-5-4/
    public function rules()
    {
        $rules = [
            'name' => 'required'
        ];
        $allFiles = $this->allFiles();
        $images = count($allFiles['images']);
        foreach(range(0, $images) as $index) {
            $rules['images.' . $index] = 'image|mimes:jpeg,bmp,png|max:10000';
        }

        return $rules;

    }
}
