<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WebContent;
use Illuminate\Auth\Access\Response;

class WebContentPolicy
{
    public function view(User $user, WebContent $webContent): Response
    {
        return Response::allow();
    }

    public function update(User $user, WebContent $webContent): Response
    {
        return Response::allow();
    }
}
