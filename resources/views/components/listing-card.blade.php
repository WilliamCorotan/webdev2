@props(['listing'])

<x-card>
  <div class="flex">
      <img
          class="hidden w-48 mr-6 md:block"
          src="{{$listing->product_preview ? asset('storage/' . $listing->product_preview) : asset('images/no-image.png')}}"
          alt=""
      />
      <div >
          <h3 class="text-2xl">
              <a href="/listings/{{$listing->id}}">{{$listing->name}}</a>
          </h3>
          <div class="text-md font-bold mb-4">{{$listing->brand}}</div>
          <div class="flex">
                
            <x-listing-tags :tagsCsv="$listing->color"/>
            <x-listing-tags :tagsCsv="$listing->type"/>
        </div>
          <div class="text-md  my-4">{{$listing->description}}</div>

          <div class="text-lg mt-4 ">
            <i class="fa-solid fa-tag"></i> {{$listing->price}}
          </div>
      </div>
  </div>
</x-card>