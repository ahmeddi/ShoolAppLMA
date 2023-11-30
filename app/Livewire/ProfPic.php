<?php

namespace App\Livewire;

use App\Models\Prof;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class ProfPic extends Component
{
    use WithFileUploads;

    public $phototemp;
    public $photo;
    public $emp;
    public $profId;
    public $visible = false;

    public function remove()
    {
        $this->phototemp = '';
        $this->photo = '';
    }

    #[On('pic')]
    public function open()
    {
        $this->emp = Prof::find($this->profId);


        $this->photo = $this->emp->image;
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
        if (!$this->phototemp && !$this->photo) {
            $this->photo = null;
        } else {
            $this->uploadPhoto();
        }

        $this->updateEmpImage();
        $this->dispatch('refresh');
        $this->visible = false;
    }

    private function uploadPhoto()
    {
        $extension = $this->phototemp->extension();
        $dirtemp = 'public/Profs/photos/' . $this->emp->id;
        $dir = 'Profs/photos/' . $this->emp->id;
        $name = 'img-' . $this->emp->id . '.' . $extension;

        $this->phototemp->storeAs($dirtemp, $name);
        $this->photo = $dir . '/' . $name;
    }

    private function updateEmpImage()
    {
        $this->emp->image = $this->photo;
        $this->emp->save();
    }
    
    public function render()
    {
        return view('livewire.prof-pic');
    }
}
