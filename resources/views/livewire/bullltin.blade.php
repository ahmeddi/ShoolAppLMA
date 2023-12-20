<div dir="rtl" class=" flex flex-col space-y-2 w-full h-full">
    <img wire:model='header' src="{{ asset('storage'.'/'.$header) }}" class="h-24 w-auto object-cover mb-2 "    />

    <div class="w-full mb-2 flex  font-extrabold text-lg text-center  justify-center dark:text-gray-50 print:dark:text-gray-900">
        كشف الدرجات - Bulletin de Notes
    </div>
    <div class="w-full flex mb-1 rounded-md p-2 border border-gray-600">

        <table class="w-full mb-1 text-sm text-right text-gray-800 rounded-t-md overflow-hidden dark:text-gray-200">  
                <tr class="  ">
                    <td class="w-1/6">الإسم:</td>
                    <td class="w-fit text-center font-bold">  {{ $etud->nom }} - {{ $etud->nomfr }} </td>
                    <td class="w-1/6 text-left">:Nom</td>
                </tr>
                <tr class="">
                    <td class="w-1/6">القسم:</td>
                    <td class="w-fit text-center font-bold">  {{ $etud->classe->nom }} </td>
                    <td class="w-1/6 text-left">:Classe</td>
                </tr>
                <tr class="">
                    <td class="w-1/6">رقم التسجيل :</td>
                    <td class="w-fit text-center font-bold">  {{ $etud->nb }} </td>
                    <td class="w-1/6 text-left">:Matricule</td>
                </tr>
                <tr class="">
                    <td class="w-1/6">السنة الدراسية :</td>
                    <td class="w-fit text-center font-bold">  2023 - 2024  </td>
                    <td class="w-1/6 text-left">:Année Scolaire
                    </td>
                </tr>
                <tr class="">
                    <td class="w-1/6">  </td>
                    <td class="w-fit text-center font-bold">  {{  $sem->nom }} - {{ $sem->nomfr }}  </td>
                    <td class="w-1/6 text-left">  </td>
                </tr>     
        </table>
        <div class=" w-28  h-fit overflow-hidden p-1 mx-1 rounded-md ">
            @if ($etud->image)
                <img src="{{ asset('storage/'.$etud->image) }}" class="h-full w-auto object-cover "    />
            @else 
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full text-gray-200 dark:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
            @endif

        </div>
    </div>
    
    

    <table class="w-full  text-xs text-right text-gray-900  dark:text-gray-400">
            <tr class="text-xs  divide-y divide-x divide-gray-900 dark:bg-gray-800 bg-gray-100 border border-gray-900">
                <th scope="col" class="py-1 px-3 border border-gray-900">   
                    <div>المادة</div>
                    <div>Matière</div>
                </th>
                <th scope="col" class="py-1 px-3 w-40 text-center border border-gray-900"> 
                    <div>  الإختبارات</div>
                    <div>Evaluation </div>
                </th>
                <th scope="col" class="py-1 px-3 w-20 text-center">
                    <div> المعدل </div>
                    <div>Moyenne </div>
                </th>
                <th scope="col" class="py-1 px-3 w-24 text-center">   
                    <div>     معدل القسم </div>
                    <div>Moy Classe </div>
                </th>

                <th scope="col" class="py-1 px-3 text-center">   
                    <div> الملاحظات </div>
                    <div>Appréciation  </div>
                </th>

            </tr>
        <tbody>
            @forelse ($results as $result)

                <tr class="border border-gray-900 divide-y divide-x divide-gray-900 w-full even:bg-gray-100 dark:even:bg-gray-800 dark:odd:bg-gray-900 bg-white  dark:bg-gray-800 ">
                    <th scope="row" class="py-1 px-3 font-bold print:dark:text-gray-700 print:text-gray-700 text-gray-900 whitespace-nowrap dark:text-white  border border-gray-900">
                        {{   $result['nom']  }}
                    </th>
                    <td class="py-1 px-3  font-mono">
                        {{ $result['devn']  }}
                    </td>
                    <td class="py-1 px-3 text-center font-mono">

                        @if ($result['devm'] == -1)
                            
                        @else
                        {{  round($result['devm'], 2) }}
                        @endif
                             
                        
                 
                    </td>
                    <td class="py-1 px-3 text-center font-mono">
                        {{    round(($result['moy_classe']), 2)  }}
                    </td>
                    

                    <td class="py-1 px-3 text-center font-mono">
                        {{ $result['note']  }}
                    </td>

                </tr>   

            @empty
            @endforelse



        </tbody>
    </table>
    
        <div class="border border-gray-900 p-1 w-full flex justify-between print:dark:text-gray-700 print:text-gray-700 text-gray-900 whitespace-nowrap dark:text-white">
        <div class="px-3">
             المعدل العام
        </div>
        <div class="  font-extrabold  text-center justify-center items-center ">
             {{  round(($tot), 1), }}
        </div>
        <div class="px-3">
            Moyenne générale
        </div>
    </div>

    
    <div class=" w-full flex justify-between print:dark:text-gray-700 print:text-gray-700 text-sm text-gray-900 whitespace-nowrap dark:text-white">
        <div class="py-1 px-3 font-bold">
            معدل القسم 
        </div>

        <div  class="py-1 px-3 text-center font-bold ">
            {{  round(($moy_classe), 1), }} 
        </div>


        <div class="py-1 px-3 font-bold ">
            Moyenne Classe
        </div>
    </div>
    <div class=" mt-2  text-gray-900 dark:text-gray-50 w-full justify-center items-center p-1 flex flex-col">
        
        <div class="text-center font-bold ">التوصيات -  Recommandations</div>
        <div class=" text-center font-semibold text-sm"> 
            {{ $recomendation }}
        </div>
       
        
    </div>
    
    
</div>
