<?php

namespace App\Livewire\Hydrophonics;

use App\Models\Type;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class HydrophonicsTypeLivewire extends Component
{
    use LivewireAlert;
    public $name;
    public $modal = false;
    public $id;

    public function open($id = null){
        if (empty($id)) {
            $this->modal = true;
        } else {
            $type = Type::find($id);
            $this->id = $type->id;
            $this->name = $type->name;
            $this->modal = true;
        }

    }


    public function cancel(){
        $this->reset(['modal','id','name']);
    }


    public function store(){

        if (empty($this->id)) {
            $this->validate([
                'name' => 'required|string',
            ]);
            Type::create([
                'name' => $this->name
            ]);
            $this->cancel();
            $this->alert('success', 'success');
        } else {
            $this->validate([
                'name' => 'required|string',
            ]);
            $type = Type::find($this->id);
            $type->name = $this->name;
            $type->save();
            $this->cancel();
            $this->alert('success', 'success');
        }
    }


    


    public function render()
    {

        $types = Type::with('hydrophonics')->get(); 
        return view('livewire.hydrophonics.hydrophonics-type-livewire')->with('types', $types);
    }
}
