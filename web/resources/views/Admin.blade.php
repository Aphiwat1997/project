@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="left">
        <h2 class="text-center ml-4 mt-2">ผู้ดูแลระบบ</h2>
      </div>
    </div>
  </div>
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ผู้ประกอบการ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ผู้ใช้ทั่วไป</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <table class="table table-bordered">
        <tr style="color:whitesmoke" class="bg-info">
          <th>ชื่อผู้ดูแล</th>
          <th>ชื่อหอพัก</th>
          <th>เบอร์โทรศัพท์</th>
          <th>จัดการ</th>
        </tr>
        <tr>
          <td style="width: 17%">supawadee</td>
          <td style="width: 30%">มานอนนี่</td>
          <td style="width: 20%">0830239919</td>
          <td style="width: 15%">
            <form class="form-inline mx-3" action="" method="POST">
              <a href=""  class="btn btn-warning mr-2 fa fa-eye text-black"> ดู</a>
              @csrf
              @method('DELETE')
              <button type="sumbit" class="btn btn-danger fa fa-trash"> ลบ</button>
            </form>
          </td>
        </tr>
      </table>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <table class="table table-bordered">
        <tr style="color:whitesmoke" class="bg-info">
          <th >ชื่อ</th>
          <th>อีเมล</th>
          <th>จัดการ</th>
        </tr>
        <tr>
          <td style="width: 17%">supawadee</td>
          <td style="width: 35%">supawadee92917@gmail.com</td>
          <td style="width: 15%">
            <form class="form-inline mx-3" action="" method="POST">
              <a href=""  class="btn btn-warning mr-2 fa fa-eye text-black"> ดู</a>
              @csrf
              @method('DELETE')
              <button type="sumbit" class="btn btn-danger fa fa-trash"> ลบ</button>
            </form>
          </td>
      </table>
    </div>
  </div>
</div>
@endsection