<div>
    <x-modal wire:model='visible' >
        <div x-data='' class=" w-full  p-6 rounded-sm  ring-gray-400 ring-1  ring-opacity-40 w-100">
            <label class="block  labels">
                {{ __('etudiants.add-photo') }}
            </label>
            <div class="mt-2 flex items-center justify-center relative dark:bg-gray-900 ">
              <div class="h-48 w-full border-2  border-gray-200 dark:border-gray-600 dark:bg-gray-700 flex justify-center items-center rounded-md overflow-hidden bg-gray-100">
                <span wire:loading.remove class="h-full w-full object-cover" >
                  @if ($phototemp)
                      <img class="object-cover h-full w-full " src="{{ $phototemp->temporaryUrl() }}">    
                  @elseif($photo)
                      <img src="{{ asset('storage'.'/'.$photo) }}" class=" object-cover h-40  w-auto " >    
                  @else
                  <svg class="h-full w-full text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg> 
                  @endif
                </span>
              <div wire:loading role="status">
                <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-teal-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
              </div>
            </div>
                <div class="flex space-x-4 absolute top-2 left-2">
                  <button type="button" @click="$refs.btn.click()" class="px-4 py-1 mx-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-400 rounded-md text-sm font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-50 focus:outline-none  ">
                    {{ __('etudiants.add-changer') }}
                  </button>
                  <input type="file" accept="image/*" x-ref='btn'  wire:model.defer='phototemp'    class="invisible w-2"> 
                  @if ($photo or $phototemp)
                      <button type="button" wire:click='remove' class=" text-red-500 hover:text-red-600 focus:outline-none  ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>                                
                     </button>                  
                  @endif
                </div>
            </div>
            <div class='px-10 my-3  flex space-x-3 justify-end items-center w-full'>

               <button  wire:click="close" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 focus:outline-none bg-gray-100 border-gray-400 hover:bg-gray-50 text-gray-500 dark:text-gray-200 dark:border-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 sm:ml-3 sm:w-auto sm:text-sm">
                      {{ __('etudiants.add-cancel') }}
              </button>
              <button wire:click='save'  type="button" class="mt-3 w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-500 hover:bg-teal-700 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                      {{ __('etudiants.add-save') }}
              </button>
            </div>
        </div>
    </x-dialog-modal>
</div>