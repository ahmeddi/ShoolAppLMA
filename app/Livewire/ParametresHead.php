<?php

namespace App\Livewire;

use App\Models\Profil;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class ParametresHead extends Component
{
    use WithFileUploads;

    public $phototemp;
    public $photo;

    public $profil;

    protected $listeners = ['cover' => 'open'];

    public $visible = false;

    public function remove()
    {
        $this->phototemp = '';
        $this->photo = '';
    }

    #[On('cover')]
    public function open()
    {
        $idp = Profil::find(1);
        $this->profil = $idp;
        $this->photo = $this->profil->header;
        $this->visible = true;
    }

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    public function save()
    {
        $this->photo = $this->uploadPhoto();
    
        $this->profil->update(['header' => $this->photo]);
    
        $this->dispatch('refresh');

        $this->visible = false;
    }
    
    private function uploadPhoto()
    {
        if ($this->phototemp) {

            $extension = $this->phototemp->extension();
            $directory = 'Profil/photos/'.$this->profil->id;
            $fileName = 'img-hean-'.$this->profil->id.'.'.$extension;

            $this->phototemp->storeAs('public/'.$directory, $fileName);

            return $directory.'/'.$fileName;

        }
    
        return '';
    }
    
    public function render()
    {
        return view('livewire.parametres-head');
    }
}
