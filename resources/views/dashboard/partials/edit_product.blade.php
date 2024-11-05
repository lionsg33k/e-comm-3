<div id="product{{ $product->id }}"
    class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class=" m-auto shadow-xl rounded-md bg-white max-w-md">

        <div class="flex justify-end p-2">
            <button onclick="closeModal('product{{ $product->id }}')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <form enctype="multipart/form-data" method="post" action="{{ route('product.update' , $product) }}" class="w-full p-4">
            @csrf
            @method("PUT")
            <h1 class="text-center font-semibold pb-3">Add Product</h1>

            <div class="w-full flex py-2 flex-col gap-y-3">
                <label for="">Name</label>
                <input value="{{ old('name', $product->name) }}" name="name" placeholder="Insert Product Name"
                    type="text">
            </div>
            <div class="w-full flex py-2 flex-col gap-y-3">
                <label for="">Description</label>
                <input value="{{ old('description', $product->description) }}" name="description"
                    placeholder="Insert Product Description" type="text">
            </div>
            <div class="w-full flex py-2 flex-col gap-y-3">
                <label for="">Stock</label>
                <input value="{{ old('stock', $product->stock) }}" name="stock" placeholder="How many item you have"
                    type="number" min="0">
            </div>
            <div class="w-full flex py-2 flex-col gap-y-3">
                <label for="">Price</label>
                <input value="{{ old('price', $product->price) }}" name="price" placeholder="insert  a valid Price"
                    type="number" min="0">
            </div>
            <div class="w-full flex py-2 flex-col gap-y-3">
                <label for="">Image</label>
                <div class="relative w-full py-2 border text-center border-black">
                    <div class="">Drope an image here</div>
                    <input name="image" accept="image/*"
                        class="absolute w-full cursor-pointer opacity-0  top-0 left-0 h-full " type="file"
                        class="w-full">

                </div>
            </div>

            <button class="w-full py-2 bg-gray-800 rounded-lg text-white mt-2">Update Product</button>

        </form>

    </div>
</div>

<script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
</script>
