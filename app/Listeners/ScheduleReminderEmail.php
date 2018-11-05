<?php

namespace App\Listeners;

use App\Events\NewToDoItemAdded;
use App\Mail\ToDoItemDue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ScheduleReminderEmail
{
    /**
     * Handle the event.
     *
     * @param  NewToDoItemAdded  $event
     * @return void
     */
    public function handle(NewToDoItemAdded $event)
    {
        $when = Carbon::createFromFormat('Y-m-d\TH:i', $event->todo->due_at)->subDay();

        Mail::to(env('USER_EMAIL'))
            ->later($when, new ToDoItemDue($event->todo));
    }
}
