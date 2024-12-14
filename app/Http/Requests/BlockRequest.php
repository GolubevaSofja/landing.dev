<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'blockType' => ['required', 'string', 'exists:block_types,type'],
            'blockIndex' => ['required', 'integer'],
        ];
    }
}
