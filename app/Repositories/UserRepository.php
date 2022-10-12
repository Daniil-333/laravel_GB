<?php


namespace App\Repositories;

use App\Models\User;
//use SocialiteProviders\Manager\OAuth2\User as UserOAuth2;

class UserRepository
{
    public function getUserBySocID( $user, string $socName)
    {
        $userValid = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();

        if(is_null($userValid)) {
            $userValid = new User();

            $userValid->fill([
                'name' => !empty($user->getNickname()) ? $user->getNickname() : '',
                'email' => !empty($user->getEmail()) ? $user->getEmail() : '',
                'password' => '',
                'is_admin' => false,
                'id_in_soc' => !empty($user->getId()) ? $user->getId() : '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar(): ''
            ]);

            $userValid->save();

        }

        return $userValid;
    }
}
