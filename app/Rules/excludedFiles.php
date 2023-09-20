<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class excludedFiles implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
 
protected $excluded_files =[];

public function __construct(...$types) {
    $this->excluded_files=$types;
}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
      
    
if (in_array($value->getMimeType(),$this->excluded_files)){
    $fail("This file type is not allowed");
}



    }
}
