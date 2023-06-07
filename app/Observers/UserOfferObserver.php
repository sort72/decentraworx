<?php

namespace App\Observers;

use App\Mail\UserOfferStatusUpdated;
use App\Models\UserOffer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserOfferObserver
{
    /**
     * Handle the UserOffer "created" event.
     */
    public function created(UserOffer $userOffer): void
    {
        //
    }

    /**
     * Handle the UserOffer "updated" event.
     */
    public function updated(UserOffer $userOffer): void
    {
        if($userOffer->status == 'approved' || $userOffer->status == 'rejected') {
            Mail::to($userOffer->user->email)->queue(new UserOfferStatusUpdated($userOffer));
        }
    }

    /**
     * Handle the UserOffer "deleted" event.
     */
    public function deleted(UserOffer $userOffer): void
    {
        //
    }

    /**
     * Handle the UserOffer "restored" event.
     */
    public function restored(UserOffer $userOffer): void
    {
        //
    }

    /**
     * Handle the UserOffer "force deleted" event.
     */
    public function forceDeleted(UserOffer $userOffer): void
    {
        //
    }
}
