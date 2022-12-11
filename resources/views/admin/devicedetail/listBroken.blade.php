@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Danh sách thiết bị hỏng</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        @php
         $id = App\Models\devicedetail::all();

        @endphp
        <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Cấu hình</th>
                    <th>Phòng báo hỏng</th>
                    <th>Ngày hỏng</th>
                    <th>Đã sửa xong</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $key => $device)
                {{-- @dd($device) --}}
                <tr class="odd gradeX" align="center">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $device->name }}</td>
                    <td>{{ $device->image }}</td>
                    <td>{{ $device->configuration }}</td>
                    <td>{{ $device->name }}</td>
                    <td>{{ $device->updated_at }}</td>
                    {{-- @dd($device) --}}
                    <td class="center"><a href="{{ route('admin.devicedetail.fixed') }}"> <i class="fa fa-trash-o  fa-fw"></i></a></td>

                </tr>
                @endforeach

            </tbody>
        </table>

</div>

@endsection
