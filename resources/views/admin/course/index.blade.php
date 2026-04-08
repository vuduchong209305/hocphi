@extends('admin.layout')
@section('title', 'Danh sách')
@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('course.index') }}">
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <div class="input-wrapper input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" name="q" value="{{ request('q') }}">
                            <button class="btn btn-success" type="submit"><i class="ti ti-search"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

<div class="row">
 
    <div class="col-md-3">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <h4>
                        @if(request('id')) 
                            Cập nhật

                            @method('PUT')
                            <input type="hidden" name="id" value="{{ request('id') }}">
                        @else
                            Thêm mới
                        @endif
                    </h4>
                        
                    <div class="form-group mb-3">
                        <label class="form-label" for="title">Tên <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tên *" required="" autofocus="" value="{{ !empty($course->title) ? $course->title : old('title') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="price">Giá </label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Giá"  autofocus="" value="{{ !empty($course->price) ? $course->price : old('price') }}">
                    </div>

                    <?php vdh_input_status(!empty($course->status) ? $course->status : old('status')) ?>
                    <?php vdh_button_form() ?>

                </form>

            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">

            <div class="card-body">

                <div class="text-end">
                    <a type="button" class="btn btn-outline-danger btn-sm mb-3 btn_del_multi" href="javascript:;">
                        <i class="ti ti-trash"></i>&nbsp;Xoá
                    </a>
                    <input type="hidden" id="url" value="{{ route('course.delete') }}" >
                </div>

                <table class="table table-hover table-vcenter table-bordered table-striped" id="datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">
                                <input type="checkbox" class="form-check-input checkall">
                            </th>
                            <th width="5%">STT</th>
                            <th width="55%">Tên</th>
                            <th width="15%">Giá</th>
                            <th width="10%">Trạng thái</th>
                            <th width="10%">#</th>
                        </tr>
                    </thead>
                    <tbody class="sortable-wrapper">
                        @if(isset($data) && count($data) > 0) 
                        @foreach($data as $key => $val)
                        <tr data-id="{{ $val->id }}">
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input checkbox_id" value="{{ $val->id ?? null }}">
                            </td>
                            <td class="text-center">
                                <span class="drag-handle me-2" style="cursor: move">☰</span>
                            </td>
                            <td>
                                {{ $val->title ?? null }}
                            </td>
                            <td>
                                {{ $val->price ?? null }}
                            </td>
                            <td>
                                {!! vdh_status($val->status) !!}
                            </td>
                            <td>
                                {{ vdh_label_button(route('course.index', ['id' => $val->id]), route('course.delete', ['id' => $val->id])) }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        new Sortable(document.querySelector('.sortable-wrapper'), {
            animation: 150,
            handle: '.drag-handle',
            onEnd: function () {
                updateOrder();
            }
        });

        function updateOrder() {
            let orders = [];

            document.querySelectorAll('.sortable-wrapper tr').forEach((tr, index) => {
                orders.push({
                    id: tr.dataset.id,
                    sort: index + 1
                });
            });

            $.ajax({
                url: "{{ route('course.sort') }}",
                method: "POST",
                data: { orders },
                success(res) {
                    if(res.status) {
                        notify('Thành công', res.message)
                    }
                },
                error(err) {
                    notify('Có lỗi xảy ra', err.message, 'error')
                }
            })
        }
    });
</script>
@endpush

@endsection