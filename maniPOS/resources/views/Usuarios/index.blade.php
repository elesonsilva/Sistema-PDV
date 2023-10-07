@extends('adminlte::page')

@section('title', 'usuarios')

@section('content_header')
    <h1>Cadastro de usuarios</h1>
@stop

@section('content')

<div class="conteiner">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h4 style="float: left">cadastro de usuarios</h4>
                <a href="#" style="float: right" class="btn btn-dark"><i class="fa fa-plus" data-toggle="modal" data-target="#addUser">

                </i>Novo usuario</a></div>
                <div class="card-body">
                    <table class="table table-bordered table-left">
                        <thead>
                         <tr>
                            <th>#</th>
                            <th>nome</th>
                            <th>email</th>
                            <th>telefone</th>
                            <th>Role</th>
                            <th>Ações</th>
                         </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $key=> $user)
                          
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->is_adm}}</td>
                                <td>
                                  <div class="btn-group">
                                    <a href="#"data-toggle="modal" data-target="#editUser{{ $user->id }}" ><i class="fa fa-edit"></i> edit</a>
                                    <a href="#"data-toggle="modal" data-target="#deltUser" ><i class="fa fa-trash"></i> del</a>
                                  </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>Pesquisar Usuario</h4></div>
                <div class="card-body">
                    ..............
                </div>
            </div>
            </div>
        </div>
    </div>
</div>



<!--MODAL DE CADASTRO DE USUARIO-->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="">Nome:</label>
            <input type="text" name="name" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Email:</label>
            <input type="text" name="email" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">phone:</label>
            <input type="text" name="phone" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">senha:</label>
            <input type="password" name="senha" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Confirm senha:</label>
            <input type="password" name="confimasenha" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Role:</label>
            <select name="is_admin" id="" class="form-control">
              <option value="1">adm</option>
              <option value="2">cash</option>
            </select>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-block">Saver User</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL DE EDITAR USUARIO-->
<!--MODAL-->
<div class="modal right fade" id="editUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">editar Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        {{$user->id}}
      </div>
      <div class="modal-body">
        <form action="{{ route('user.update', $user->id)}}" method="post">
          @csrf
          @method('put')
          <div class="form-group">
            <label for="">Nome:</label>
            <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Email:</label>
            <input type="text" name="email" id="" value="{{$user->email}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="">phone:</label>
            <input type="text" name="phone" id="" value="{{$user->phone}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="">senha:</label>
            <input type="password" name="senha" id="" value="{{$user->senha}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Confirm senha:</label>
            <input type="password" name="confimasenha" id="" value="{{$user->senha}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Role:</label>
            <select name="is_admin" id="" class="form-control">
              <option value="1">adm</option>
              <option value="2">cash</option>
            </select>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-block">Saver User</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>



<!-- MODAL DE APAGAR USUARIO-->
<!--MODAL-->
<div class="modal right fade" id="deltUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Apagar Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        {{$user->id}}
      </div>
      <div class="modal-body">
        <form action="{{ route('user.destroy', $user->id)}}" method="post">
          @csrf
          @method('delete')
          <p>deseja realmanete apagar o {{$user->name}} ?</p>
          <div class="modal-footer">
            <button class="btn btn-default " data-dismiss="modal">Cnacelar</button>
            <button  type="submit" class="btn btn-danger">Apagar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<style>
.modal.right .modal-dialog{
  /* position:absolute; */
  top:0;
  right: 0;
  margin-right: 10vh;

}
</style>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop