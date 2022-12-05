@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    {{-- <h1 class="page-header">Thiết bị
        <small>Danh sách</small>
    </h1> --}}
    <div>
        <h2 class="page-header">Danh sách thiết bị phòng: <u>{{$department->name}}</u></h2>  
        <h6>Số lượng: {{$devices->count()}}</h6>
    </div>
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
                    <th>Trả về kho</th>
                    <th>Báo hỏng</th>
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
                    <td class="center"><a href="{{ route('admin.action.department.deleteDevice', $device->id) }}"><i class="icon-copy bi bi-box-arrow-in-right"></i></a></td>
                    <td class="center"><a href=""><i class="icon-copy bi bi-tools"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table> 
</div>
@endsection