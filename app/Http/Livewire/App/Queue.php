<?php

namespace App\Http\Livewire\App;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Queue extends Component
{
    public function render()
    {
        return view('livewire.app.queue')
            ->with([
                'queue' => $this->queue,
            ]);
    }

    // Properties

    public function getQueueProperty()
    {
        if(auth()->guest()) {
            $this->emit('notify', ['message' => 'Please login before trying to add books to your queue.', 'type' => 'error']);
        }

        return auth()->user()->queue()->with('authors:id,name')->orderBy('order')->orderBy('created_at')->get();
    }

    // Methods

    public function delete($id)
    {
        DB::table('queues')->where('id', $id)->delete();

        $this->emit('notify', ['message' => 'Successfully removed book from queue.', 'type' => 'success']);
    }
}
