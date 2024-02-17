<?php

namespace App\Livewire\Root;
use Livewire\Attributes\Layout;
use Livewire\Component;

class WelcomeLivewire extends Component
{

    #[Layout('components.layouts.root')]
    public function render()
    {
        return view('livewire.root.welcome-livewire');
    }
}
