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
                                <h5 class="mb-0">Información de Usuario</h5>
                            </div>
                            <a href="{{route('admin.users.index')}}" class="btn btn-outline-primary btn-sm mb-0" type="button">+&nbsp; Index Rol</a>
                        </div>
                    </div>

                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Nombre: {{$user->name}}</h5>
                                <h5 class="mb-0">Correo: {{$user->email}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <div class="card-body">
                                @if($user->roles)
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Roles asignados
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->roles as $user_role)
                                            <tr>
                                                <td class="ps-4">
                                                    <p class="text-xs font-weight-bold mb-0">{{$user_role->name}}</p>
                                                </td>
                                                <td class="ps-4 text-center">
                                                    <form
                                                        method="POST"
                                                        action="{{route('admin.users.roles.remove', [$user->id, $user_role->id])}}"
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
                                <form method="POST" action="{{route('admin.users.roles', $user->id)}}">
                                    @csrf
                                    <div class="input-group input-group-static mb-4">
                                        <label for="permission" class="ms-0">Asignar rol</label>
                                        <select class="form-control" id="role" name="role" autocomplete="role-name">
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0">ASIGNAR</button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive">
                                    <div class="card-body">
                                        @if ($user->permissions)
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Permisos asignados
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->permissions as $user_permission)
                                                    <tr>
                                                        <td class="ps-4">
                                                            <p class="text-xs font-weight-bold mb-0">{{$user_permission->name}}</p>
                                                        </td>
                                                        <td class="ps-4 text-center">
                                                            <form
                                                                method="POST"
                                                                action="{{route('admin.users.permissions.revoke', [$user->id, $user_permission->id])}}"
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
                                        <form method="POST" action="{{route('admin.users.permissions', $user->id)}}">
                                            @csrf
                                            <div class="input-group input-group-static mb-4">
                                                <label for="permission" class="ms-0">Asignar Permisos</label>
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
        </div>
    </div>

</x-app-layout>
