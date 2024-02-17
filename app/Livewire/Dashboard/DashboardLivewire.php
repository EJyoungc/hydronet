<?php

namespace App\Livewire\Dashboard;

use App\Models\Hydrophonic;
use App\Models\Readings;
use App\Models\Type;
use Livewire\Component;

class DashboardLivewire extends Component
{
    public function render()
    {
        $projects = Hydrophonic::all();
        $tasks = Readings::all();
        $types = Type::all();
        return view('livewire.dashboard.dashboard-livewire')
        ->with('projects',$projects)
        ->with('tasks',$tasks)
        ->with('types',$types);
    }
}
