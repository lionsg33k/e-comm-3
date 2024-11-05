<x-app-layout>
    {{-- <x-slot name="header">
    
        
    </x-slot> --}}

    <h1 class="py-10 text-3xl">Cart</h1>

   @foreach ($user->products as $product)
       <div class="flex gap-x-2d">

           <h1>{{ $product->name }}</h1>
           <h1>{{ $product->pivot->quantity }}</h1>

       </div>
   @endforeach

   

</x-app-layout>
