<?php

namespace App\Mail;

use App\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ToDoItemDue extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Todo
     */
    public $todo;

    /**
     * Create a new message instance.
     *
     * @param Todo
     * @return void
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.todo-item-due');
    }
}
