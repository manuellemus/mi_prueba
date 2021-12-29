@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Editando a {{ $employee->name }}</div>

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
                    <form action="{{ route('mi-prueba.update', $employee->id) }}" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name">Nombre *</label>
                            <input type="text" name="name" class="form-control " require value="{{ old('name', $employee->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellido *</label>
                            <input type="text" name="last_name" class="form-control " require value="{{ old('last_name', $employee->last_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="age">Edad *</label>
                            <input type="text" name="age" class="form-control " require value="{{ old('age', $employee->age) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email" class="form-control " require value="{{ old('email', $employee->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Habilidades *</label>
                            <select class="form-control" name="abilities" id="exampleFormControlSelect1">
                                <option  value="php"        @php echo $employee->abilities == 'php' ? 'selected' : '' @endphp       >php</option>
                                <option value="Html"        @php echo $employee->abilities == 'Html' ? 'selected' : '' @endphp      >Html</option>
                                <option value="Css"         @php echo $employee->abilities == 'Css' ? 'selected' : '' @endphp       >Css</option>
                                <option value="Laravel"     @php echo $employee->abilities == 'Laravel' ? 'selected' : '' @endphp   >Laravel</option>
                                <option value="Java"        @php echo $employee->abilities == 'Java' ? 'selected' : '' @endphp      >Java</option>
                                <option value="js"          @php echo $employee->abilities == 'js' ? 'selected' : '' @endphp        >js</option>
                                <option value="Angular"     @php echo $employee->abilities == 'Angular' ? 'selected' : '' @endphp   >Angular</option>
                                <option value="Node"        @php echo $employee->abilities == 'Node' ? 'selected' : '' @endphp      >Node</option>
                                <option value="Linux"       @php echo $employee->abilities == 'Linux' ? 'selected' : '' @endphp     >Linux</option>
                                <option value="Servidores"  @php echo $employee->abilities == 'Servidores' ? 'selected' : '' @endphp>Servidores</option>
                            </select>
                        </div>
                        <div class=" form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Guardar" class="btn btn-sm btn-primary col-12">
                        </div>
                    </form>
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