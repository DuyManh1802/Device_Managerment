@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Danh sách thiết bị đã sửa xong</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Cấu hình</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $key => $device)
                {{-- @dd($device) --}}
                <tr class="odd gradeX" align="center">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $device->name }}</td>
                    {{-- @dd($device); --}}
                    <td><img src="{{url('public/image/device')}}/{{ $device->image }}" alt="{{ $device->image }}"></td>
                    {{-- {{url('public/frontend')}}/img/product/{{$value['image']}} --}}
                    <td>{{ $device->configuration }}</td>


                </tr>
                @endforeach

            </tbody>
        </table>

</div>

@endsection
