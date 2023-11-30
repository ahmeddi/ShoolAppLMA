<?php

namespace App\Livewire;

use App\Models\Time;
use App\Models\Classe;
use Livewire\Component;
use App\Models\SoirJorn;
use Livewire\Attributes\On;

class CalandarSoir extends Component
{
    public $clas,$cnom;
    public $datas = [];


    #[On('refresh')]
    public function mount(){

        $this->cnom = Classe::where('id', $this->clas)->first();

        $this->datas = SoirJorn::where('class_id', $this->cnom->id)->get();

    }  

    #[On('delete')]
    function delete($idkey)  
    {
        SoirJorn::find($idkey)->delete();
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
                '7' => 'الاحد',
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
                '7' => 'Dimanche',
                ];
        }
        
        
        $Times = Time::select('id', 'time')
        ->skip(3) 
        ->take(PHP_INT_MAX) 
        ->get()
 /*       ->mapWithKeys(function ($item) {
            return [$item['id'] => $item['time']];
        })  */
        ;

    //    dd($Times->first());

    
        return view('livewire.calandar-soir',["WEEK_DAYS" => $WEEK_DAYS,"Times" => $Times]);
    }
}
