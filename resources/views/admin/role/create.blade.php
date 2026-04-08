@extends('admin.layout')
@section('title', 'Thêm mới quyền')
@section('content')

<div class="card mb-3">
    <div class="card-body">
        <a type="button" class="btn btn-primary" href="{{ route('admin.role.index') }}">
            <i class="ti ti-list me-2"></i>Danh sách
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.role.store') }}" method="post" enctype="multipart/form-data">
            
            @csrf
            <h5>
                @if(request('id')) 
                    Cập nhật
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ request('id') }}">
                @else
                    Thêm mới
                @endif
            </h5>   

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group mb-2">
                        <label class="form-label">Tên quyền</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên quyền" required="" autofocus="" value="{{ !empty($role->name) ? $role->name : old('name') }}">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label">Mô tả</label>
                        <input type="text" class="form-control" name="description" placeholder="Mô tả" autofocus="" value="{{ !empty($role->description) ? $role->description : old('description') }}">
                    </div>

                    <?php vdh_input_status(!empty($role->status) ? $role->status : old('status')) ?>
                </div>
                <div class="col-md-8">

                    <div class="form-group list_permission mb-5">
                        
                        @if(!empty($role->permission))
                            @php $permissionList = explode(';', $role->permission) @endphp
                        @endif
                        
                        <select name="permission[]" multiple class="multi-select multi-select-group" required="">

                            <optgroup label="Chọn tất cả"> 
                                @if(!empty($permissions))
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission }}" {{ !empty($permissionList) && in_array($permission, $permissionList) ? 'selected' : '' }}>{{ $permission }}</option>
                                    @endforeach
                                @endif 
                            </optgroup>
                            
                        </select>

                    </div>
                       
                </div>

            </div>

            {{ vdh_button_form() }}
        </form>
    </div>
</div>
@endsection