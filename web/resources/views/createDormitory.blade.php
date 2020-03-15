@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-7">
      <div class="card">
          <div class="card-body">
              <div class="text-center">
                  <h3>เพิ่มข้อมูลหอพัก</h3>
              </div>
              <form method="POST" action="/dormitory" enctype="multipart/form-data">
                @csrf

                  <input type="hidden" name="role" value="user" />
                  <input type="hidden" name="lat" id="lat" />
                  <input type="hidden" name="lng" id="lng" />
                  <h4>1.ข้อมูลหอพัก</h4>
                  <div class="form-group">
                      <label for="name_dormitory" class="mb-0">ชื่อหอพัก <span class="text-danger">*</span></label>
                      <div class="col-md-6 p-0">
                        <input type="text" class="form-control form-control-sm @error('name_dormitory') is-invalid @enderror" id="name_dormitory" name="name_dormitory" placeholder="ชื่อหอพัก">
                        @error('name_dormitory')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                  </div>
                  <div class="form-group">
                        <label for="type_dormitory" class="mb-0">ประเภทหอพัก <span class="text-danger">*</span></label>
                        <div class="col-md-6 p-0">
                            <select class="form-control form-control-sm" id="type_dormitory" name="type_dormitory">
                                <option selected disabled>เลือกประเภทหอพัก</option>
                                <option>หอพักชาย</option>
                                <option>หอพักหญิง</option>
                                <option>หอพักรวม</option>
                            </select>
                          @error('type_dormitory')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="typeroom_dormitory" class="mb-0">ประเภทห้อง <span class="text-danger">*</span></label>
                        <div class="col-md-6 p-0">
                            <select class="form-control form-control-sm" id="typeroom_dormitory" name="typeroom_dormitory">
                                <option selected disabled>เลือกประเภทหอห้อง</option>
                                <option>ห้องแอร์</option>
                                <option>ห้องพัดลม</option>
                                <option>ห้องแอร์-พัดลม</option>
                            </select>
                          @error('typeroom_dormitory')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rent_dormitory" class="mb-0">ค่าเช่าหอพัก <span class="text-danger">*</span></label>
                        <div class="col-md-6 p-0">
                            <select class="form-control form-control-sm" id="rent_dormitory" name="rent_dormitory">
                                <option selected disabled>เลือกค่าเช่าหอพัก</option>
                                <option>น้อยกว่า 1500</option>
                                <option>1500 - 2000</option>
                                <option>2000 - 2500</option>
                                <option>2500 - 3000</option>
                                <option>3000 - 3500</option>
                                <option>3500 - 4000</option>
                                <option>4000 - 4500</option>
                                <option>4500 - 5000</option>
                            </select>
                          @error('rent_dormitory')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div>
                        <label for="rent_dormitory" class="mb-0">โปรโมชั่น <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-2 p-0">
                                    <input type="radio" class="form-check-input ml-2" id="pro" name="Promotion" value="1">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">มีโปรโมชั่น</label>
                            </div>
                            <div class="col-md-2 p-0">
                                    <input type="radio" class="form-check-input ml-2" id="nopro" name="Promotion" value="2">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">ไม่มีโปรโมชั่น</label>
                        </div>
                    </div><br>
                    <div>
                        <label for="rent_dormitory" class="mb-0">สถานะหอพัก <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-2 p-0">
                                    <input type="radio" class="form-check-input ml-2" id="blank" name="room" value="1">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">ห้องว่าง</label>
                            </div>
                            <div class="col-md-2 p-0">
                                    <input type="radio" class="form-check-input ml-2" id="busy" name="room" value="2">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">ห้องไม่ว่าง</label>
                        </div>
                    </div>
                    </div><br>
                    <div class="form-group">
                        <label for="detail_dormitory" class="mb-0">รายละเอียดหอพัก <span class="text-danger">*</span></label>
                        <textarea id="summernote" name="detail_dormitory"></textarea>
                    </div>
                    <input type="hidden" >
                    <div class="form-group">
                        <label for="name" class="mb-0 d-block">ตำแหน่งที่ตั้ง <span class="text-danger">*</span></label>
                        <div id="map" class="w-100 mt-3" style="height: 250px;"></div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-1 mb-0 font-weight-bold">ที่อยู่</label>
                        <div class="col-md-11 p-0">
                            <div class="row px-4">
                                <div class="col-md-3 px-1">
                                    <label for="layktee_dormitory" class="mb-0 d-block">เลขที่ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm @error('layktee_dormitory') is-invalid @enderror" id="layktee_dormitory" name="layktee_dormitory" placeholder="เลขที่">
                                </div>
                                <div class="col-md-3 px-1">
                                    <label for="tanon_dormitory" class="mb-0 d-block">ถนน </label>
                                    <input type="text" class="form-control form-control-sm @error('tanon_dormitory') is-invalid @enderror" id="tanon_dormitory" name="tanon_dormitory"placeholder="ถนน">
                                </div>
                                <div class="col-md-3 px-1">
                                    <label for="soi_dormitory" class="mb-0 d-block">ซอย </label>
                                    <input type="name" class="form-control form-control-sm @error('soi_dormitory') is-invalid @enderror" id="soi_dormitory" name="soi_dormitory"placeholder="ซอย">
                                </div>
                                <div class="col-md-3 px-1">
                                    <label for="home_dormitory" class="mb-0 d-block">บ้าน <span class="text-danger">*</span></label>
                                    <input type="name" class="form-control form-control-sm @error('home_dormitory') is-invalid @enderror" id="home_dormitory" name="home_dormitory"placeholder="บ้าน">
                                </div>
                                <div class="col-md-3 px-1">
                                    <label for="tambon_dormitory" class="mb-0 d-block">ตำบล <span class="text-danger">*</span></label>
                                    <input type="name" class="form-control form-control-sm @error('tambon_dormitory') is-invalid @enderror" id="tambon_dormitory" name="tambon_dormitory" placeholder="ตำบล">
                                </div>
                                <div class="col-md-3 px-1">
                                    <label for="amphoe_dormitory" class="mb-0 d-block">อำเภอ <span class="text-danger">*</span></label>
                                    <input type="name" class="form-control form-control-sm @error('amphoe_dormitory') is-invalid @enderror" id="amphoe_dormitory" name="amphoe_dormitory"  placeholder="อำเภอ">
                                </div>
                                <div class="col-md-3 px-1">
                                    <label for="changwat_dormitory" class="mb-0 d-block">จังหวัด <span class="text-danger">*</span></label>
                                    <input type="name" class="form-control form-control-sm @error('changwat_dormitory') is-invalid @enderror" id="changwat_dormitory" name="changwat_dormitory" placeholder="จังหวัด">
                                </div>
                                <div class="col-md-3 px-1">
                                    <label for="postalcode_dormitory" class="mb-0 d-block">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                    <input type="name" class="form-control form-control-sm @error('postalcode_dormitory') is-invalid @enderror" id="postalcode_dormitory" name="postalcode_dormitory" placeholder="รหัสไปรษณีย์">
                                </div>
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <h4>2.ข้อมูลติดต่อ</h4>
                    <div class="form-group">
                        <label for="admin_name" class="mb-0">ชื่อผู้ดูแล <span class="text-danger">*</span></label>
                        <div class="col-md-6 p-0">
                            <input type="text" class="form-control form-control-sm @error('admin_name') is-invalid @enderror" id="admin_name" name="admin_name" placeholder="ชื่อผู้ดูแล">
                            @error('admin_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin_phone" class="mb-0">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                        <div class="col-md-6 p-0">
                            <input type="text" class="form-control form-control-sm @error('admin_phone') is-invalid @enderror" id="admin_phone" name="admin_phone"placeholder="เบอร์โทรศัพท์">
                            @error('admin_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin_email" class="mb-0">อีเมล <span class="text-danger">*</span></label>
                        <div class="col-md-6 p-0">
                            <input type="text" class="form-control form-control-sm @error('admin_email') is-invalid @enderror" id="admin_email" name="admin_email"  placeholder="อีเมล">
                            @error('admin_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <h4>3.สิ่งอำนวยความสะดวกและรูปภาพ</h4>
                    <div class="row">
                        <div class="col-md-6">
                                <h6><img src="{{ asset('icons/door.svg')}}" alt="" style="width:20px;" class="mr-2">ภายในห้องพัก</h6>
                                <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="tv" name="tv">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ทีวี</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="meat_safe" name="meat_safe">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ตู้เย็น</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="fan" name="fan">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">พัดลม</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="air" name="air">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">เครื่องปรับอากาศ</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="wifi_dormitory" name="wifi_dormitory">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">อินเตอร์เน็ตไร้สาย(Wi-Fi)</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="washer" name="washer">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">เครื่องซักผ้า</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="wardrobe" name="wardrobe">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ตู้เสื้อผ้า</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="bad" name="bad">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">เตียงนอน</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="Cooker_hood" name="Cooker_hood">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">เครื่องดูดควัน</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="waterhot" name="waterhot">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">เครื่องทำน้ำอุ่น</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="cable" name="cable">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">เคเบิลทีวี/ดาวเทียม</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="Wash_dishes" name="Wash_dishes">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ซิงค์ล้างจาน/อ้างล้างจาน</label>
                                 </div>
                                 <div>
                                    <input type="checkbox" class="form-check-input ml-2" id="animal" name="animal">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">อนุญาตให้เลี้ยงสัตว์</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input ml-2" id="Direct_phone" name="Direct_phone">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">โทรศัพท์สายตรง</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input ml-2" id="microwave" name="microwave">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">ไมโครเวฟ</label>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <h6><img src="{{ asset('icons/building.svg')}}" alt="" style="width:20px;" class="mr-2">ภายในอาคารที่พัก/ส่วนกลาง</h6>
                                <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="closed_circuit_camera" name="closed_circuit_camera">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">กล้องวงจนปิด (CCTV)</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="Water_vending_machine" name="Water_vending_machine">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ตู้น้ำหยอดเหรียญ</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="motorcycle" name="motorcycle">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ที่จอดรถรถจักรยานยนต์</label>
                                 </div>
                                 <div>
                                    <input type="checkbox" class="form-check-input ml-2" id="Motor_vehicle" name="Motor_vehicle">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">ที่จอดรถยนต์</label>
                                </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="Safety" name="Safety">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ระบบรักษาความปลอดภัย Keycard</label>
                                 </div>
                                 <div>
                                    <input type="checkbox" class="form-check-input ml-2" id="scan" name="scan">
                                    <label class="form-check-label ml-4 text-body" for="dropdownCheck">ระบบสแกนลายนิ้วมือ</label>
                                </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="wifi_external" name="wifi_external">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">มีอินเตอร์เน็ตภายนอกอาคาร</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="food" name="food">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ร้านอาหาร</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="Seven" name="Seven">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ร้านสะดวกซื้อ</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="Coin_laundry" name="Coin_laundry">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ตู้ซักผ้าหยอดเหรียญ</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="lift" name="lift">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">ลิฟท์</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="swimming_pool" name="swimming_pool">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">สระว่ายน้ำ</label>
                                 </div>
                                 <div>
                                     <input type="checkbox" class="form-check-input ml-2" id="Fitness" name="Fitness">
                                     <label class="form-check-label ml-4 text-body" for="dropdownCheck">โรงยิม/ฟิตเนส</label>
                                 </div>
                        </div>
                    </div>
                    <div >
                    <div >
                        
                        <div class="text-center mt-2">
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-primary"><i class="fa fa-cloud-upload" aria-hidden="true"></i> อัพโหลดรูปภาพ</button>
                                <input type="file" id="img_file_upid" name="img_file_upid" multiple/><br>
                                <span style="padding-left: 10px;font-size: 15px; text-align: center;vertical-align: middle;padding-top: 15px;">(อัพโหลดได้หลายๆ รูปในครั้งเดียว)</span>
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
                        <div class="row mt-3" id="show_images">

                        </div>
                    </div>
                    <h4 class="mt-3">4.ค่าใช้จ่าย</h4>
                        <div class="container">
                            <h6 class="ml-1 w-100"><i class="fa fa-tint" aria-hidden="true"></i> ค่าน้ำ<span class="text-danger">*</span></h6> 
                                <div class="row water-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input class="water-price-select" id="unit_water" name="typewater" type="radio" value="1">
                                            <span class="water-price-label" style="">ตามยูนิตที่ใช้</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <input class="input-mini price-input water-price-input form-control water_price" id="text_unit_water" min="0" name="text_unit_water" placeholder="0.00" readonly="readonly" size="30" step="1" type="number">
                                            <span class="water-price-unit">บาทต่อยูนิต</span>
                                        </div>
                                </div>
                                <div class="row water-price-row ml-3">
                                        <div class="label-price col-md-4 ">
                                            <input class="water-price-select" id="Pay_people_water" name="typewater" type="radio" value="2">
                                            <span class="water-price-label" style="">เหมาจ่าย</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <input class="input-mini price-input water-price-input form-control water_price" id="text_people_water"  min="0" name="text_people_water" placeholder="0.00" readonly="readonly" size="30" step="1" type="number">
                                            <span class="water-price-unit">บาทต่อคน/เดือน</span>
                                        </div>
                                </div>
                                <div class="row water-price-row ml-3">
                                        <div class="label-price col-md-4 ">
                                            <input class="water-price-select" id="Pay_room_water" name="typewater" type="radio" value="3">
                                            <span class="water-price-label" style="">เหมาจ่าย</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <input class="input-mini price-input water-price-input form-control water_price" id="text_room_water" min="0" name="text_room_water" placeholder="0.00" readonly="readonly" size="30" step="1" type="number">
                                            <span class="water-price-unit">บาทต่อห้อง/เดือน</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="water-price-select" id="plumbing_water" name="typewater" type="radio" value="4">
                                                <span class="water-price-label" style="">ตามมิเตอร์การประปา</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="water-price-select" id="feeroom_water" name="typewater" type="radio" value="5">
                                                <span class="water-price-label" style="">รวมในค่าห้องแล้ว</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="water-price-select" id="phone_water" name="typewater" type="radio" value="6">
                                                <span class="water-price-label" style=""> โทรสอบถาม
                                                    </span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <span style="width: 200px;">*หมายเหตุ: สำหรับค่าน้ำ</span>
                                        </div>
                                        <div class="input-price col-md-11 mt-2">
                                            <input class="input-large price-input  water-note-input form-control water_price_note" id="text_note_water" name="water" size="30" type="text">
                                        </div>
                                </div>
                                <h6 class="ml-1 w-100 mt-2"><i class="fa fa-bolt" aria-hidden="true"></i> ค่าไฟ<span class="text-danger">*</span></h6> 
                                <div class="row fire-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input class="fire-price-select" id="unit_fire" name="typefire" type="radio" value="1">
                                            <span class="fire-price-label" style="">ตามยูนิตที่ใช้</span>
                                        </div>
                                        <div class="input-price col-md-5">
                                            <input class="input-mini price-input electric-price-input form-control fire_price" id="text_unit_fire" min="0" name="text_unit_fire" placeholder="0.00" readonly="readonly" size="30" step="1" type="number">
                                            <span class="fire-price-unit">บาทต่อยูนิต</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="fire-price-select" id="plumbing_fire" name="typefire" type="radio" value="2">
                                                <span class="fire-price-label" style="">ตามมิเตอร์การไฟฟ้า</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="fire-price-select" id="feeroom_fire" name="typefire" type="radio" value="3">
                                                <span class="fire-price-label" style="">รวมในค่าห้องแล้ว</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="fire-price-select" id="phone_fire" name="typefire" type="radio" value="4">
                                                <span class="fire-price-label" style=""> โทรสอบถาม
                                                    </span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <span style="width: 200px;">*หมายเหตุ: สำหรับค่าไฟฟ้า</span>
                                        </div>
                                        <div class="input-price col-md-11 mt-2">
                                            <input class="input-large price-input  fire-note-input form-control fire_price_note" id="text_note_fire" name="fire" size="30" type="text">
                                        </div>
                                </div>
                                <h6 class="ml-1 w-100 mt-2"><i class="fa fa-building" aria-hidden="true"></i> เงินมัดจำ/ประกัน<span class="text-danger">*</span></h6> 
                                <div class="row money-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input class="money-price-select" id="month_money" name="typemoney" type="radio" value="1">
                                            <span class="money-price-label" style="">ระบุเป็นเดือน</span>
                                        </div>
                                        <div class="input-money col-md-5">
                                                <select class="money_month money-fee-option-select required form-control" id="text_month_money" name="text_month_money" readonly="readonly"><option value="">เลือกเดือน</option>
                                                <option >1 เดือน</option>
                                                <option >2 เดือน</option>
                                                <option >3 เดือน</option>
                                                <option >4 เดือน</option>
                                                <option >5 เดือน</option>
                                                <option >6 เดือน</option></select>
                                        </div>
                                        <div class="label-price col-md-4">
                                                <input class="money-price-select" id="number_money" name="typemoney" type="radio" value="2">
                                                <span class="moneymoney-price-label" style="">ระบุจำนวนเงิน</span>
                                            </div>
                                            <div class="input-price col-md-5 mt-3">
                                                <input class="input-mini price-input money-price-input form-control money_price" id="text_number_money" min="0" name="text_number_money" placeholder="0.00" readonly="readonly" size="30" step="1" type="number">
                                                <span class="money-price-unit">บาท</span>
                                            </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="money-price-select" id="insurance_money" name="typemoney" type="radio" value="3">
                                                <span class="money-price-label" style="">ไม่มีเงินประกัน</span>
                                        </div>
                                        <div class="label-price col-md-4 mt-2">
                                                <input class="money-price-select" id="phone_money" name="typemoney" type="radio" value="4">
                                                <span class="money-price-label" style=""> โทรสอบถาม
                                                    </span>
                                        </div>
                                        <div class="label-price col-md-6 mt-2">
                                                <span style="width: 200px;">*หมายเหตุ: เงินมัดจำ/ประกัน</span>
                                        </div>
                                        <div class="input-price col-md-11 mt-2">
                                            <input class="input-large price-input  money-note-input form-control money_price_note" id="text_note_money" name="money" size="30" type="text">
                                        </div>
                                </div>
                                <h6 class="ml-1 w-100 mt-2"><i class="fa fa-credit-card" aria-hidden="true"></i> จ่ายล่วงหน้า<span class="text-danger">*</span></h6> 
                                <div class="row deposit-price-row ml-3">
                                        <div class="label-price col-md-4">
                                            <input class="deposit-price-select" id="month_deposit" name="typedeposit" type="radio" value="1">
                                            <span class="deposit-price-label" style="">ระบุเป็นเดือน</span>
                                        </div>
                                        <div class="input-deposit col-md-5">
                                                <select class="deposit_month deposit-fee-option-select required form-control" id="text_month_deposit" name="text_month_deposit" readonly="readonly"><option value="">เลือกเดือน</option>
                                                <option >1 เดือน</option>
                                                <option >2 เดือน</option>
                                                <option >3 เดือน</option>
                                                <option >4 เดือน</option>
                                                <option >5 เดือน</option>
                                                <option >6 เดือน</option></select>
                                        </div>
                                        <div class="label-price col-md-4">
                                                <input class="deposit-price-select" id="number_deposit" name="typedeposit" type="radio" value="2">
                                                <span class="deposit-price-label" style="">ระบุจำนวนเงิน</span>
                                            </div>
                                            <div class="input-price col-md-5 mt-3">
                                                <input class="input-mini price-input deposit-price-input form-control deposit_price" id="text_number_deposit" min="0" name="text_number_deposit" placeholder="0.00" readonly="readonly" size="30" step="1" type="number">
                                                <span class="deposit-price-unit">บาท</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input class="deposit-price-select" id="prepay_deposit" name="typedeposit" type="radio" value="3">
                                                    <span class="deposit-price-label" style="">ไม่ต้องจ่ายล่วงหน้า</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input class="deposit-price-select" id="phone_deposit" name="typedeposit" type="radio" value="4">
                                                    <span class="deposit-price-label" style=""> โทรสอบถาม
                                                        </span>
                                            </div>
                                            <div class="label-price col-md-6 mt-2">
                                                    <span style="width: 200px;">*หมายเหตุ: จ่ายล่วงหน้า</span>
                                            </div>
                                            <div class="input-price col-md-11 mt-2">
                                                <input class="input-large price-input  deposit-note-input form-control deposit_price_note" id="text_note_deposit" name="deposit" size="30" type="text">
                                            </div>
                                            <h6 class="ml-1 w-100 mt-2"><i class="fa fa-wifi" aria-hidden="true"></i>  ค่าอินเตอร์เน็ต<span class="text-danger">*</span></h6> 
                                <div class="row internet-price-row ml-3">
                                        <div class="label-price col-md-4">
                                                <input class="internet-price-select" id="number_internet" name="typeinternet" type="radio" value="1">
                                                <span class="internet-price-label" style="">ระบุจำนวนเงิน</span>
                                            </div>
                                            <div class="input-price col-md-3 mt-3">
                                                <input class="input-mini price-input internet-price-input form-control internet_price" id="text_number_internet" min="0" name="text_number_internet" placeholder="0.00" readonly="readonly" size="30" step="1" type="number">
                                                <span class="internet-price-unit">บาทต่อ</span>
                                            </div>
                                            <div class="input-internet-price col-md-4 mt-3">
                                                    <select class="phone_price_minute_unit internet-price-input-option-unit  required form-control" id="text_specify_usage_internet" name="text_specify_usage_internet" readonly="readonly"><option value="">ระบุการใช้งาน</option>
                                                    <option >ห้อง/เดือน</option>
                                                    <option >บัญชีผู้ใช้งาน/เดือน</option>
                                                    <option >อุปกรณ์/เดือน</option>
                                                    <option >คน/เดือน</option></select>
                                                    <span class="electric-price-unit">หน่วย</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input class="internet-price-select" id="free_internet" name="typeinternet" type="radio" value="2">
                                                    <span class="internet-price-label" style="">ฟรี</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input class="internet-price-select" id="no_internet" name="typeinternet" type="radio" value="3">
                                                    <span class="internet-price-label" style="">ไม่มีอินเตอร์เน็ต</span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <input class="internet-price-select" id="phone_internet" name="typeinternet" type="radio" value="4">
                                                    <span class="internet-price-label" style=""> โทรสอบถาม
                                                        </span>
                                            </div>
                                            <div class="label-price col-md-4 mt-2">
                                                    <span style="width: 200px;">*หมายเหตุ: อินเตอร์เน็ต</span>
                                            </div>
                                            <div class="input-price col-md-11 mt-2">
                                                    <input class="input-large price-input  internet-note-input form-control internet_price_note" id="text_note_internet" name="text_note_internet" size="30" type="text">
                                            </div>
                        </div>
                  <div class="text-center w-100 mt-4 mb-3">
                      <button type="submit" class="btn btn-danger " style="width: 200px;">บันทึก</button>
                  </div>
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
        var centerPosition = { lat: 15.1173119, lng: 104.90098 }
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: centerPosition,
                zoom: 15
            });
        }
        $(document).ready(function() {
            $('#lat').val(centerPosition.lat);
            $('#lng').val(centerPosition.lng);
            $('#summernote').summernote({
                placeholder: 'รายละเอียดหอพัก',
                tabsize: 1,
                height: 200
            });

            // $('.note-codable').first().attr('name', 'detail_dormitory');

            $("#setMakker").click(function(){
                console.log("555")
            })

            var marker = new google.maps.Marker({
                position: centerPosition,
                map: map,
                draggable: true
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
        $('input[name="room"]').change(function(){
            if(this.value == 1){
                $('#blank').removeAttr('readonly');
            }else{
                $('#blank').attr('readonly', 'readonly');
            }
        });
        $('input[name="Promotion"]').change(function(){
            if(this.value == 1){
                $('#pro').removeAttr('readonly');
            }else{
                $('#pro').attr('readonly', 'readonly');
            }
        });
  </script>
@endsection