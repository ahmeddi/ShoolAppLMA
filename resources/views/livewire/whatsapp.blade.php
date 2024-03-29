<div class=" bg-gray-50 dark:bg-gray-900 p-3">
    <div class="flex flex-col space-y-4 px-12 py-2 ">
        <div class="grid lg:grid-cols-2 gap-x-6 gap-y-3   justify-items-center sm:grid-cols-1 ">
            <div class="flex flex-col space-y-1 col-span-2 w-full ">
                <div class="flex justify-between">
                  <label for="msg"  class="labels"> {{ __('navlink.wh-text') }}:</label>
                  @error('msg') <span class="danger ">{{ $message }}</span> @enderror  
                </div>
                <textarea wire:model='msg' class="textearea h-36 w-full @error('msg') reds @enderror" type="text" required  ></textarea>
            </div>
        </div>
        <div class="flex flex-col space-y-1">
            <div class="flex justify-between">
              <label   class="labels">{{ __('etudiants.add-classe') }}:</label>
              @error('cls') <span class="danger">{{ $message }}</span> @enderror  
            </div>
            <select  wire:model.defer="cls"   class="inputs @error('cls') reds @enderror">
              <option value="">-----</option>
                  @forelse ($Classes as $value)
                      <option value="{{ $value->id }}"> {{ $value->nom }} </option>
                  @empty
                  @endforelse 
            </select>
        </div>

        <div class="flex flex-col space-y-1">
            <div class="flex justify-between">
              <label   class="labels">{{ __('navlink.atdds-profs') }}:</label>
              @error('cls') <span class="danger">{{ $message }}</span> @enderror  
            </div>
            <select  wire:model.defer="profsSelected"   class="inputs @error('cls') reds @enderror">
              <option value="">-----</option>
                    <option value="jardin"> Jardin </option>
                    <option value="primaire"> Élémentaire </option>
                    <option value="college"> College </option>
                    <option value="lycee"> Lycée </option>
            </select>
        </div>

        <div class=" flex space-x-2">
            <input id="profs"   wire:model='profs' type="checkbox"    class="check w-6 h-6" >
            <label for="profs"  class="flex items-center">
                <div class="flex space-x-1 mx-4 ">
                    <div class="flex flex-col">
                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-200" >
                          {{ __('navlink.atdds-profs') }}
                        </div>
                    </div>
                </div>
            </label>
        </div>
        <div class=" flex space-x-2">
            <input id="emps"   wire:model='emps' type="checkbox"    class="check w-6 h-6" >
            <label for="emps"  class="flex items-center">
                <div class="flex space-x-1 mx-4 ">
                    <div class="flex flex-col">
                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-200" >
                          {{ __('navlink.atdds-emps') }}
                        </div>
                    </div>
                </div>
            </label>
        </div>
        <div class=" flex space-x-2">
            <input id="parent"   wire:model='parent' type="checkbox"    class="check w-6 h-6" >
            <label for="parent"  class="flex items-center">
                <div class="flex space-x-1 mx-4 ">
                    <div class="flex flex-col">
                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-200" >
                          {{ __('navlink.parent') }}
                        </div>
                    </div>
                </div>
            </label>
        </div>

        <div class=" w-full flex justify-end">
            <div wire:loading class="">
                <div role="status ">
                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-teal-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove class="flex justify-between">
              <div class=' flex space-x-3 justify-end items-center w-full'>
                <button wire:click='send'  type="button" class="mt-3 w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                      {{ __('navlink.wh-send') }} 
                </button>
              </div>
            </div>

        </div>

    </div> 
</div>
