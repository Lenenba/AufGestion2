        <div class=" flex-1 flex justify-between items-center bg-white shadow-md mx-4 text-sm text-gray-400 border-l-4 border-{{$color}}-700 rounded-lg hover:bg-{{$color}}-100 ">

               <div class="flex flex-col {{ (Illuminate\Support\Arr::exists(['FOURNISSEURS', 'COMPTES', 'PROJETS', 'EMPLOYÉS'], $titre))? 'ml-10' : 'ml-4'}} items-center justify-items-center my-3">
                  <h2 class="flex text-gray-600 text-lg font-semibold"> {{ $titre }}</h2> 
                  <h2 class="flex text-{{$color}}-700 text-sm font-semibold"> {{ $elts }}</h2> 
              </div>

              @if ($titre == 'FOURNISSEURS')
              <vue-ellipse-progress :progress="{{ ($elts*100)/10000 }}" :size="100" class="mr-10 my-2 flex justify-items-center text-xs text-{{$color}}-700 "  color="{{$color}}">
                <p slot="legend-caption">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-{{$color}}-700 flex rounded-lg text-xs w-15">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </p>
             </vue-ellipse-progress>
              @elseif ($titre == 'COMPTES')
              <vue-ellipse-progress :progress="{{ ($elts*100)/10000 }}" :size="100" class="mr-10 my-2 flex justify-items-center text-xs text-{{$color}}-700 "  color="{{$color}}">
                <p slot="legend-caption">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-{{$color}}-700 flex rounded-lg text-xs w-15">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </p>
             </vue-ellipse-progress>
              @elseif ($titre == 'PROJETS')
              <vue-ellipse-progress :progress="{{ ($elts*100)/10000 }}" :size="100" class="mr-10 my-2 flex justify-items-center text-xs text-{{$color}}-700 "  color="{{$color}}">
                <p slot="legend-caption">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-{{$color}}-700 flex rounded-lg text-xs w-15">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                  </svg>
                </p>
             </vue-ellipse-progress>
              @elseif ($titre == 'EMPLOYÉS')
              <vue-ellipse-progress :progress="{{ ($elts*100)/10000 }}" :size="100" class="mr-10 my-2 flex justify-items-center text-xs text-{{$color}}-700 "  color="{{$color}}">
                <p slot="legend-caption">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-{{$color}}-700 flex rounded-lg text-xs w-15 ">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </p>
             </vue-ellipse-progress>
              @else
                <vue-ellipse-progress :progress="{{ ($elts*100)/10000 }}" :size="50" class="mx-8 my-2 flex justify-items-center text-xs text-{{$color}}-700 "  color="{{$color}}"/>
             @endif   
  
        </div>