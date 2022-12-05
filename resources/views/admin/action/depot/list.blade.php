@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Kho
        <small>Danh sách</small>
    </h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên kho</th>    
                    <th>Thêm</th>               
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($depots as $depot)
                    
                <tr class="odd gradeX" align="center">
                    <td>{{ $depot->id }}</td>
                    <td>{{ $depot->name }}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.action.depot.create', $depot->id) }}">Thêm</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.action.depot.edit', $depot->id) }}">Sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.action.depot.delete', $depot->id) }}"> Xóa</a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    
</div>

@endsection