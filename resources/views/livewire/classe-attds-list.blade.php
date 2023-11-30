<div >
    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        
        <tbody class="bg-white dark:bg-gray-900 py-2 ">
    
                @foreach ($classe->etuds as $index => $Etud)
                    <tr class="h-10 w-full py-2">
                        <td class="px-2 py-2  flex ">
                            <div class=" flex space-x-2 items-center w-full">
                                <input value="true" id="{{ $index }}"  wire:model='attds.{{ $index }}' type="checkbox" @if($attds[$index]) checked @endif class="check w-6 h-6" >
                                <label for="{{ $index }}"  class="flex items-center">
                                    <div class="flex space-x-2 mx-4 ">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-200  {{ $textColors[$index] }}" >
                                                           {{ $Etud->nb   }} - @if (app()->getLocale() == 'ar') {{ $Etud->nom }}  @else {{ $Etud->nomfr }}  @endif
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </td> 
                    </tr>
                @endforeach
  
        </tbody>
    </table>
    <div class='px-10  flex space-x-3 justify-end items-center w-full'>
        <div wire:loading.remove class="flex">
            <button wire:loading.remove wire:click='save' type="button" class="mt-3 w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-3 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                {{ __('att.save') }}
         </button>
         <button wire:loading.remove wire:click='whatsapp'  type="button" class="mt-3 flex  w-full items-center  rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              <div class=" mx-2 ">
                  <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-gray-800 text-gray-200  " width="24" height="24" fill="currentColor" xmlns:v="https://vecta.io/nano">
                      <path d="M.057 24l1.687-6.163C.703 16.033.156 13.988.157 11.891.16 5.335 5.495 0 12.05 0c3.181.001 6.167 1.24 8.413 3.488s3.481 5.236 3.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 0 1-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347s-1.758-.868-2.031-.967-.47-.149-.669.149-.768.967-.941 1.165-.347.223-.644.074-1.255-.462-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059s-.018-.458.13-.606c.134-.133.297-.347.446-.521s.2-.296.3-.495.05-.372-.025-.521-.669-1.611-.916-2.206c-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074 2.095 3.2 5.076 4.487c.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413s.248-1.29.173-1.414z"/>
                  </svg>
              </div>
              <div>
                  {{ __('att.whatsapp') }}
              </div>
                 
          </button>
        </div>
       
       <div wire:loading>
            <div role="status">
                <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-teal-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
        </div>
     </div>
</div>
