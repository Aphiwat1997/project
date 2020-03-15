@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-7">
      <div class="card">
          <div class="card-body">
            <div class="form-group ">
                <button id="setMakker" class="btn btn-sm btn-primary d-none"><i class="fa fa-street-view " aria-hidden="true"></i> กดเพื่อค้นหาตำแหน่ง</button>
                <div id="map" class="w-100 mt-3" style="height: 250px;"></div>
            </div>
              <form method="POST" action="/dormitory" enctype="multipart/form-data">
                @csrf

                  <input type="hidden" name="role" value="user" />
                  <input type="hidden" name="lat" id="lat" />
                  <input type="hidden" name="lng" id="lng" />
                  <div class="form-group row">
                    <table class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ชื่อที่พัก</th>
                                <th>ที่อยู่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold"> <label style="font-size: 18px;color:gray ">{{ $dormitory->name_dormitory }}</label></td>
                                <td class="font-weight-bold">
                                    <label style="font-size: 18px;color:gray"> {{ $dormitory->layktee_dormitory }} </label>
                                    <label style="font-size: 18px;color:gray"> {{ $dormitory->tanon_dormitory }} </label>
                                    <label style="font-size: 18px;color:gray"> {{ $dormitory->soi_dormitory }} </label>
                                    <label style="font-size: 18px;color:gray"> บ้าน{{ $dormitory->home_dormitory }} </label>
                                    <label style="font-size: 18px;color:gray"> ตำบล{{ $dormitory->tambon_dormitory }} </label>
                                    <label style="font-size: 18px;color:gray"> อำเภอ{{ $dormitory->amphoe_dormitory }} </label>
                                    <label style="font-size: 18px;color:gray"> จังหวัด{{ $dormitory->changwat_dormitory }} </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-md-4 ml-3">
                        <i style="font-size: 20px" class="fa fa-volume-control-phone mr-1" aria-hidden="true"></i>
                        <label class="font-weight-bold" style="font-size: 20px;color:green"> {{ $dormitory->admin_phone }} </label>
                    </div>
                    <div class="col-md-6">
                        <label style="font-size: 18px">ค่าเช่า : </label>
                        <label class="font-weight-bold" style="font-size: 20px;color:red"> {{ $dormitory->rent_dormitory }} </label>
                        <label class="ml-2" style="font-size: 15px">บาท/เดือน</label>
                        {{-- <span class="badge badge-danger"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;โปรโมชั่น</span> --}}
                        @if ($dormitory->type_select_Promotion == 1)
                            <span class="badge badge-danger"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;โปรโมชั่น</span>
                        @elseif($dormitory->type_select_Promotion == 2)
                            {{-- <span class="badge badge-danger"><i class="fa fa-window-close-o" aria-hidden="true"></i>&nbsp;ไม่ห้องว่าง</span> --}}
                        @endif
                    </div>
                  </div>
                  <div id="carouselExampleControls" class="carousel slide mt-3 " data-ride="carousel">
                    <div class="carousel-inner">
                      @foreach ($pictures as $index => $picture)
                        <div class="{{ $index == 0 ? 'carousel-item active' : 'carousel-item' }}">
                            <img src="{{ '/uploads/images/dormitory/'.$picture->path }}" class="d-block w-100" alt="...">
                        </div>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                        <style>
                            .upload-btn-wrapper {
                            position: relative;
                            overflow: hidden;
                            display: inline-block;
                            cursor: pointer;
                            }

                            .btn-img {
                            border: 2px solid gray;
                            color: gray;
                            background-color: white;
                            padding: 8px 20px;
                            border-radius: 8px;
                            font-size: 16px;
                            font-weight: bold;
                            cursor: pointer;
                            }

                            .upload-btn-wrapper input[type=file] {
                            font-size: 100px;
                            position: absolute;
                            left: 0;
                            top: 0;
                            opacity: 0;
                            cursor: pointer;
                            }
                        </style>
                        {{-- <input type="file" name="file_img" id="img_file_upid"> --}}
                        <input type="file" name="files_img[]" id="img_files_upid" multiple style="display: none;">
                    </div>
                    
                    </div><br>
                    <div class="form-group">
                        <div class="card-body" style="font-size:26px;color:gray">ประเภทห้องและค่าเช่า</div>
                        <table class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ประเภทหอพัก</th>
                                    <th>ประเภทห้อง</th>
                                    <th>เช่ารายเดือน</th>
                                    <th>ห้องว่าง</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold" style="color:gray">{{ $dormitory->type_dormitory }}</td>
                                    <td class="font-weight-bold" style="color:gray">{{ $dormitory->typeroom_dormitory }}</td>
                                    <td class="font-weight-bold" style="color:gray">{{ $dormitory->rent_dormitory }}</td>
                                    <td>
                                        @if ($dormitory->type_select_room == 1)
                                            <i style="font-size: 25px" class="text-success fa fa-check-circle" aria-hidden="true"></i>
                                        @elseif($dormitory->type_select_room == 2)
                                            <i style="font-size: 25px" class="text-danger fa fa-times-circle" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group"> 
                        <div class="card-body" style="font-size:26px;color:gray">ค่าใช้จ่ายเพิ่มเติม</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="font-weight-bold ml-1 w-100"><i class="fa fa-tint" aria-hidden="true"></i> ค่าน้ำ : </h6>
                                    </div>
                                    <div class="co-md-4 ">
                                        @if ($dormitory->type_select_water == 1)
                                            {{ $dormitory->text_unit_water }}
                                        @elseif($dormitory->type_select_water == 2)
                                            {{ $dormitory->text_people_water}}
                                        @elseif($dormitory->type_select_water == 3)
                                            {{ $dormitory->text_room_water}}
                                        @elseif($dormitory->type_select_water == 4)
                                            ตามมิเตอร์การประปา
                                        @elseif($dormitory->type_select_water == 5)
                                            รวมในค่าห้องแล้ว
                                        @elseif($dormitory->type_select_water == 6)
                                            โทรสอบถาม
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="font-weight-bold ml-1 w-100"><i class="fa fa-bolt" aria-hidden="true"></i> ค่าไฟ : </h6>
                                    </div>
                                    <div class="co-md-4 ">
                                        @if ($dormitory->type_select_fire == 1)
                                            {{ $dormitory->text_unit_fire }}
                                        @elseif($dormitory->type_select_fire == 2)
                                            ตามมิเตอร์การไฟฟ้า
                                        @elseif($dormitory->type_select_water == 3)
                                            รวมในค่าห้องแล้ว
                                        @elseif($dormitory->type_select_water == 4)
                                            โทรสอบถาม
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold ml-1 w-100"><i class="fa fa-building" aria-hidden="true"></i> เงินมัดจำ/ประกัน : </h6>
                                    </div>
                                    <div class="co-md-5  ">
                                        @if ($dormitory->type_select_money == 1)
                                            {{ $dormitory->text_month_money }}
                                        @elseif($dormitory->type_select_money == 2)
                                            {{ $dormitory->text_number_money}}
                                        @elseif($dormitory->type_select_money == 3)
                                            ไม่มีเงินประกัน
                                        @elseif($dormitory->type_select_money == 4)
                                            โทรสอบถาม
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="font-weight-bold ml-1 w-100"><i class="fa fa-credit-card" aria-hidden="true"></i> จ่ายล่วงหน้า : </h6>
                                    </div>
                                    <div class="co-md-4 ">
                                        @if ($dormitory->type_select_deposit == 1)
                                            {{ $dormitory->text_month_deposit }}
                                        @elseif($dormitory->type_select_deposit == 2)
                                            {{ $dormitory->text_number_deposit}}
                                        @elseif($dormitory->type_select_deposit == 3)
                                            ไม่ต้องจ่ายล่วงหน้า
                                        @elseif($dormitory->type_select_deposit == 4)
                                            โทรสอบถาม
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="font-weight-bold ml-1 w-100 "><i class="fa fa-wifi" aria-hidden="true"></i>  ค่าอินเตอร์เน็ต : </h6>
                                    </div>
                                    <div class="co-md-4 ">
                                        @if ($dormitory->type_select_internet == 1)
                                            {{ $dormitory->text_number_internet.' บาท '.$dormitory->text_specify_usage_internet }}
                                        @elseif($dormitory->type_select_internet == 2)
                                            ฟรี
                                        @elseif($dormitory->type_select_internet == 3)
                                            ไม่มีอินเตอร์เน็ต
                                        @elseif($dormitory->type_select_internet == 4)
                                            โทรสอบถาม
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group"> 
                        <div class="card-body" style="font-size:26px;color:gray">ค่าใช้จ่ายเพิ่มเติม</div>
                        <div class="container">
                            <h6 class="ml-1 w-100"><i class="fa fa-tint" aria-hidden="true"></i> ค่าน้ำ</h6> 
                                <div class="row water-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input disabled class="water-price-select" id="unit_water" name="typewater" type="radio" value="1" {{ $dormitory->type_select_water == 1 ? 'checked' : '' }}>
                                            <span class="water-price-label" style="">ตามยูนิตที่ใช้</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <label > {{ $dormitory->text_unit_water }} </label><br>
                                            <span class="water-price-unit">บาทต่อยูนิต</span>
                                        </div>
                                </div>
                                <div class="row water-price-row ml-3">
                                        <div class="label-price col-md-4 ">
                                            <input disabled class="water-price-select" id="Pay_people_water" name="typewater" type="radio" value="2" {{ $dormitory->type_select_water == 2 ? 'checked' : '' }}>
                                            <span class="water-price-label" style="">เหมาจ่าย</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <label > {{ $dormitory->text_people_water }} </label><br>
                                            <span class="water-price-unit">บาทต่อคน/เดือน</span>
                                        </div>
                                </div>
                                <div class="row water-price-row ml-3">
                                        <div class="label-price col-md-4 ">
                                            <input disabled class="water-price-select" id="Pay_room_water" name="typewater" type="radio" value="3" {{ $dormitory->type_select_water == 3 ? 'checked' : '' }} >
                                            <span class="water-price-label" style="">เหมาจ่าย</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <label > {{ $dormitory->text_room_water }} </label><br>
                                            <span class="water-price-unit">บาทต่อห้อง/เดือน</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="water-price-select" id="plumbing_water" name="typewater" type="radio" value="4" {{ $dormitory->type_select_water == 4 ? 'checked' : '' }}>
                                                <span class="water-price-label" style="">ตามมิเตอร์การประปา</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="water-price-select" id="feeroom_water" name="typewater" type="radio" value="5" {{ $dormitory->type_select_water == 5 ? 'checked' : '' }}>
                                                <span class="water-price-label" style="">รวมในค่าห้องแล้ว</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="water-price-select" id="phone_water" name="typewater" type="radio" value="6" {{ $dormitory->type_select_water == 6 ? 'checked' : '' }}>
                                                <span class="water-price-label" style=""> โทรสอบถาม
                                                    </span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <span style="width: 200px;">*หมายเหตุ: สำหรับค่าน้ำ</span>
                                        </div>
                                        <div class="input-price col-md-11 mt-2">
                                            <label > {{ $dormitory->text_note_water }} </label>
                                        </div>
                                </div>
                                <h6 class="ml-1 w-100 mt-2"><i class="fa fa-bolt" aria-hidden="true"></i> ค่าไฟ</h6> 
                                <div class="row fire-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input disabled class="fire-price-select" id="unit_fire" name="typefire" type="radio" value="1" {{ $dormitory->type_select_fire == 1 ? 'checked' : '' }}>
                                            <span class="fire-price-label" style="">ตามยูนิตที่ใช้</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <label > {{ $dormitory->text_unit_fire }} </label><br>
                                            <span class="fire-price-unit">บาทต่อยูนิต</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="fire-price-select" id="plumbing_fire" name="typefire" type="radio" value="2" {{ $dormitory->type_select_fire == 2 ? 'checked' : '' }}>
                                                <span class="fire-price-label" style="">ตามมิเตอร์การไฟฟ้า</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="fire-price-select" id="feeroom_fire" name="typefire" type="radio" value="3" {{ $dormitory->type_select_fire == 3 ? 'checked' : '' }}>
                                                <span class="fire-price-label" style="">รวมในค่าห้องแล้ว</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="fire-price-select" id="phone_fire" name="typefire" type="radio" value="4" {{ $dormitory->type_select_fire == 4 ? 'checked' : '' }}>
                                                <span class="fire-price-label" style=""> โทรสอบถาม
                                                    </span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <span style="width: 200px;">*หมายเหตุ: สำหรับค่าไฟฟ้า</span>
                                        </div>
                                        <div class="input-price col-md-11 mt-2">
                                            <label > {{ $dormitory->text_note_fire }} </label>
                                        </div>
                                </div>
                                <h6 class="ml-1 w-100 mt-2"><i class="fa fa-building" aria-hidden="true"></i> เงินมัดจำ/ประกัน</h6> 
                                <div class="row money-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input disabled class="money-price-select" id="month_money" name="typemoney" type="radio" value="1" {{ $dormitory->type_select_money == 1 ? 'checked' : '' }}>
                                            <span class="money-price-label" style="">ระบุเป็นเดือน</span>
                                        </div>
                                        <div class="input-money col-md-5">
                                        <label > {{$dormitory->text_month_money}} </label>
                                        </div>
                                        <div class="label-price col-md-4">
                                                <input disabled class="money-price-select" id="number_money" name="typemoney" type="radio" value="2" {{ $dormitory->type_select_money == 2 ? 'checked' : '' }}>
                                                <span class="moneymoney-price-label" style="">ระบุจำนวนเงิน</span>
                                            </div>
                                            <div class="input-price col-md-5 mt-3">
                                                <label > {{ $dormitory->text_number_money }} </label>
                                                <span class="money-price-unit">บาท</span>
                                            </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="money-price-select" id="insurance_money" name="typemoney" type="radio" value="3" {{ $dormitory->type_select_money == 3 ? 'checked' : '' }}>
                                                <span class="money-price-label" style="">ไม่มีเงินประกัน</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input disabled class="money-price-select" id="phone_money" name="typemoney" type="radio" value="4" {{ $dormitory->type_select_money == 4 ? 'checked' : '' }}>
                                                <span class="money-price-label" style=""> โทรสอบถาม
                                                    </span>
                                        </div>
                                        <div class="label-price col-md-6 mt-2">
                                                <span style="width: 200px;">*หมายเหตุ: เงินมัดจำ/ประกัน</span>
                                        </div>
                                        <div class="input-price col-md-11 mt-2">
                                            <label > {{ $dormitory->text_note_money }} </label>
                                        </div>
                                </div>
                                <h6 class="ml-1 w-100 mt-2"><i class="fa fa-credit-card" aria-hidden="true"></i> จ่ายล่วงหน้า</h6> 
                                <div class="row deposit-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input disabled class="deposit-price-select" id="month_deposit" name="typedeposit" type="radio" value="1" {{ $dormitory->type_select_deposit == 1 ? 'checked' : '' }}>
                                            <span class="deposit-price-label" style="">ระบุเป็นเดือน</span>
                                        </div>
                                        <div class="input-deposit col-md-5">
                                                <label >{{ $dormitory->text_month_deposit }}</label>
                                        </div>
                                        <div class="label-price col-md-4">
                                                <input disabled class="deposit-price-select" id="number_deposit" name="typedeposit" type="radio" value="2" {{ $dormitory->type_select_deposit == 2 ? 'checked' : '' }}>
                                                <span class="deposit-price-label" style="">ระบุจำนวนเงิน</span>
                                            </div>
                                            <div class="input-price col-md-5 mt-3">
                                                <label > {{ $dormitory->text_number_deposit }} </label>
                                                <span class="deposit-price-unit">บาท</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input disabled class="deposit-price-select" id="prepay_deposit" name="typedeposit" type="radio" value="3" {{ $dormitory->type_select_deposit == 3 ? 'checked' : '' }}>
                                                    <span class="deposit-price-label" style="">ไม่ต้องจ่ายล่วงหน้า</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input disabled class="deposit-price-select" id="phone_deposit" name="typedeposit" type="radio" value="4" {{ $dormitory->type_select_deposit == 4 ? 'checked' : '' }}>
                                                    <span class="deposit-price-label" style=""> โทรสอบถาม
                                                        </span>
                                            </div>
                                            <div class="label-price col-md-6 mt-2">
                                                    <span style="width: 200px;">*หมายเหตุ: จ่ายล่วงหน้า</span>
                                            </div>
                                            <div class="input-price col-md-11 mt-2">
                                                <label > {{ $dormitory->text_note_deposit }} </label>
                                            </div>
                                            <h6 class="ml-1 w-100 mt-2"><i class="fa fa-wifi" aria-hidden="true"></i>  ค่าอินเตอร์เน็ต</h6> 
                                <div class="row internet-price-row ml-3">
                                        <div class="label-price col-md-4">
                                                <input disabled class="internet-price-select" id="number_internet" name="typeinternet" type="radio" value="1" {{ $dormitory->type_select_internet == 1 ? 'checked' : '' }}>
                                                <span class="internet-price-label" style="">ระบุจำนวนเงิน</span>
                                            </div>
                                            <div class="input-price col-md-3 mt-3">
                                                <label > {{ $dormitory->text_number_internet }} </label>
                                                <span class="internet-price-unit">บาทต่อ</span>
                                            </div>
                                            <div class="input-internet-price col-md-4 mt-3">
                                                    <label >{{$dormitory->text_specify_usage_internet}} </label>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input disabled class="internet-price-select" id="free_internet" name="typeinternet" type="radio" value="2" {{ $dormitory->type_select_internet == 2 ? 'checked' : '' }}>
                                                    <span class="internet-price-label" style="">ฟรี</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input disabled class="internet-price-select" id="no_internet" name="typeinternet" type="radio" value="3" {{ $dormitory->type_select_internet == 3 ? 'checked' : '' }}>
                                                    <span class="internet-price-label" style="">ไม่มีอินเตอร์เน็ต</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input disabled class="internet-price-select" id="phone_internet" name="typeinternet" type="radio" value="4" {{ $dormitory->type_select_internet == 4 ? 'checked' : '' }}>
                                                    <span class="internet-price-label" style=""> โทรสอบถาม
                                                        </span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <span style="width: 200px;">*หมายเหตุ: อินเตอร์เน็ต</span>
                                            </div>
                                            <div class="input-price col-md-11 mt-2">
                                                    <label > {{ $dormitory->text_note_internet }} </label>
                                            </div>
                       
                    </div> --}}
                    <div class="form-group"> 
                        <div class="card-body" style="font-size:26px;color:gray">สิ่งอำนวยความสะดวก</div>
                        <div class="row">
                            <div class="col-md-6">
                                    <h6 class="material-icons"><img src="{{ asset('icons/door.svg')}}" alt="" style="width:20px;" class="mr-2"> ภายในห้องพัก</h6>
                                    <div class="d-flex align-items-center">
                                        @if ($dormitory->tv)
                                        <img src="{{ asset('icons/tv1.svg')}}" alt="" style="width:20px;" class="mr-2"> ทีวี  
                                        @endif 
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->meat_safe)
                                        <img src="{{ asset('icons/Refrigerator.svg')}}" alt="" style="width:20px;" class="mr-2"> ตู้เย็น
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->fan)
                                        <img src="{{ asset('icons/fan.svg')}}" alt="" style="width:20px;" class="mr-2"> พัดลม
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->air)
                                        <img src="{{ asset('icons/air.svg')}}" alt="" style="width:20px;" class="mr-2"> เครื่องปรับอากาศ
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->wifi_dormitory)
                                        <img src="{{ asset('icons/wifi1.svg')}}" alt="" style="width:20px;" class="mr-2"> อินเตอร์เน็ตไร้สาย(Wi-Fi)
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->washer)
                                        <img src="{{ asset('icons/Washing.svg')}}" alt="" style="width:20px;" class="mr-2"> เครื่องซักผ้า
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->wardrobe)
                                        <img src="{{ asset('icons/wardrobe.svg')}}" alt="" style="width:20px;" class="mr-2"> ตู้เสื้อผ้า
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->bad)
                                        <img src="{{ asset('icons/bed.svg')}}" alt="" style="width:20px;" class="mr-2"> เตียงนอน
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Cooker_hood)
                                        <img src="{{ asset('icons/hood.svg')}}" alt="" style="width:20px;" class="mr-2"> เครื่องดูดควัน
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->waterhot)
                                        <img src="{{ asset('icons/water-heater.svg')}}" alt="" style="width:20px;" class="mr-2"> เครื่องทำน้ำอุ่น
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->cable)
                                        <img src="{{ asset('icons/radar.svg')}}" alt="" style="width:20px;" class="mr-2"> เคเบิลทีวี/ดาวเทียม
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Wash_dishes)
                                        <img src="{{ asset('icons/kitchen.svg')}}" alt="" style="width:20px;" class="mr-2"> ซิงค์ล้างจาน/อ้างล้างจาน
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->animal)
                                        <img src="{{ asset('icons/animal.svg')}}" alt="" style="width:20px;" class="mr-2"> อนุญาตให้เลี้ยงสัตว์
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Direct_phone)
                                        <img src="{{ asset('icons/vintage-phone.svg')}}" alt="" style="width:20px;" class="mr-2"> โทรศัพท์สายตรง
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->microwave)
                                        <img src="{{ asset('icons/microwave.svg')}}" alt="" style="width:20px;" class="mr-2"> ไมโครเวฟ
                                        @endif
                                     </div> 
                            </div>
                            <div class="col-md-6">
                                    <h6 class="material-icons"><img src="{{ asset('icons/building.svg')}}" alt="" style="width:20px;" class="mr-2"> ภายในอาคารที่พัก/ส่วนกลาง</h6>
                                    <div class="d-flex align-items-center">
                                        @if ($dormitory->closed_circuit_camera)
                                        <img src="{{ asset('icons/cctv.svg')}}" alt="" style="width:20px;" class="mr-2"> กล้องวงจนปิด (CCTV)
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Water_vending_machine)
                                        <img src="{{ asset('icons/water.svg')}}" alt="" style="width:20px;" class="mr-2"> ตู้น้ำหยอดเหรียญ
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->motorcycle)
                                        <img src="{{ asset('icons/transport.svg')}}" alt="" style="width:20px;" class="mr-2"> ที่จอดรถรถจักรยานยนต์
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Motor_vehicle)
                                        <img src="{{ asset('icons/car1.svg')}}" alt="" style="width:20px;" class="mr-2"> ที่จอดรถยนต์
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Safety)
                                        <img src="{{ asset('icons/Keycard.svg')}}" alt="" style="width:20px;" class="mr-2"> ระบบรักษาความปลอดภัย Keycard
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->scan)
                                        <img src="{{ asset('icons/scan.svg')}}" alt="" style="width:20px;" class="mr-2"> ระบบสแกนลายนิ้วมือ
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->wifi_external)
                                        <img src="{{ asset('icons/hotspot.svg')}}" alt="" style="width:20px;" class="mr-2"> มีอินเตอร์เน็ตภายนอกอาคาร
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->food)
                                        <img src="{{ asset('icons/food.svg')}}" alt="" style="width:20px;" class="mr-2"> ร้านอาหาร
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Seven)
                                        <img src="{{ asset('icons/store.svg')}}" alt="" style="width:20px;" class="mr-2"> ร้านสะดวกซื้อ
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Coin_laundry)
                                        <img src="{{ asset('icons/automated.svg')}}" alt="" style="width:20px;" class="mr-2"> ตู้ซักผ้าหยอดเหรียญ
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->lift)
                                        <img src="{{ asset('icons/lift.svg')}}" alt="" style="width:20px;" class="mr-2"> ลิฟท์
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->swimming_pool)
                                        <img src="{{ asset('icons/pool.svg')}}" alt="" style="width:20px;" class="mr-2"> สระว่ายน้ำ
                                        @endif
                                     </div>
                                     <div class="d-flex align-items-center">
                                        @if ($dormitory->Fitness)
                                        <img src="{{ asset('icons/Fitness.svg')}}" alt="" style="width:20px;" class="mr-2"> โรงยิม/ฟิตเนส
                                        @endif
                                     </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="card-body" style="font-size:26px;color:gray">รายละเอียดหอพัก</div>
                            <div id="show_detail"></div>
                        {{-- <textarea id="summernote" name="detail_dormitory"></textarea> --}}
                    </div>
                    <input type="hidden" >
                        <div class="more-contact" style="display: block;padding-top: 20px;">
                            <h4>ข้อมูลติดต่อเพิ่มเติม</h4>
                            
                            ผู้ดูแล : <label > {{ $dormitory->admin_name }}</label><br>
                            โทร : <label > {{ $dormitory->admin_phone }}</label><br>
                            อีเมล : <label > {{ $dormitory->admin_email }}</label> 
                        </div>
                    <div >
                    <div >
                        
                        
                    </div>
                                        {{-- <h3 class="mt-3">โปรโมชั่น</h3>
                                        <div class="col-md-12">
                                                ประเภทโปรโมชั่น
                                                <div class="controls promotion-list">
                                                    <span>
                                                        <input id="apartment_has_promotion_2" name="apartment[has_promotion]" type="radio" value="2"><label class="collection_radio_buttons" for="apartment_has_promotion_2">โปรโมชั่นสำหรับ nahmuen.in.th</label>
                                                    </span><br>
                                                    <span>
                                                        <input id="apartment_has_promotion_1" name="apartment[has_promotion]" type="radio" value="1"><label class="collection_radio_buttons" for="apartment_has_promotion_1">โปรโมชั่นทั่วไป</label>
                                                    </span><br>
                                                    <span>
                                                        <input checked="checked" id="apartment_has_promotion_0" name="apartment[has_promotion]" type="radio" value="0"><label class="collection_radio_buttons" for="apartment_has_promotion_0">ไม่มีโปรโมชั่น</label>
                                                    </span>
                                                </div>
                                        </div> --}}
                        </div>
                  {{-- <div class="text-center w-100 mt-4 mb-3">
                      <a href="/dormitory" class="btn btn-danger " style="width: 100px;">กลับ</a>
                  </div> --}}
              </form>
          </div>
        </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWuQmrf6UgrkGbMJF6-m1GwTZrazBFBo&callback=initMap" async defer></script>
