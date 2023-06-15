<x-app-layout>
    <div class="main-content">
        <div class="alert alert-secondary mx-4" role="alert">

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Editar rol</h5>
                            </div>
                            <a href="{{route('admin.roles.index')}}" class="btn btn-outline-primary btn-sm mb-0" type="button">+&nbsp; Index Rol</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.roles.update', $role)}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group input-group-outline mb-3">

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name" name="name"
                                            value="{{$role->name}}">
                                    </div>
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0">ACTUALIZAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Permisos Asignados</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <div class="card-body">
                                @if($role->permissions)
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Permisos
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($role->permissions as $role_permission)
                                            <tr>
                                                <td class="ps-4">
                                                    <p class="text-xs font-weight-bold mb-0">{{$role_permission->name}}</p>
                                                </td>
                                                <td class="ps-4 text-center">
                                                    <form
                                                        method="POST"
                                                        action="{{route('admin.roles.permissions.deletePermission', [$role->id, $role_permission->id])}}"
                                                        onsubmit="return confirm('Are you sure....?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="cursor-pointer fas fa-trash text-secondary"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.roles.permissions', $role->id)}}">
                                    @csrf
                                    <div class="input-group input-group-static mb-4">
                                        <label for="permission" class="ms-0">Permisos</label>
                                        <select class="form-control" id="permission" name="permission" autocomplete="permission-name">
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission->name}}">{{$permission->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0">ASIGNAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
