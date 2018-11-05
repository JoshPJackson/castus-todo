<?php

namespace App\Events;

use App\Todo;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewToDoItemAdded
{
    use Dispatchable, SerializesModels;

    /**
     * @var Todo
     */
    public $todo;

    /**
     * Create a new event instance.
     *
     * @param Todo $todo
     * @return void
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
}
