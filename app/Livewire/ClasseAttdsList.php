<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Attande;
use App\Models\Parentt;
use Livewire\Component;
use App\Models\AttdsClass;
use App\Models\Time;
use Livewire\Attributes\On;
use App\Services\WhatsappApiService;

class ClasseAttdsList extends Component
{
    public  $classe;

    public $att;
    public $att_class_id;
    public $attds = [];

    public $textColors = []; 


    public $date;

    public $time;


    public $ids;

    public $cid;
    public $note =[];

    #[On('refresh')]
    function mount()  
    {
        $atd = AttdsClass::find($this->ids);

        $this->time = Time::find($atd->time)->time;

        $this->att = $atd;

        $this->att_class_id = $this->ids;

        $this->date = $atd->date;

        $this->classe = Classe::with('etuds')->find( $atd->classe_id);

        foreach ($this->classe->etuds as $etud) 
        {
            $att = Attande::where('etudiant_id', $etud->id)
                ->where('attds_classe_id', $this->att_class_id)
                ->first();

            if ($att) 
            {
                $this->attds[] = $att->nbh;
            } 
            else 
            {

                $att = Attande::create([
                    'etudiant_id' => $etud->id,
                    'attds_classe_id' => $this->att_class_id,
                    'date' => $this->date,
                ]);

                $this->attds[] = 0;
            }

            $this->textColors[] = $att->wh == 1 ? 'text-green-500 dark:text-green-300' : 'text-gray-900 dark:text-gray-200';

        }


        
    }


    public function save()
    {
        foreach ($this->classe->etuds as $index => $etud) 
        {
            $note = Attande::where('etudiant_id', $etud->id)
                ->where('attds_classe_id', $this->att_class_id)
                ->first();

            if (!$note) 
            {
                $note = Attande::create([
                    'etudiant_id' => $etud->id,
                    'attds_classe_id' => $this->att_class_id,
                    'date' => $this->date,
                ]);
            }


            
            $note->update(['nbh' => ($this->attds[$index]) ? 2 : 0]);
        }
    }

    public function whatsapp()
    {
        $this->save();


        foreach ($this->classe->etuds as $etud) 
        {
            $note = Attande::where('etudiant_id', $etud->id)
                ->where('attds_classe_id', $this->att_class_id)
                ->first();

            $parent = Parentt::find($etud->parent_id);

            if ($note->nbh > 0 and $note->wh == 0) 
            {
              //  $msg = $this->msg($parent->whatsapp, $etud->nom, $etud->sexe);

              $create = new WhatsappApiService();

                    $msg =  $create->attd($etud->nom,
                    $etud->nomfr,
                    $parent->whatsapp,
                    $parent->whcode,
                    $etud->sexe,
                    $this->time,
                    ) ;

                if ($msg) 
                {
                    $note->update(['wh' => 1]);
                }
            }
        }

        $this->dispatch('refresh');
        $this->render();


    }

    /*
    function msg($whatsapp,$nom, $sexe)  
    {

        $whatsapp_msg = new WhatsappApiService();

        $result = $whatsapp_msg->attd($whatsapp, $nom, $sexe);

        return $result == 1 ? 1 : 0;

        
    }
    */




    public function render()
    {

        return view('livewire.classe-attds-list');
    }
}
