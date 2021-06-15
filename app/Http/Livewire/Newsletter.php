<?php

namespace App\Http\Livewire;

use App\Models\Newsletter as NewsletterModel;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;

    public $rules = [
        'email' => 'required|unique:newsletters,email',
    ];

    public function render()
    {
        return view('livewire.newsletter');
    }

    // Properties

    // Methods

    public function save()
    {
        $this->validate();

        NewsletterModel::create(['email' => $this->email]);

        $this->reset('email');
        $this->emit('notify', ['message' => 'Successfully signed up for the newsletter.', 'type' => 'success']);
    }
}
