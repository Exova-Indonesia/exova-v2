<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:50',
            'alpha_dash',
            Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['nullable','integer'],
            'description' => ['nullable','string', 'max:255'],
            'locations' => ['nullable','string', 'max:125'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'username' => $input['username'],
                'description' => $input['description'],
                'name' => $input['name'],
                'email' => $input['email'],
                'role_id' => $input['role_id'] ?? 3,
                'locations' => $input['locations'] ?? null,
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'description' => $input['description'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'role_id' => $input['role_id'] ?? 3,
            'locations' => $input['locations'] ?? null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
