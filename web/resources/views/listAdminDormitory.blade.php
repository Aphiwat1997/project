{{-- @extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="left">
        <h2 class="text-center ml-4 mt-2">ข้อมูลสมาชิก</h2>
      </div>
      <div class="text-right">
        <a href="dormitory/create" class=" btn btn-success mb-3 fa fa-plus-square"> เพิ่มหอพัก</a>
      </div>
    </div>
  </div>
  <table class="table table-bordered">
    <tr style="color:whitesmoke" class="bg-info">
      <th >ชื่อหอพัก</th>
      <th>ประเภทหอพัก</th>
      <th>ที่อยู่</th>
      <th>จัดการ</th>
    </tr>
    @foreach ($dormitorys as $dormitory)
      <tr>
        <td style="width: 17%"> {{ $dormitory->name_dormitory }} </td>
        <td style="width: 17%">{{ $dormitory->type_dormitory }}</td>
        <td style="width: 44%">
          {{ $dormitory->layktee_dormitory.' '.$dormitory->tanon_dormitory.' '.$dormitory->soi_dormitory.' '.$dormitory->home_dormitory.' '.$dormitory->tambon_dormitory.' '.$dormitory->amphoe_dormitory.' '.$dormitory->changwat_dormitory.' '.$dormitory->postalcode_dormitory}}
        </td>
        <td style="width: 22%">
          <form class="form-inline" action="/dormitory/{{ $dormitory->id }}" method="POST">
            <a href="dormitory/{{ $dormitory->id }}"  class="btn btn-warning mr-1 fa fa-eye text-black"> ดู</a>
            <a href="dormitory/{{ $dormitory->id }}/edit" class="btn btn-info mr-1 fa fa-pencil-square-o"> แก้ไข</a>
            @csrf
            @method('DELETE')
            <button type="sumbit" class="btn btn-danger fa fa-trash"> ลบ</button>
          </form>
        </td>
      </tr>
   
    @endforeach
  </table>
@endsection --}}