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
            // notify must be logged in
        }

        return auth()->user()->queue()->with('authors:id,name')->orderBy('order')->orderBy('created_at')->get();
    }

    // Methods

    public function delete($id)
    {
        DB::table('queues')->where('id', $id)->delete();

        // notify
    }
}
