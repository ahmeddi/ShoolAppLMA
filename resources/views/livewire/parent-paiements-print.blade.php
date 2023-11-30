<div>
    <x-dialog-modal wire:model='visible' >
        <x-slot name='title'>
            <div class='relative print:hidden w-full px-12 text-lg font-bold text-green-900 dark:text-gray-50 '>
              <div>
                
               </div> 
               <button wire:click="close" class="absolute top-0 rtl:left-2 ltr:right-2 z-20 flex items-center justify-center w-8 h-8 text-green-700 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-50">
                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"  viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                       </svg>
               </button>
            </div>
          </x-slot>

         <x-slot name='content'>
            <div dir="ltr" class="p-2 ">
                <div class="w-full flex justify-center">
                    <img wire:model='header' src="{{ asset('storage'.'/'.$header) }}" class="h-28 w-auto object-cover mb-3 "    />
                </div>
                <hr class="mb-2">
                <div class="flex justify-between mb-6">
                    <div>
                        <h1 lang="fr" class="text-lg font-bold">{{ __('print.recp') }} </h1>
                        <h1 lang="ar" class="text-lg font-bold">{{ __('print.recpar') }} </h1>
                    </div>
                    <div class="text-gray-700">
                        <div>{{ __('print.date') }} <span class=" mx-3 font-bold">{{ $date }}</span>  <span>{{ __('print.datear') }}</span></div>
                        <div>{{ __('print.recun') }} <span class=" mx-3  font-bold">{{ $motif }}</span>  <span>{{ __('print.recunar') }}</span></div>
                    </div>
                </div>
                <div class="my-2 w-full">
                    <div class="text-gray-700 text-sm  font-semibold mb-2 w-full flex justify-between">
                        <div>
                            <span>{{ __('print.recu') }}</span> 
                            <span class=" font-bold mx-2">{{ $sexe == 1 ? 'Mr' : 'Mlle' }} {{  $nomfr  }}</span>
                        </div>
                        <div dir="rtl">
                            <span>{{ __('print.recuar') }}:</span> 
                            <span class=" font-bold mx-2">   {{ $sexe == 1 ? 'السيد' : 'السيدة' }} {{  $nom  }}</span>
                        </div>
                    </div>
                    <div class="text-gray-700 text-sm  font-semibold mb-2 w-full flex justify-between">
                        <div  >
                            <span>{{ __('print.montant') }}:</span> 
                            <span class=" font-bold mx-2"> {{ $montant }} MRU, <span class=" text-sm font-semibold">{{ $chiffre }} {{ __('print.oug') }}</span> </span>
                        </div>
                        <div dir="rtl">
                            <span >{{ __('print.montantar') }}:</span> 
                            <span class=" font-bold mx-2"> {{ $montant }}, <span class=" text-sm font-semibold">{{ $chiffrear }} {{ __('print.ougar') }}</span> </span>
                        </div>
                    </div>
                </div>
                <div class=" h-2 opacity-0">

                </div>
                <div class="mx-2">
                    <div class="text-gray-700 text-sm  font-semibold mb-2 w-full flex justify-between ">
                        <div>
                            <span>{{ __('print.caissier') }}:</span> 
                            <span class=" font-bold mx-2"> <input class=" print:border-none border " type="text"></span>
                        </div>
                        <div>
                            <span class=" mx-2">{{ __('print.sig') }}:</span> 
                            <span class=" mx-2">:{{ __('print.sigar') }}</span> 
                        </div>
                    </div>
                </div>

            </div>  
         </x-slot>

         <x-slot name='footer' >

            <div wire:loading class="mx-8">
                <div role="status ">
                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-teal-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove class="flex justify-between">
             <div class='px-12'>
               
             </div>
             <div class='px-10  flex space-x-3 justify-end items-center w-full'>

              <button  wire:click="close" type="button" class="w-full print:hidden inline-flex justify-center rounded-md  shadow-sm px-4 py-2 focus:outline-none bg-white border-teal-600 border hover:bg-gray-50 text-teal-700 dark:text-gray-200 dark:border-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 sm:ml-3 sm:w-auto sm:text-sm">
                {{ __('etudiants.add-cancel') }} 
              </button>
              <button x-on:click="printA5NoMargin()"  type="button" class="mt-3 print:hidden w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                  </svg>                  
              </button>
            </div>
           
            </div>
         </x-slot>
</x-dialog-modal>
</div>