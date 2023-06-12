<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\Posting_transfer;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePostingTransfer
{
    /**
     * Create the event listener.
     *
     * @return void
     */

     public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $user = $event->user;

        if ($user->sl_user_group_id == 2) {
            Posting_transfer::create([
                'user_id' => $user->id,
                'posting_date' => $user->posting_date,
                'posting_place' => $user->office_number,
            ]);
        } else {
            // Posting_transfer::create([
            //     'user_id' => $user->id,
            //     'posting_date' => $user->posting_date,
            //     'posting_place' => $user->office_number,
            // ]);
        }
    }
}
