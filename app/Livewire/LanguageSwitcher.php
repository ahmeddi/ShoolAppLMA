<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Artisan;

class LanguageSwitcher extends Component
{
    public $currentLocale;

    public function mount()
    {
        $this->currentLocale = app()->getLocale();

    }

    public function switchLocale($locale, $url)
    {   
   /*     $locals = 'fr';
        session()->put('locale', $locals);

        // Output the current locale to check if it's set correctly
     //   echo "Current locale (before setting): " . app()->getLocale() . "<br>";

        $one = app()->getLocale();

        app()->setLocale($locals);

        // Output the current locale after setting it
        // echo "Current locale (after setting): " . app()->getLocale() . "<br>";

        $two = app()->getLocale();

        Cookie::queue('locale', $locals);

        // Output the current locale after setting the cookie
       // echo "Current locale (after setting cookie): " . app()->getLocale() . "<br>";
       $three = app()->getLocale();

        dd(
            "Current locale (before setting): " .  $one,
            "Current locale (after setting): " . $two,
            "Current locale (after setting cookie): " . $three,
            
        );
    */






       // dd($url);
        
        session()->put('locale',  $locale);  

        app()->setLocale($locale);

        Cookie::queue('locale', $locale);

        

        if($locale == 'ar'){
            $notLocale = 'fr';
            $newUrl = "/ar".str_replace('/' . $notLocale, '', $url);


            $this->dispatch('refresh');

            return redirect($newUrl);
            
        }else{
            $notLocale = 'ar';
            $newUrl = "/fr".str_replace('/' . $notLocale, '', $url);

            $this->dispatch('refresh');

            Artisan::call('cache:clear');

            return redirect($newUrl);

            
        }

    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}