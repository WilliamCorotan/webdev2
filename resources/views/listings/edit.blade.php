<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update Product
            </h2>
        </header>
    
        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
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
                    name="name" value="{{ $listing->name }}"/>
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
                    value="{{$listing->brand}}"
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
                    class="border border-gray-200 rounded p-2 w-full capitalize"
                    name="type"
                >
                
                @php
                    $types  = ['running', 'basketball', 'casual'];
                @endphp
                @foreach ($types as $type)
                    <option class="capitalize" value="{{ $type }}" {{ ($type == $listing->type ? 'selected' : '') }}>{{ $type }}</option>
                @endforeach
                
                    
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
                    class="border border-gray-200 rounded p-2 w-full capitalize"
                    name="color"
                >
                @php
                $colors  = ['black', 'gray', 'white', 'red', 'blue'];
                @endphp
                @foreach ($colors as $color)
                    <option class="capitalize" value="{{ $color }}" {{ ($color == $listing->color ? 'selected' : '') }}>{{ $color }}</option>
                @endforeach
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
                  <img
                  class="w-4/5 mx-auto my-4 md:block"
                  src="{{$listing->product_preview ? asset('storage/' . $listing->product_preview) : asset('images/no-image.png')}}"
                  alt=""
              />
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
                    value="{{$listing->price}}"
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
                    
                >{{ $listing->description }}</textarea>
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