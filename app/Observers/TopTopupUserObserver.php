<?php

namespace App\Observers;

use App\Models\TopTopupUser;

class TopTopupUserObserver
{
    /**
     * Handle the TopTopupUser "created" event.
     *
     * @param  \App\Models\TopTopupUser  $topTopupUser
     * @return void
     */
    public function created(TopTopupUser $topTopupUser)
    {
        if (TopTopupUser::count() > 10) {
            
            $recordToDelete = TopTopupUser::orderBy('count')->first();

            $recordToDelete->delete();
        }
    }

    /**
     * Handle the TopTopupUser "updated" event.
     *
     * @param  \App\Models\TopTopupUser  $topTopupUser
     * @return void
     */
    public function updated(TopTopupUser $topTopupUser)
    {
        //
    }

    /**
     * Handle the TopTopupUser "deleted" event.
     *
     * @param  \App\Models\TopTopupUser  $topTopupUser
     * @return void
     */
    public function deleted(TopTopupUser $topTopupUser)
    {
        //
    }

    /**
     * Handle the TopTopupUser "restored" event.
     *
     * @param  \App\Models\TopTopupUser  $topTopupUser
     * @return void
     */
    public function restored(TopTopupUser $topTopupUser)
    {
        //
    }

    /**
     * Handle the TopTopupUser "force deleted" event.
     *
     * @param  \App\Models\TopTopupUser  $topTopupUser
     * @return void
     */
    public function forceDeleted(TopTopupUser $topTopupUser)
    {
        //
    }
}
