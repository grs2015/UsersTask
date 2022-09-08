<?php


class SendEmailsAction
{
    public static function execute(UsersData $data): bool
    {
        $data->users->toCollection()->each(function($user) {
            $message = 'Account has beed created. You can log in as <b>' . $user['login'] . '</b>';
            Mail::to($user['email'])
                ->cc('support@company.com')
                ->subject('New account created')
                ->queue($message);
        });

        return true;
    }
}