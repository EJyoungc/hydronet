<?php

namespace App\Livewire\Hydrophonics;

use App\Models\GrowthSession;
use App\Models\Hydrophonic;
use App\Models\ReadingPhoto;
use App\Models\Readings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class HydrophonicsReadingsLivewire extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $hydrophonic_id;
    public $session_id;
    public $modal = false;
    public $modal2 = false;

    public $reading;
    public $temp,$uscm,$ppm,$ph,$notes;
    #[Validate(['image.*'=>'image|mimes:jpeg,jpg,png,gif|max:5120'])]
    public $image = [];
    public $readingphotos = [];



    public function updatedImage(){
        // dd($this);
        foreach($this->image as $image){
            $this->validate([
                'image.*'=>'image|mimes:jpeg,jpg,png,gif|max:5120'
            ]);

            ReadingPhoto::create([
                'image' => $image->store('images/readings','custom'),
                'reading_id' => $this->reading->id
            ]);
            $this->readingphotos = ReadingPhoto::where('reading_id',$this->reading->id)->get();
            $this->alert('success', 'Image Uploaded Successfully', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);

        }
  
    }



    public function delete_photo($id){

        $rp = ReadingPhoto::find($id);
        Storage::disk('custom')->delete($rp);
        $rp->delete();
        $this->alert('success', 'Image deleted Successfully', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
        ]);
        $this->readingphotos = ReadingPhoto::where('reading_id',$this->reading->id)->get();
        
    }


    public function open_photos($id){
        $this->reading = Readings::find($id);
        $this->readingphotos = ReadingPhoto::where('reading_id',$id)->get();
        $this->modal2 = true;

    }





    public function store(){

        if(empty($this->reading->id)){

            $this->validate([
                'temp' => 'required|numeric',
                'uscm' => 'required|numeric ',
                'ppm' => 'required|numeric',
                'ph' => 'required|numeric|min:0|max:14',
                'notes' => 'nullable|string|max:255',
                
            ]);

            Readings::create([
                'temp' => $this->temp,
                'uscm' => $this->uscm,
                'ppm' => $this->ppm,
                'ph' => $this->ph,
                'notes' => $this->notes,
                'user_id'=>Auth::user()->id,
                'hydrophonic_id' => $this->hydrophonic_id->id,
                'growth_session_id' => $this->session_id->id,
            ]);


        }else{

            $this->validate([
                'temp' => 'required|numeric',
                'uscm' => 'required|numeric ',
                'ppm' => 'required|numeric',
                'ph' => 'required|numeric|min:0|max:14',
                'notes' => 'nullable|string|max:255',
            ]);
            $r = Readings::find($this->reading->id);
            $r->update([
                'temp' => $this->temp,
                'uscm' => $this->uscm,
                'ppm' => $this->ppm,
                'ph' => $this->ph,
                'notes' => $this->notes,
                'user_id'=>Auth::user()->id,

                // 'hydrophonic_id' => $this->hydrophonic_id->id,
                // 'growth_session_id' => $this->session_id->id,
            ]);
        }

        $this->cancel();
        $this->dispatch('chart');
    
    }

    public function cancel(){
        $this->reset([
            'temp','uscm','ppm','ph','notes','modal','reading','image','readingphotos','modal2'
        ]);
    }

    public function open($id=null)
    {
        if (empty($id)) {
            $this->modal = true;
        }else{
           
            $this->reading = Readings::find($id);
            $this->temp = $this->reading->temp;
            $this->ph = $this->reading->ph;
            $this->ppm = $this->reading->ppm;
            $this->uscm = $this->reading->uscm; 
            $this->notes = $this->reading->notes;            
            $this->modal = true;

        }
        
    }



    public function mount($hydrophonic , $session_id){
        $this->hydrophonic_id = Hydrophonic::find($hydrophonic);
        $this->session_id = GrowthSession::where('hydrophonic_id',$hydrophonic)->where('id',$session_id )->find($session_id);
        
    }
    public function render()
    {
        $readings = Readings::where('growth_session_id',$this->session_id->id)->get();
        return view('livewire.hydrophonics.hydrophonics-readings-livewire')->with('readings',$readings);
    }
}
