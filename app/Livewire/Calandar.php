<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Lesson;
use App\Models\Time;
use Livewire\Component;
use Livewire\Attributes\On;

class Calandar extends Component
{


    public $clas,$cnom;
    public $datas = [];


    #[On('refresh')]
    public function mount(){

        $this->cnom = Classe::where('id', $this->clas)->first();

        $this->datas = Lesson::where('class_id', $this->cnom->id)->get();


    }  

    #[On('delete')]
    function delete($idkey)  
    {
        Lesson::find($idkey)->delete();
        $this->mount();

    }



    public function render()
    {


        if (app()->getLocale() == 'ar') {
            $WEEK_DAYS = [
                '1' => 'الاثنين',
                '2' => 'الثلثاء',
                '3' => 'الاربعاء',
                '4' => 'الخميس',
                '5' => 'الجمعة',
                '6' => 'السبت',
              //  '7' => 'الاحد',
            ];
        } 
        else {
            $WEEK_DAYS = [
                '1' => 'Lundi',
                '2' => 'Mardi',
                '3' => 'Mercredi',
                '4' => 'Jeudi',
                '5' => 'Vendredi',
                '6' => 'Samedi',
              //  '7' => 'Dimanche',
                ];
        }
        
        
        // $Times = Time::select('id', 'time')
        // ->take(3)
        // ->get()
        // ->mapWithKeys(function ($item) {
        //     return [$item['id'] => $item['time']];
        // });

        $Times = Classe::with('times')->find($this->clas)->times;

      //  dd($Times);

    
        return view('livewire.calandar',["WEEK_DAYS" => $WEEK_DAYS,"Times" => $Times]);
    }
}
