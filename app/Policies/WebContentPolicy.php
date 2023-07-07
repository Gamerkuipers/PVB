<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WebContent;
use Illuminate\Auth\Access\Response;

class WebContentPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WebContent $webContent): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WebContent $webContent): Response
    {
        return Response::allow();
    }
}
