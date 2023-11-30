<div>
    <x-dialog-modal wire:model.defer='visible' >
        <x-slot name='title'>
            <div class='text-lg font-bold text-green-900 dark:text-gray-100 px-12 '>
                Ajoute Formation
            </div>
            
        </x-slot>
  
         <x-slot name='content'>
            <div class="flex flex-col space-y-4 ">
      
                {{-- 4 top rows --}}
                <div class="grid lg:grid-cols-2 gap-x-6 gap-y-3 px-12  justify-items-center sm:grid-cols-1 ">
  
                    <div x-data='' class=" w-96 h- h-96 col-span-2 p-3 rounded-sm  ring-gray-400 ring-1  ring-opacity-40 ">
                      <div class="flex justify-between h-10 w-full">
                        <div>
                          <label class="block  labels">
                            Photo
                          </label>
                        </div>
                        <div class="flex space-x-2">
                          <button type="button" @click="$refs.btn.click()" class="px-2  w-20  bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-400 rounded-md text-xs font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-50 focus:outline-none  ">
                            Changer
                          </button>
                          @if ($photo or $phototemp)
                              <button type="button" wire:click='remove' class=" text-red-500 hover:text-red-600 focus:outline-none  ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>                                
                             </button>                  
                          @endif
                        </div>
                      </div>
                      
                      <div class=" flex items-center justify-center w-full h-full ">
                        <span class="  border-gray-200 dark:border-gray-600 dark:bg-gray-700 flex justify-center items-centeroverflow-hidden bg-gray-100">
                          @if ($phototemp)
                              <img class="object-cover h-72 w-72 " src="{{ $phototemp->temporaryUrl() }}">    
                          @elseif($photo)
                              <img  src="{{ asset('storage'.'/'.$photo) }}" class=" object-cover " >    
                          @else
                            <button type="button" @click="$refs.btn.click()">
                                <svg class=" h-72 w-72  text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg> 
                            </button>
                          @endif
                        </span>
                          <input type="file" accept="image/*" x-ref='btn'  wire:model.defer='phototemp'    class="invisible w-2"> 
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

              <button  wire:click="close" type="button" class="w-full inline-flex justify-center rounded-md  shadow-sm px-4 py-2 focus:outline-none bg-white border-teal-600 border hover:bg-gray-50 text-teal-700 dark:text-gray-200 dark:border-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 sm:ml-3 sm:w-auto sm:text-sm">
                {{ __('etudiants.add-cancel') }} 
              </button>
              <button wire:click='save'  type="button" class="mt-3 w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    {{ __('etudiants.add-save') }} 
              </button>
            </div>
           
            </div>
         </x-slot>
    </x-dialog-modal>
  </div>
  