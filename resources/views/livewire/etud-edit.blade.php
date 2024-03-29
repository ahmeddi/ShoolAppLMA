<div>
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
            <div class="flex flex-col space-y-4 ">
      
                {{--  top rows --}}
                <div class="grid lg:grid-cols-2 gap-x-6 gap-y-3 px-12  justify-items-center sm:grid-cols-1 ">
                    <div class="flex flex-col space-y-1">
                        <div class="flex justify-between">
                          <label  class="labels">{{ __('etudiants.add-nom') }}:</label>
                          @error('nom') <span class="danger">{{ $message }}</span> @enderror  
                        </div>
                      <input wire:model='nom' class="inputs @error('nom') reds @enderror" type="text"   required  />    
                    </div>
                      
                      <div class="flex flex-col space-y-1">
                          <div class="flex justify-between">
                            <label   class="labels">{{ __('etudiants.add-nomfr') }}:</label>
                            @error('nomfr') <span class="danger">{{ $message }}</span> @enderror  
                          </div>
                          <input wire:model='nomfr' class="inputs @error('nomfr') reds @enderror" type="text" required  />
                      </div>

                    <div class="flex flex-col space-y-1">
                        <div class="flex justify-between">
                          <label   class="labels">{{ __('etudiants.add-sex') }}:</label>
                          @error('sexe') <span class="danger">{{ $message }}</span> @enderror  
                        </div>
                        <select  wire:model='sexe'  class="inputs @error('sexe') reds @enderror" name="sexe"  required >
                            <option class="text-sm" value="0" >-----</option>
                            <option  class="text-sm" value="1">{{ __('etudiants.add-homme') }}</option>
                            <option class="text-sm" value="2">{{ __('etudiants.add-femme') }}</option>
                        </select>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <div class="flex justify-between">
                          <label for="eid"  class="labels">{{ __('etudiants.add-ddn') }}:</label>
                          @error('ddn') <span class="danger">{{ $message }}</span> @enderror  
                        </div>
                      <input wire:model='ddn' class="inputs @error('ddn') reds @enderror" type="date"   required  />    
                    </div>

                    <div class="flex flex-col space-y-1">
                        <div class="flex justify-between">
                          <label   class="labels">{{ __('etudiants.add-nni') }}:</label>
                          @error('nni') <span class="danger">{{ $message }}</span> @enderror  
                        </div>
                        <input wire:model='nni' class="inputs @error('nni') reds @enderror" type="number" required  />
                    </div>

                    <div class="flex flex-col space-y-1">
                        <div class="flex justify-between">
                          <label   class="labels">{{ __('etudiants.add-ns') }}:</label>
                          @error('nc') <span class="danger">{{ $message }}</span> @enderror  
                        </div>
                        <input wire:model='nc' class="inputs @error('nc') reds @enderror" type="number" required  />
                    </div>
                </div>

                                {{-- 2nd rows --}}
                <div class="grid lg:grid-cols-2 gap-x-6 gap-y-3 px-12  justify-items-center sm:grid-cols-1 ">
                      
                      <div class="flex flex-col space-y-1">
                          <div class="flex justify-between">
                            <label   class="labels">{{ __('etudiants.add-classe') }}:</label>
                            @error('cls') <span class="danger">{{ $message }}</span> @enderror  
                          </div>
                          <select wire:change='num'    wire:model="cls"   class="inputs @error('cls') reds @enderror">
                            <option value="">-----</option>
                                @forelse ($Classes as $value)
                                    <option value="{{ $value->id }}"> {{ $value->nom }} </option>
                                @empty
                                @endforelse 
                          </select>
                      </div>
                      <div class="flex flex-col space-y-1">
                        <div class="flex justify-between">
                          <label for="eid"  class="labels">{{ __('etudiants.add-nb') }}:</label>
                          @error('nb') <span class="danger">{{ $message }}</span> @enderror  
                        </div>
                      <input  wire:model='nb' placeholder="{{ $nbs }}" class="inputs placeholder:text-teal-700/70 dark:placeholder:text-teal-400/70 @error('nb') reds @enderror" type="number"   required  />    
                    </div>

                    @can('dir')
                    <div class="flex flex-col space-y-1">
                      <div class="flex justify-between">
                        <label   class="labels">{{ __('etudiants.carte') }}:</label>
                        @error('sexe') <span class="danger">{{ $message }}</span> @enderror  
                      </div>
                      <select  wire:model='card'  class="inputs @error('card') reds @enderror" name="card"  required >
                          <option class="text-sm" value="0" >-----</option>
                          <option  class="text-sm" value="1">{{ __('etudiants.carte-jaune') }}</option>
                          <option class="text-sm" value="2">{{ __('etudiants.cartes-jaunes') }}</option>
                          <option class="text-sm" value="3">{{ __('etudiants.carte-rouge') }}</option>
                      </select>
                    </div>
                    @endcan
                    


                    @can('admin')
                      <div class="flex flex-col space-y-1">
                        <div class="flex justify-between">
                          <label   class="labels opacity-0">{{ __("etudiants.carte") }}</label>
                          @error('list') <span class="danger">{{ $message }}</span> @enderror  
                        </div>
                        <select  wire:model='list'  class="inputs @error('list') reds @enderror" name="list"  required >
                            <option  class="text-sm" value="0">{{ __('etudiants.liste') }}</option>
                            <option class="text-sm" value="1"> {{ __('etudiants.nliste') }}  </option>
                        </select>
                      </div>   
                    @endcan
                    

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
              <button wire:click='submit'  type="button" class="w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    {{ __('etudiants.add-save') }} 
              </button>
            </div>
           
            </div>
         </x-slot>
    </x-dialog-modal>
</div>