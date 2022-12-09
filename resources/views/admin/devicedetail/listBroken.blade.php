@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Danh sách thiết bị hỏng</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Danh mục</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Cấu hình</th>
                    <th>Ngày hỏng</th>
                    <th>Đã sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $key => $device)

                <tr class="odd gradeX" align="center">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $device->category->name }}</td>
                    <td>{{ $device->name }}</td>
                    <td><img src="{{ $device->imageUrl() }}" alt="" width="50px" height="auto"></td>
                    <td>{{ $device->configuration }}</td>
                    <td></td>
                    <td class="center"><a href="{{ route('admin.device.fix') }}"> <i class="fa fa-trash-o  fa-fw"></i></a></td>

                </tr>
                @endforeach

            </tbody>
        </table>

</div>

@endsection
