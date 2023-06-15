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
                                <h5 class="mb-0">Registrar Permiso</h5>
                            </div>
                            <a href="{{route('admin.permissions.index')}}" class="btn btn-outline-primary btn-sm mb-0" type="button">+&nbsp; Index</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.permissions.update', $permission)}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group input-group-outline mb-3">
                                        <!--<label class="form-label">Name</label>-->
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="{{$permission->name}}"
                                        >
                                    </div>
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0">ACTUALIZAR</button>
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
