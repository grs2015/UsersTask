<?php

class UpsertUserAction
{   
    public static function execute(SingleUserData $user)
    {
      User::updateOrCreate(['id' => $user->id], $user->all()); // $user->only(['name', 'login', 'email', 'password'])
    }
}