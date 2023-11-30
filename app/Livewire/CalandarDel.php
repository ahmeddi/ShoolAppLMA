<?php

namespace App\Livewire;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class CalandarDel extends Component
{

    public $visible = false;
    public $idkey ;

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    #[On('open')] 
    public function open($id) 
    {
        $this->idkey = $id;

        $this->visible = true;

    }

    public function delete()
    {
       // dd(Lesson::where('id', $this->idkey)->first());

      $del =   Lesson::where('id', $this->idkey)->first();
    //  $del->delete();

        $this->dispatch('updates');
        $this->visible = false;


        /*
      Lesson::find($this->idkey)->delete();

      $this->visible = false;

      $local = app()->getLocale();


     // return  redirect()->to($local.'/Jorn'.'/'.$this->clas,);

      return $this->redirect('/'.$local.'/Jorn'.'/'.$this->clas, navigate: true);
*/


    }

    public function render()
    {

        return view('livewire.calandar-del');
    }
}
