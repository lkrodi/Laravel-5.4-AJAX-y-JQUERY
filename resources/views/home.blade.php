@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="alert alert-info">
                        <span id="productos-total"> 
                            {{ $productos->total() }} 
                        </span>
                        registros | pagina {{ $productos->currentPage() }} de {{ $productos->lastPage() }}
                    </p>
                    <div id="alert" class="alert alert-danger"></div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="20px">ID</th>
                                <th>Name</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $item)
                            <tr>
                                <td width="20px">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td width="20px">
                                    {!! Form::open(['route' => ['destroyProduct', $item->id], 'method' => 'DELETE']) !!}
                                    <!--Le asignamos una clase debido a que estes se pueden repetir en cambio un id no.-->
                                        <a href="#" class="btn btn-danger btn-delete">Eliminar</a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--Con esto le colocamos la paginación, como es puro html nos conviene mostrarlo con esas llaves y signos de admiracion-->
                     {!! $productos->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
