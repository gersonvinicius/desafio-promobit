<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Tags') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('tags.create') }}"
                   class="inline-flex items-center px-4 py-2 mx-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                   NOVA TAG
                </a>
                @if ($message = Session::get('success'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ $message }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <table class="w-full table-fixed">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($tags))
                            @foreach($tags as $row)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $row->name }}</td>
                                    <td class="px-4 py-2 border">{{ $row->email }}</td>
                                    <td class="px-4 py-2 border">
                                        <form action="{{ route('tags.destroy', $row->id) }}" method="POST">
                                            <a href="{{ route('tags.show', $row->id) }}" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                                Show
                                            </a>
                                            <a href="{{ route('tags.edit', $row->id) }}" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                                Editar
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="delete" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25" onclick="return confirm('Deseja excluir a tag?')">
                                                Deletar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td class="px-4 py-2 border text-red-500" colspan="3">Produtos não encontrados.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $tags->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
