<?php

namespace App\Livewire\Hydrophonics;

use App\Models\GrowthSession;
use App\Models\Hydrophonic;
use App\Models\Type;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class HydrophonicsLivewire extends Component
{

    use LivewireAlert;

    public $name;
    public $id;
    public $type;
    public $modal = false;
    public $modal2 = false;
    public $date;
    public $end;
    public $growth_sessions = [];
    public $growth_session_id;
    public $title = "create session";

    public function open($id = null)
    {
        if (empty($id)) {
            $this->modal = true;
        } else {
            $h = Hydrophonic::find($id);
            $this->id = $h->id;
            $this->name = $h->name;
            $this->type = $h->type_id;
            $this->modal = true;
        }
    }

    public function delete($id)
    {
        $h = Hydrophonic::find($id);
        $h->delete();
        $this->alert('success', 'success');
    }

    public function view_readings($hydrophonic_id,$id){
        // dd($hydrophonic_id,$id);
        $this->redirect(route('hydrophonics.session.readings',[$hydrophonic_id,$id]));
    }




    public function view_session($id){
            $this->id = $id;
            $this->growth_sessions = GrowthSession::where('hydrophonic_id',$id)->get();
            $this->modal2 = true;
    }
    public function edit_session($id){
        $this->title ="edit session ";
        $this->growth_session_id = GrowthSession::find($id);
        $this->date = $this->growth_session_id->session_date;
        
    }

    public function store_session(){
        if(empty($this->growth_session_id->id)){
            $this->validate([
                'date'=>'required',
            ]);
            GrowthSession::create([
                'session_date'=>$this->date,
                'hydrophonic_id'=>$this->id
            ]);
            $this->alert('success','session created');
            $this->reset(['date','growth_session_id']);
        } else{
            $this->growth_session_id->session_date = $this->date;
            $this->growth_session_id->save();
            $this->alert('success','session updated');
            $this->reset(['date','growth_session_id']);
        }       
       
        $this->growth_sessions = GrowthSession::where('hydrophonic_id',$this->id)->get();
        
        
    }




    public function cancel()
    {
        $this->reset(['modal','type','id','name','modal2']);
    }



    public function store()
    {
        if (empty($this->id)) {

            $this->validate([
                'name' => 'required|string',
                'type' => 'required',
            ]);
            Hydrophonic::create([
                'name' => $this->name,
                'type_id' => $this->type
            ]);
            $this->cancel();
            $this->alert('success', 'success');
        } else {
            $this->validate([
                'name' => 'required|string',
                'type' => 'required',
            ]);
            $h = Hydrophonic::find($this->id);
            $h->name = $this->name;
            $h->type_id = $this->type;
            $h->save();
            $this->cancel();
            $this->alert('success', 'success');
        }
    }

    public function render()
    {

        $types = Type::all();
        $h = Hydrophonic::with('type')->get();
        return view('livewire.hydrophonics.hydrophonics-livewire')
            ->with('hydrophonics', $h)
            ->with('types', $types);
    }
}
