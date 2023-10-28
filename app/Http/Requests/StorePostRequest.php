<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if($this->user_id == auth()->user()->id){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => ["required", Rule::unique('posts')->ignore($this->id)],
            'slug' => ["required", Rule::unique('posts')->ignore($this->id)],
            'status' => 'required|in:1,2'
        ];

        if($this->status == 2){
            $rules = array_merge($rules, [
                'title' => ["required", Rule::unique('posts')->ignore($this->id)],
                'slug' => ["required", Rule::unique('posts')->ignore($this->id)],
                'category_id' => 'required', 
                'tags' => 'required', 
                'extract' => 'required',
                'description' => 'required'
            ]);
        }

        return $rules;
    }
}
