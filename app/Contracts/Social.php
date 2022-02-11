<?php

namespace App\Contracts;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function setUSer(User $socialUser, string $network):string;
}