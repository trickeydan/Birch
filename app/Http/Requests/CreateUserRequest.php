<?php

namespace Birch\Http\Requests;

use Birch\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::User()->hasPermission('admin.users.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        foreach (User::FIELDS as $field => $value){
            $rules[$field] = $value['validation'];
        }
        return $rules;
    }

    protected function failedAuthorization(){
        return back();
    }
}