<script type="text/javascript">
        var map;
        var dormitory = {!! $dormitory !!};
        var pictures = {!! $pictures !!};
        var centerPosition = { lat: dormitory.lat * 1, lng: dormitory.lng * 1 }
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: centerPosition,
                zoom: 15
            });
        }
        $(document).ready(function() {
            $('#lat').val(centerPosition.lat);
            $('#lng').val(centerPosition.lng);
            pictures.forEach(picture => {
                $('#show_images').append(
                    '<div class="col-md-3" ><img id="img_prv" style="width: 100%" src="/uploads/images/dormitory/' + picture.path + '"></div>'
                );
            });
            $('#summernote').summernote({
                placeholder: 'รายละเอียดหอพัก',
                tabsize: 1,
                height: 200
            });
            $('#summernote').summernote('code', dormitory.detail_dormitory);
            $('#show_detail').html(dormitory.detail_dormitory);

            $('#summernote').summernote('disable');

            // $('.note-codable').first().attr('name', 'detail_dormitory');

            $("#setMakker").click(function(){
                console.log("555")
            })

            var marker = new google.maps.Marker({
                position: centerPosition,
                map: map,
                draggable: false
            })

            var geocoder = new google.maps.Geocoder;

            google.maps.event.addListener(marker, 'dragend', function() {
                $('#lat').val(marker.getPosition().lat());
                $('#lng').val(marker.getPosition().lng());
                geocoder.geocode({location: { lat: marker.getPosition().lat(), lng: marker.getPosition().lng() }}, function(results, status) {
                    let res = results[0].address_components
                    console.log(res)
                    for(i=0 ; i < res.length ; i++){
                        const type = res[i].types[0]
                        if(type === "locality"){
                            $("#tambon").val(res[i].long_name)
                        }else if(type === "administrative_area_level_2"){
                            $("#amphoe").val(res[i].short_name.replace("อ.", "").replace("Amphoe ", ""))
                        }else if(type === "administrative_area_level_1"){
                            $("#changwat").val(res[i].short_name.replace("จ.", "").replace("changwat ", ""))
                        }else if(type === "postal_code"){
                            $("#postalcode").val(res[i].short_name)
                        }
                    }
                })
            })
        });

        var list_image = [];
        class _DataTransfer {
            constructor() {
            return new ClipboardEvent("").clipboardData || new DataTransfer();
            }
        }
        
        $('#img_file_upid').change(function(ev){
            // list_image.push(this.files[0])
            for (let i = 0; i < this.files.length; i++) {
                list_image.push(this.files[i]);

                let reader = new FileReader();
                
                reader.onload = e => {
                    $('#show_images').append(
                        '<div class="col-md-3" ><img id="img_prv" style="width: 100%" src="'+e.target.result+'"></div>'
                    );
                }

                reader.readAsDataURL(this.files[i]);
            }
            const dt = new _DataTransfer();
            for (let file of list_image) {
                dt.items.add(file);
            }
            document.getElementById('img_files_upid').files = dt.files;
        });

        $('input[name="typewater"]').change(function() {
            if (this.value == 1) {
                $('#text_unit_water').removeAttr('readonly');
                $('#text_people_water').attr('readonly', 'readonly');
                $('#text_room_water').attr('readonly', 'readonly');
            } else if (this.value == 2) {
                $('#text_unit_water').attr('readonly', 'readonly');
                $('#text_people_water').removeAttr('readonly');
                $('#text_room_water').attr('readonly', 'readonly');
            } else if (this.value == 3) {
                $('#text_unit_water').attr('readonly', 'readonly');
                $('#text_people_water').attr('readonly', 'readonly');
                $('#text_room_water').removeAttr('readonly');
            } else {
                $('#text_unit_water').attr('readonly', 'readonly');
                $('#text_people_water').attr('readonly', 'readonly');
                $('#text_room_water').attr('readonly', 'readonly');
            }
        });

        $('input[name="typefire"]').change(function(){
            if(this.value == 1){
                $('#text_unit_fire').removeAttr('readonly');
            }else{
                $('#text_unit_fire').attr('readonly', 'readonly');
            }
        });
        $('input[name="typemoney"]').change(function(){
            if(this.value == 1){
                $('#text_month_money').removeAttr('readonly');
                $('#text_number_money').attr('readonly', 'readonly');
            }else if(this.value == 2){
                $('#text_month_money').attr('readonly', 'readonly');
                $('#text_number_money').removeAttr('readonly');
            }else{
                $('#text_month_money').attr('readonly', 'readonly');
                $('#text_number_money').attr('readonly', 'readonly');
            }
        });
        $('input[name="typedeposit"]').change(function(){
            if(this.value == 1){
                $('#text_month_deposit').removeAttr('readonly');
                $('#text_number_deposit').attr('readonly', 'readonly');
            }else if(this.value == 2){
                $('#text_month_deposit').attr('readonly', 'readonly');
                $('#text_number_deposit').removeAttr('readonly');
            }else{
                $('#text_month_deposit').attr('readonly', 'readonly');
                $('#text_number_deposit').attr('readonly', 'readonly');
            }
        });
        $('input[name="typeinternet"]').change(function(){
            if(this.value == 1){
                $('#text_number_internet').removeAttr('readonly');
                $('#text_specify_usage_internet').removeAttr('readonly');
            }else{
                $('#text_number_internet').attr('readonly', 'readonly');
                $('#text_specify_usage_internet').attr('readonly', 'readonly');
            }
        });
  </script>
@endsection