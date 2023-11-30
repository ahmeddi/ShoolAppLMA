<?php

namespace App\Livewire;

use App\Models\Prof;
use App\Models\Time;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\On;

class CalandarP extends Component
{
    public $prof1,$pnom;
    public $datas = [];


    #[On('refresh')]
    public function mount(){

        $this->pnom = Prof::where('id', $this->prof1)->first();
        $this->datas = Lesson::where('prof_id', $this->pnom->id)->get();


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
        ->take(7)
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item['id'] => $item['time']];
        });

        
        return view('livewire.calandar-p',["WEEK_DAYS" => $WEEK_DAYS,"Times" => $Times]);
    }
}
