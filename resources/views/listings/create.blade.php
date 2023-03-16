<x-layout>
<x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add a new product
        </h2>
        <p class="mb-4">post a new footwear for your customers</p>
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
      @csrf
        {{-- PRODUCT NAME --}}
        <div class="mb-6">
            <label
                for="name"
                class="inline-block text-lg mb-2"
                >Product Name</label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                placeholder="Please enter name of the product"
                name="name" value="{{old('name')}}"/>
              @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
        </div>

        {{-- BRAND --}}
        <div class="mb-6">
            <label for="brand" class="inline-block text-lg mb-2"
                >Brand</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="brand"
                placeholder="Please enter brand of the product"
                value="{{old('brand')}}"
            />
            @error('brand')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
        </div>

        {{-- TYPE --}}
        <div class="mb-6">
            <label
                for="type"
                class="inline-block text-lg mb-2"
                >Type</label
            >
            <select
                class="border border-gray-200 rounded p-2 w-full"
                name="type"
            >
                <option value=""> -- Please select a type --</option>
                <option value="running">Running</option>
                <option value="basketball">Basketball</option>
                <option value="casual">Casual</option>
            </select>
            @error('type')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
        </div>

        {{-- COLOR --}}
        <div class="mb-6">
            <label
                for="color"
                class="inline-block text-lg mb-2"
                >Color</label
            >
            <select
                class="border border-gray-200 rounded p-2 w-full"
                name="color"
            >
                <option value=""> -- Please select a color --</option>
                <option value="black">Black</option>
                <option value="gray">Gray</option>
                <option value="white">White</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
            </select>
            @error('color')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
        </div>
        
        {{-- PRODUCT PREVIEW --}}
        <div class="mb-6">
            <label for="product_preview" class="inline-block text-lg mb-2">
               Product Preview
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="product_preview"
            />
            @error('product_preview')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
        </div>

        
        {{-- PRICE --}}
        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2"
                >Price</label
            >
            <input
                type="number"
                class="border border-gray-200 rounded p-2 w-full"
                name="price"
                placeholder="Please enter price of product"
                value="{{old('price')}}"
            />
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
        </div>

        {{-- PRODUCT DESCRIPTION --}}
        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Product Description
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="Please enter description of the product"
                value="{{old('description')}}"
            ></textarea>
              @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
        </div>


        <div class="mb-6">
            <button
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
               Add Product
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
</x-layout>