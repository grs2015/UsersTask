<?php

public function updateUsers(UsersData $data)
{
    $data->users->toCollection()->each(function($user) { 
        try {
            UpsertUserAction::execute($user);    
        } catch (\Throwable $e) {
            return Redirect::back()->withErrors(['error', ['We couldn\'t update user: ' . $e->getMessage()]]);
        }
    });

    return Redirect::back()->with(['success', 'All users updated.']);
}

public function storeUsers(UsersData $data)
{
    $data->users->toCollection()->each(function($user) {
        try {
            UpsertUserAction::execute($user);
        } catch (\Throwable $e) {
            return Redirect::back()->withErrors(['error', ['We couldn\'t store user: ' . $e->getMessage()]]);
        }
    });

    SendEmailsAction::execute($data);

    return Redirect::back()->with(['success', 'All users created.']);
}