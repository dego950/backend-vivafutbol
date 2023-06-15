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
                                <h5 class="mb-0">Todos los roles</h5>
                            </div>
                            <a href="{{route('admin.roles.create')}}" class="btn btn-outline-primary btn-sm mb-0" type="button">+&nbsp; New Rol</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{$role->id}}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$role->name}}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$role->created_at}}</p>
                                        </td>
                                        <td class="text-center">
                                            <table style="border: hidden" align="center">
                                                <tbody style="border: hidden">
                                                <tr style="border: hidden">
                                                    <td style="border: hidden"></td>
                                                    <td style="border: hidden"></td>
                                                    <td style="border: hidden"></td>
                                                </tr>
                                                <td style="border: hidden">
                                                    <a href="{{route('admin.roles.edit', $role->id)}}" class="mx-0" data-bs-toggle="tooltip"
                                                       data-bs-original-title="Edit user">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                </td>
                                                <td style="border: hidden" colspan="5" >
                                                </td>
                                                <td style="border: hidden">
                                                    <form
                                                        method="POST"
                                                        action="{{route('admin.roles.destroy', $role->id)}}"
                                                        onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="cursor-pointer fas fa-trash text-secondary"></button>
                                                    </form>
                                                </td>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
