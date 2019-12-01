<?php

namespace App\Observers;

use App\Entities\User;
use App\Mail\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserObserver implements ShouldQueue
{
    use InteractsWithQueue;

    public function created(User $user) {
        sleep(15);
        Mail::to($user)->send(new UserRegistered($user));
    }
}
