<x-app-layout>

    <div class=" px-5 py-8 flex   gap-5 flex-wrap">

        @foreach ($products as $product)
            <div class="w-[32%]  border-2 border-black">
                <img class="w-full h-[40vh] object-cover" src="{{ asset('storage/images/products/' . $product->image) }}"
                    alt="">
                <div class="p-4 flex items-center justify-between">
                    <div class="">
                        <h1 class="font-bold text-lg">{{ $product->name }}</h1>
                        <h1 class="text-gray-500">{{ $product->price }} $</h1>
                    </div>

                    @if ($product->stock > 0)
                        <form method="post" action="{{ route('cart.add', $product) }}">
                            @csrf @method('PUT')
                            <button class="px-6 py-2 bg-gray-800 text-white rounded-lg">Add To Cart</button>
                        </form>
                    @else
                        <button class="px-6 py-2 text-red-500  rounded-lg">Out Of Stock</button>
                    @endif
                </div>
            </div>
        @endforeach

    </div>

</x-app-layout>
