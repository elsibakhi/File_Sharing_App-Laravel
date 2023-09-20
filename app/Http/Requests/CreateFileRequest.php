<?php

namespace App\Http\Requests;

use App\Rules\excludedFiles;
use Illuminate\Foundation\Http\FormRequest;

class CreateFileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            
                'title' =>'required|string|max:255',
                'message' =>'nullable|string|max:255',
                'file' =>'required|file|max:9000',
                // 'files.*' =>['file',new excludedFiles("application/x-msdownload", "application/x-httpd-php")],
            
        ];
    }
}
