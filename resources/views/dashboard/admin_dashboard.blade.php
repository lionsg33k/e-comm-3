<x-app-layout>
    {{-- <x-slot name="header">
    
        
    </x-slot> --}}


    <div class="">

        @include('dashboard.partials.users_table')
        @include('dashboard.partials.product_table')

    </div>


</x-app-layout>
