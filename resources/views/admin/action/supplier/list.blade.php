@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Nhà cung cấp
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
                    <th>Tên nhà cung cấp</th>
                    <th>Thêm</th>                   
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    
                <tr class="odd gradeX" align="center">
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>                   
                    <td class="center"><i class="icon-copy bi bi-plus-square"></i> <a href="{{ route('admin.action.supplier.delete', $supplier->id) }}">Thêm</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.action.supplier.edit', $supplier->id) }}">Sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.action.supplier.delete', $supplier->id) }}"> Xóa</a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    
</div>

@endsection