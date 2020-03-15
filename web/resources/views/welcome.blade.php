@extends('layouts.app')

@section('content')
<div class="form-group mx-5 " style="margin-top: -1.5rem;">
    {{-- <button id="setMakker" class="btn btn-sm btn-primary"><i class="fa fa-street-view " aria-hidden="true"></i> กดเพื่อค้นหาตำแหน่ง</button> --}}
    <div id="map" class="w-100" style="height:350px;"></div>
</div>
    <div class="row mx-0 w-100">
            {{-- left --}}
            {{-- <div class="col-md-3">
                    <div class="card border-primary mt-4 mb-3 ml-4">
                            <div class="card-header"><h5>ราคา</h5></div>
                            <div class="card-body text-primary">
                                    <form action="form-group" >
                                            <div class="form-group">
                                                    <div>
                                                        <label class=" text-body" for="exampleInputname"><i class="fa fa-calendar" aria-hidden="true"></i> ค่าเช่าหอพัก </label>
                                                        <div class="mr-5 ">
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck">น้อยกว่า 1500</label>
                                                            </div>
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck"> 1500-2000 บาท</label>
                                                            </div>
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck">2000-2500 บาท</label>
                                                            </div>
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck"> 2500-3000 บาท</label>
                                                            </div>
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck"> 3000-3500 บาท</label>
                                                            </div>
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck"> 3500-4000 บาท</label>
                                                            </div>
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck"> 4000-4500 บาท</label>
                                                            </div>
                                                            <div>
                                                                <input type="checkbox" class="form-check-input ml-2" id="rent_dormitory" name="rent_dormitory">
                                                                <label class="form-check-label ml-4 text-body" for="dropdownCheck"> 4500-5000 บาท</label>
                                                            </div>
                                                        </div>
                                                </div>   
                                            </div>
                                    </form>
                
                            </div>
                            <div class="card-header"><h5>สิ่งอำนวยความสะดวก</h5></div>
                            <div class="card-body text-primary">
                                    <form action="form-group" >
                                            <div class="form-group">
                                                    <div>
                                                        <label class=" text-body" for="exampleInputname"><img src="{{ asset('icons/door.svg')}}" alt="" style="width:20px;" class="mr-2"> ภายในห้องพัก </label>
                                                        <div class="mr-5 ">
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
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <label class=" text-body" for="exampleInputname"><img src="{{ asset('icons/building.svg')}}" alt="" style="width:20px;" class="mr-2"> ภายในอาคารที่พัก/ส่วนกลาง </label>
                                                    <div class="mr-5 ">
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
                                            </div>
                                    </form>
                
                            </div>
                    </div>
            </div> --}}
            {{-- right --}}
            <div class="col-md-9 pt-4 mx-4">
                    @foreach ($dormitorys as $index => $dormitory)
                        
                    <div class="card  mr-3 mb-3 border-0">
                            <div class="row no-gutters">
                                    <div class="col-md-3 d-flex align-items-start justify-content-center">
                                        <img class="img-thumbnail" src="{{ '/uploads/images/dormitory/'.$dormitory->path }}" style="width:225px" >
                                    </div>
                                    <div class="col-md-9">
                                            <div class="card-body py-0">
                                                    <a href="dormitory/{{ $dormitory->id }}">
                                                            <span class="card-title font-weight-bold text-primary h5" >{{ $dormitory->name_dormitory }}</span>
                                                    </a>
                                                    <div>
                                                            <label style="font-size: 18px;color:gray"> {{ $dormitory->layktee_dormitory }} </label>
                                                            <label style="font-size: 18px;color:gray"> {{ $dormitory->tanon_dormitory }} </label>
                                                            <label style="font-size: 18px;color:gray"> {{ $dormitory->soi_dormitory }} </label>
                                                            <label style="font-size: 18px;color:gray"> บ้าน{{ $dormitory->home_dormitory }} </label>
                                                            <label style="font-size: 18px;color:gray"> ตำบล{{ $dormitory->tambon_dormitory }} </label>
                                                            <label style="font-size: 18px;color:gray"> อำเภอ{{ $dormitory->amphoe_dormitory }} </label>
                                                            <label style="font-size: 18px;color:gray"> จังหวัด{{ $dormitory->changwat_dormitory }} </label>
                                                            <label style="font-size: 18px;color:gray"> รหัสไปรษณีย์ {{ $dormitory->postalcode_dormitory }} </label>
                                                    </div>
                                                    <div class="py-0"> 
                                                            @if ($dormitory->tv)
                                                            <img src="{{ asset('icons/tv1.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif 
                                                            @if ($dormitory->meat_safe)
                                                            <img src="{{ asset('icons/Refrigerator.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->air)
                                                            <img src="{{ asset('icons/air.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->Cooker_hood)
                                                            <img src="{{ asset('icons/water-heater.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->microwave)
                                                            <img src="{{ asset('icons/microwave.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->closed_circuit_camera)
                                                            <img src="{{ asset('icons/cctv.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->Motor_vehicle)
                                                            <img src="{{ asset('icons/car1.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->Safety)
                                                            <img src="{{ asset('icons/Keycard.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->Seven)
                                                            <img src="{{ asset('icons/store.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->Coin_laundry)
                                                            <img src="{{ asset('icons/automated.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                            @if ($dormitory->lift)
                                                            <img src="{{ asset('icons/lift.svg')}}" alt="" style="width:20px;" class="mr-2">
                                                            @endif
                                                    </div>
                                                    <span class="d-block card-text text-dark mt-2">{{ $dormitory->rent_dormitory }} บาท/เดือน</span>
                                                    @if ($dormitory->type_select_room == 1)
                                                            <span class="badge badge-success"><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;ห้องว่าง</span>
                                                    @elseif($dormitory->type_select_room == 2)
                                                            <span class="badge badge-danger"><i class="fa fa-window-close-o" aria-hidden="true"></i>&nbsp;ไม่ห้องว่าง</span>
                                                    @endif
                                                    @if ($dormitory->type_select_Promotion == 1)
                                                        <span class="badge badge-danger"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;โปรโมชั่น</span>
                                                    @elseif($dormitory->type_select_Promotion == 2)
                                                        {{-- <span class="badge badge-danger"><i class="fa fa-window-close-o" aria-hidden="true"></i>&nbsp;ไม่ห้องว่าง</span> --}}
                                                    @endif
                                                                                    <div class="d-flex justify-content-between">
                                                            <span class="card-text d-block"><small class="text-muted">อัพเดทล่าสุด: {{ $dormitory->updated_at }}</small></span>
                                                            
                                                    </div>
                                                    <div class="col-md-12 text-right px-0">
                                                        <button onclick="location.href='dormitory/{{ $dormitory->id }}' " class="btn btn-sm btn-info rounded">ดูรายละเอียด</button>
                                                    </div>
                                            </div>
                                    </div>
                            </div>                
                    </div>
                    @endforeach
                    {{ $dormitorys->links() }}
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWuQmrf6UgrkGbMJF6-m1GwTZrazBFBo&callback=initMap" async defer></script>
    <script type="text/javascript">
        var dormitorys = {!! json_encode($all) !!};
        var map;
        var centerPosition = { lat: 15.1173119, lng: 104.90098 };
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: centerPosition,
                zoom: 15
            });
        }
        $(document).ready(function() {
            dormitorys.forEach(dormitory => {
                new google.maps.Marker({
                    position: { lat: dormitory.lat * 1, lng: dormitory.lng * 1 },
                    map: map,
                    draggable: false
                })
            });
        });
    </script>
@endsection

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}
