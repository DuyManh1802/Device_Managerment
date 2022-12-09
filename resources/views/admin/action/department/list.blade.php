@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Phòng ban
    </h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.action.department.create') }}">
        <button type="submit" class="btn btn-dark">Thêm</button>
    </a>
        <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên phòng ban</th>
                    <th>Người quản lý</th>
                    <th>Địa chỉ phòng ban</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)

                <tr class="odd gradeX" align="center">
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->manager }}</td>
                    <td>{{ $department->address}}</td>
                    {{-- <td class="center"><i class="icon-copy bi bi-plus-square"></i>  <a href="{{ route('admin.action.department.get.add.device', ['id' => $department->id]) }}">Thêm thiết bị</a></td>                  --}}
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.action.department.edit', $department->id) }}">Sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.action.department.delete', $department->id) }}">Xóa</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>

</div>

@endsection
