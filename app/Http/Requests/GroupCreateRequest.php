<?php

namespace Birch\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GroupCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::User()->hasPermission('admin.groups.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50|min:2',
            'slug' => 'required|max:50|min:2|unique:groups,slug',
            
        ];
    }

    protected function failedAuthorization(){
        return back();
    }
}
