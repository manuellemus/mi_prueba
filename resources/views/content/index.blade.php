@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Mi-prueba</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nueva persona</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="list-person-tab" data-toggle="tab" href="#list-person" role="tab" aria-controls="list-person" aria-selected="false">Personas registradas</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <form action="{{ route('mi-prueba.store') }}" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="name">Nombre *</label>
                                    <input type="text" name="name" class="form-control " require>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Apellido *</label>
                                    <input type="text" name="last_name" class="form-control " require>
                                </div>
                                <div class="form-group">
                                    <label for="age">Edad *</label>
                                    <input type="text" name="age" class="form-control " require>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" class="form-control " require>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Habilidades *</label>
                                    <select class="form-control" name="abilities" id="exampleFormControlSelect1">
                                        <option value="php">php</option>
                                        <option value="Html">Html</option>
                                        <option value="Css">Css</option>
                                        <option value="Laravel">Laravel</option>
                                        <option value="Java">Java</option>
                                        <option value="js">js</option>
                                        <option value="Angular">Angular</option>
                                        <option value="Node">Node</option>
                                        <option value="Linux">Linux</option>
                                        <option value="Servidores">Servidores</option>
                                    </select>
                                </div>
                                <div class=" form-group">
                                    @csrf
                                    <input type="submit" value="Enviar" class="btn btn-sm btn-primary col-12">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="list-person" role="tabpanel" aria-labelledby="list-person-tab">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Edad</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Habilidades</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->age }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->abilities }}</td>
                                        <td>
                                            <a href="{{ route('mi-prueba.edit', $employee->id) }}" class="btn-sm btn-primary float-right">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('mi-prueba.destroy', $employee) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('Desea Eliminar ?...')">

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employees->links() }}
                        </div>
                    </div>



                </div>

            </div>

        </div>
    </div>
</div>
<script>
    $('#myTab a').on('click', function(event) {
        event.preventDefault()
        $(this).tab('show')
    })
</script>
@endsection