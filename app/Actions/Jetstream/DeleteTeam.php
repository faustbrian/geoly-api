<?php

declare(strict_types=1);

namespace App\Actions\Jetstream;

use App\Models\Team;
use Laravel\Jetstream\Contracts\DeletesTeams;

final class DeleteTeam implements DeletesTeams
{
    /**
     * Delete the given team.
     */
    public function delete(Team $team): void
    {
        if (optional($team->subscription())->recurring()) {
            $team->subscription()->cancelNow();
        }

        $team->purge();
    }
}
