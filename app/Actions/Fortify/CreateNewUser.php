<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        Validator::make($input, [
            'role' => ['required', 'string', 'in:customer,transporter'],            //выбор роли заказчик или перевозчик
            'login' => ['required', 'string', 'email', 'max:255', 'unique:users'],  //почта
            'password' => $this->passwordRules(),                                   //пароль
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            //пользовательское соглашение и политика конфиденциальности
        ])->validate();

        $user = User::create([
            'role' => $input['role'],
            'login' => $input['login'],
            'password' => Hash::make($input['password']),
            'status' => $input['role'] === 'customer' ? 'active' : 'process',
            //статус доступа к функциям сайта
        ]);

        if ($input['role'] === 'customer') {
            $user->assignRole('customer');
        } else {
            $user->assignRole('transporter');
        }

        return $user;
    }
}
