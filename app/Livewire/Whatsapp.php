<?php

namespace App\Livewire;

use App\Models\Emp;
use App\Models\Prof;
use App\Models\Classe;
use App\Models\Parentt;
use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Services\WhatsappApiService;

class Whatsapp extends Component
{
    public $Classes = [];
    public $cls ;

    #[Rule('required',as: ' ')] 
    public $msg;


    public $profs;
    public $emps;
    public $parent;
    public $profsSelected ;

    function mount() 
    {
        $this->Classes = Classe::all('id', 'nom');
        
    }

    function send() 
    {

        $this->validate();

        if ($this->emps) 
        {
                $this->emp();
        }

        if ($this->profs) 
        {
            $this->prof();
        }
        if ($this->parent) 
        {
        $this->parent();
        }
        elseif ($this->cls) 
         {
           $classes = Classe::with('etuds.parent')->find($this->cls);
           $etuds = $classes->etuds;

           foreach ($etuds as $etud) {
               $code = $etud->parent->whcode;
               $phone = $code . $etud->parent->whatsapp;

               $create = new WhatsappApiService();

               $create->sendCurlRequest(
                    $phone,
                   $this->msg,
               );
           }

           
         }
         elseif ($this->profsSelected) 
         {
            
            $profs = Prof::where($this->profsSelected, 1)->get();

            $create = new WhatsappApiService();

            foreach ($profs as $prof) {

                if ($prof->tel2 == null) {
                    continue;
                }
                $code = '222';
                $phone = $code . $prof->tel2;

                $create->sendCurlRequest(
                     $phone,
                    $this->msg,
                );
            }
         }


    }


    function emp() 
    {
        $emps = Emp::all();

        $create = new WhatsappApiService();



        foreach ($emps as $emp) {

            if ($emp->tel2 == null) {
                continue;
            }

            $code = '222';
            $phone = $code . $emp->tel2;

            $create->sendCurlRequest(
                 $phone,
                $this->msg,
            );
        }
        
    }

    function prof() 
    {
        $emps = Prof::all();

        $create = new WhatsappApiService();

        foreach ($emps as $emp) {

            if ($emp->tel2 == null) {
                continue;
            }
            $code = '222';
            $phone = $code . $emp->tel2;

            $create->sendCurlRequest(
                 $phone,
                $this->msg,
            );
        }
        
    }

    function parent() 
    {
        $parts = Parentt::all();

        $create = new WhatsappApiService();



        foreach ($parts as $part) {

            if ($part->whatsapp == null) {
                return;
            }

            $code = $part->whcode;
            $phone = $code . $part->whatsapp;

            $create->sendCurlRequest(
                 $phone,
                $this->msg,
            );
        }
        
    }


    public function render()
    {
        return view('livewire.whatsapp');
    }
}
