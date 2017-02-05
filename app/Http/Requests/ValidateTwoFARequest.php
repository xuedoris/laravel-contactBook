<?php

namespace App\Http\Requests;

use App\User;
use Exception;
use Google2FA;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;

class ValidateTwoFARequest extends FormRequest
{
    private $user;

    /**
     * ValidateTwoFARequest constructor.
     * @param ValidationFactory $validator
     */
    public function __construct(ValidationFactory $validator)
    {
        $validator->extend(
            'valid_token',
            function ($attribute, $value, $parameters, $validator) {
                return Google2FA::verifyKey($this->user->g2fa_secretkey, $value);
            },
            'Not a valid token');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        try {
            $this->user = User::findOrFail(
                session('2fa:user:id')
            );
        } catch (Exception $exc) {
            return false;
        }

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
            'totp' => 'bail|required|digits:6|valid_token',
        ];
    }
}
