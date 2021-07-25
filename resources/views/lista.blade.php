<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            listagem
        </h2>
    </x-slot>

    <div class="py-12">
        <body>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome veiculo</th>
                    <th scope="col">Link</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Combustivel</th>
                    <th scope="col">Portas</th>
                    <th scope="col">Quilometragem</th>
                    <th scope="col">Câmbio</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Id Usuario</th>
                    <th scope="col">Data</th>
                    <th scope="col">Deletar</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($listas as $lista)
                    <tr>
                        <th scope="row">{{ $lista->id }}</th>
                        <td>{{ $lista->nome_veiculo }}</td>
                        <td>{{ $lista->link }}</td>
                        <td>{{ $lista->ano }}</td>
                        <td>{{ $lista->combustivel }}</td>
                        <td>{{ $lista->portas }}</td>
                        <td>{{ $lista->quilometragem }}</td>
                        <td>{{ $lista->cambio }}</td>
                        <td>{{ $lista->cor }}</td>
                        <td>{{ $lista->user_id }}</td>
                        <td>{{ $lista->created_at }}</td>
                        <td>
                            <form  class="form-inline" method="POST" action="/captura/{{ $lista->id }}">
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </body>
    </div>
</x-app-layout>


