<div x-data="{telephone: @entangle('telephone'),whatsapp: @entangle('whatsapp')}">
  <x-dialog-modal wire:model='visible' >
      <x-slot name='title'>
          <div class='relative w-full px-12 text-lg font-bold text-green-900 dark:text-gray-50 '>
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
          <div  class="flex flex-col space-y-4 w-full ">
    
                              {{-- 2nd rows --}}
              <div class=" w-full grid lg:grid-cols-2 gap-x-6 gap-y-3 px-12  justify-items-center sm:grid-cols-1 ">
                  <div class="flex flex-col space-y-1 w-full">
                      <div class="flex justify-between">
                        <label   class="labels">{{ __('parent.add-nom') }}:</label>
                        @error('prname') <span class="danger">{{ $message }}</span> @enderror  
                      </div>
                      <input wire:model.defer='prname' class="inputs w-full @error('prname') reds @enderror" type="text" required  />
                  </div>

                  <div class="flex flex-col space-y-1 w-full">
                    <div class="flex justify-between">
                      <label   class="labels">{{ __('parent.nomfr') }}:</label>
                      @error('prnamefr') <span class="danger">{{ $message }}</span> @enderror  
                    </div>
                    <input wire:model.defer='prnamefr' class="inputs w-full @error('prnamefr') reds @enderror" type="text" required  />
                </div>

                  <div class="flex flex-col space-y-1 w-full">
                      <div class="flex justify-between">
                        <label   class="labels">{{ __('parent.add-sexe') }}:</label>
                        @error('psexe') <span class="danger">{{ $message }}</span> @enderror  
                      </div>
                      <select  wire:model.defer='psexe'  class="inputs w-full @error('psexe') reds @enderror" name="sexe"  required >
                          <option class="text-sm" value="0" >-----</option>
                          <option  class="text-sm" value="1">{{ __('etudiants.add-homme') }}</option>
                          <option class="text-sm" value="2">{{ __('etudiants.add-femme') }}</option>
                      </select>
                  </div>

                  <div class="flex flex-col space-y-1">
                    <div class="flex justify-between">
                      <label   class="labels">{{ __('parent.whatsapp') }}:</label>
                      @error('whatsapp') <span class="danger">{{ $message }}</span> @enderror 
                      @error('whcode') <span class="danger">{{ $message }}</span> @enderror  
                    </div>
                    <div  dir="ltr" class=" flex w-full">
                      <input dir="ltr" lang="fr"  wire:model='whcode'  class="inputs w-2/6 mx-1 px-2 @error('whcode') reds @enderror" type="text"  required  />
                      <input dir="ltr" lang="fr" x-model="whatsapp" x-mask="99 99 99 99 99 99 99" wire:model.defer='whatsapp' class="inputs w-4/6 @error('whcode') reds @enderror" type="text" required  />

                    </div>
                </div>

                  <div  class="flex flex-col space-y-1 w-full">
                    <div class="flex justify-between">
                      <label for="eid"  class="labels">{{ __('parent.add-tel') }}:</label>
                      @error('telephone') <span class="danger">{{ __('valid.'.$message) }}</span> @enderror  
                    </div>
                  <div class="flex w-full  relative ">
                    <input dir="ltr"  x-model="telephone" x-mask="99 99 99 99" wire:model.defer='telephone' class="inputs w-full @error('telephone') reds @enderror" type="text" required  />
                    <button @click="whatsapp = telephone, $wire.whatsapp = $wire.telephone" class=" absolute right-4 top-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                        </svg>
                    </button> 
                  </div>  
                </div>

                <div class="flex flex-col space-y-1  w-full">
                    <div class="flex justify-between">
                      <label   class="labels">{{ __('parent.pass') }}:</label>
                    </div>
                    <input dir="ltr" disabled  lang="fr" wire:model.defer='pass' class="inputs w-full text-center" type="text" required  />
                </div>

                <div class=" flex items-center justify-between col-span-2 w-full">
                  @can('admin')
                  <div class=" flex space-x-2">
                    <input id="check"   wire:model='check' type="checkbox" @if($check) checked @endif class="check w-6 h-6" >
                    <label for="check"  class="flex items-center">
                        <div class="flex space-x-1 mx-4 ">
                            <div class="flex flex-col">
                                <div class="text-sm font-semibold text-gray-900 dark:text-gray-200" >
                                  {{ __('parent.active') }}
                                </div>
                            </div>
                        </div>
                    </label>
                  </div>
                  @endcan

                  <button wire:click='sent'  type="button" class="w-full inline-flex justify-center rounded-md border dark:border-gray-500 px-5 py-1 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold  sm:w-auto sm:text-sm">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-text-50 " fill="currentColor" width="24" height="24" xmlns:v="https://vecta.io/nano">
                      <path d="M.057 24l1.687-6.163C.703 16.033.156 13.988.157 11.891.16 5.335 5.495 0 12.05 0c3.181.001 6.167 1.24 8.413 3.488s3.481 5.236 3.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 0 1-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347s-1.758-.868-2.031-.967-.47-.149-.669.149-.768.967-.941 1.165-.347.223-.644.074-1.255-.462-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059s-.018-.458.13-.606c.134-.133.297-.347.446-.521s.2-.296.3-.495.05-.372-.025-.521-.669-1.611-.916-2.206c-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074 2.095 3.2 5.076 4.487c.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413s.248-1.29.173-1.414z"></path>
                    </svg>
                                                                
                  </button>
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
            <button wire:click='submit'  type="button" class="mt-3 w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                  {{ __('etudiants.add-save') }} 
            </button>
          </div>
         
          </div>
       </x-slot>
  </x-dialog-modal>
</div>