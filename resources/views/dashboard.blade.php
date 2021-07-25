<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <body>
            <form method="post" action="{{ route('captura') }}">
            @csrf
                <label>Digite sua busca</label>
                <input type="text" size="30" name="termo">
                <button style="width:100px;">Capturar</button>
            </form>
        </body>
    </div>
</x-app-layout>
