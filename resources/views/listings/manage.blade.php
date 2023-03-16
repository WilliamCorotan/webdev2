<x-layout>
  <x-card class="p-10">
    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Manage Footwears
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($listings->isEmpty())
            @foreach($listings as $listing)

            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/listings/{{$listing->id}}"> {{$listing->name}} </a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                        Edit</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                  <form method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                        Delete
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-gray-300">
                <th class="px-4 py-8 border-t  border-gray-300 text-lg">
                  <p class="text-center">No Products Found</p>  
                                  
                </th>
                          
            </tr>
            <tr class="border-gray-300">
                <th class="px-4 py-8  border-b border-gray-300 text-lg">
                    <a
                    href="/listings/create"
                    class=" px-6 py-4 bg-laravel text-white hover:bg-orange-400 rounded-xl"
                    >Post Footwear</a> 
                                  
                </th>
                          
            </tr>
            @endunless
        </tbody>
    </table>
  </x-card>

</x-layout>