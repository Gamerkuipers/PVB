<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactPolicy
{
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    public function create(User $user): Response
    {
        return Response::allow();
    }

    public function update(User $user): Response
    {
        return Response::allow();
    }

    public function delete(User $user): Response
    {
        return Response::allow();
    }
}
