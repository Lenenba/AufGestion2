        <div class="rounded h-full flex justify-center items-center border-l-4 border-{{$color}}-700 hover:bg-{{$color}}-100 mx-4">
          <div class="rounded bg-white shadow-md h-48 w-48 p-6 flex flex-col justify-around">
            <div>
                <p class="text-base text-gray-600">{{ $titre }}</p>
            </div>
            <div>
              <p class="text-2xl text-gray-700 font-bold">{{ $elts }}</p>
            </div>
            <div class="flex justify-between text-sm">
                <p class="text-green-500  my-2 mr-8">
                  <vue-ellipse-progress :progress="{{ ($elts*100)/10000 }}" :size="50" class="text-xs text-{{$color}}-700 "  color="{{$color}}"/>    
                </p>
                <p class="text-gray-600 my-2">{{ Illuminate\Support\Carbon::parse($date)->diffForHumans() }}</p>
           </div>
          </div>
        </div>