<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $to_name = $input['name'];
        $to_email = $input['email'];
        $body = [];
        $mailData = array('body' => $body);
        Mail::send('email.welcome',$mailData,function ($message) use ($to_email,$to_name){
            $message->to($to_email,$to_name)->subject('Aramıza Hoşgeldiniz');
            $message->from(env('MAIL_USERNAME'),'Dadya Kitapçılık');
        });

        return $user;
    }
}
