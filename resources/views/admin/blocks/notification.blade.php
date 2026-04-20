@if (count($errors) > 0)
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        {{ session('success') }}
    </div>
@endif

<style>
    .list-group {
        list-style-type: none;
    }
</style>

@push('scripts')
<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            notify('Có lỗi xảy ra', '{{ $error }}', 'error')
        @endforeach
    @endif
    
    @if(session('success'))
        notify('Thành công', '{{ session('success') }}')
    @endif
</script>
@endpush