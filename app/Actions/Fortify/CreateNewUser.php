<?php

namespace App\Actions\Fortify;

use App\Events\TotalUserChanged;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
//            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'gender' => ['required', 'boolean'],
            'birth_date' => ['required', 'date', 'before:' . Carbon::now()->subYears(13)->toDateString()],
        ])->validate();


        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make('password') ,           //make($input['password']),
            'gender' => $input['gender'],
            'birth_date' => $input['birth_date'] ,
        ]);

        $user->update([
            'name' => 'Anonyme#'.(1000000-$user->id),
        ]);

        $totalUsers = User::all()->count();
        event(new TotalUserChanged($totalUsers,'Anonyme#'.(1000000-$user->id)));

        return $user;
    }
}
