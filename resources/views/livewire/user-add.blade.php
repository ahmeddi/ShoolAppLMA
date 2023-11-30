<div>
    <x-dialog-modal wire:model='visible' >
        <x-slot name='title'>
            <div class='text-lg font-bold text-green-900 dark:text-gray-100 px-12 '>
                
            </div>
            
        </x-slot>

         <x-slot name='content'>
            content
         </x-slot>

         <x-slot name='footer' >
            <div class="flex justify-between">
             <div class='px-12'>
               
             </div>
             <div class='px-10  flex space-x-3 justify-end items-center w-full'>

               <button  wire:click="save" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 focus:outline-none bg-gray-100 border-gray-400 hover:bg-gray-50 text-gray-500 dark:text-gray-200 dark:border-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 sm:ml-3 sm:w-auto sm:text-sm">
                   Save
              </button>
              <button wire:click='close'  type="button" class="mt-3 w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
              </button>
            </div>
           
            </div>
         </x-slot>
    </x-dialog-modal>
</div>