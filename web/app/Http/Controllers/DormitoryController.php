<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dormitory;
use App\Picture;

class DormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $dormitorys = Dormitory::all();
        return view('listDormitory', ['dormitorys' => $dormitorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createDormitory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dormitory = new Dormitory();
        $dormitory->name_dormitory = $request['name_dormitory'];
        $dormitory->type_dormitory = $request['type_dormitory'];
        $dormitory->typeroom_dormitory = $request['typeroom_dormitory'];
        $dormitory->rent_dormitory = $request['rent_dormitory'];
        $dormitory->type_select_room = (int)$request['room'];
        $dormitory->type_select_Promotion = (int)$request['Promotion'];
        $dormitory->detail_dormitory = $request['detail_dormitory'];
        $dormitory->lat = round(doubleval($request['lat']), 8);
        $dormitory->lng = round(doubleval($request['lng']), 8);
        $dormitory->layktee_dormitory = $request['layktee_dormitory'];
        $dormitory->tanon_dormitory = $request['tanon_dormitory'];
        $dormitory->soi_dormitory = $request['soi_dormitory'];
        $dormitory->home_dormitory = $request['home_dormitory'];
        $dormitory->tambon_dormitory = $request['tambon_dormitory'];
        $dormitory->amphoe_dormitory = $request['amphoe_dormitory'];
        $dormitory->changwat_dormitory = $request['changwat_dormitory'];
        $dormitory->postalcode_dormitory = $request['postalcode_dormitory'];

        $dormitory->admin_name = $request['admin_name'];
        $dormitory->admin_phone = $request['admin_phone'];
        $dormitory->admin_email = $request['admin_email'];

        $dormitory->tv = $request['tv'] == null ? 0 : 1;
        $dormitory->meat_safe = $request['meat_safe'] == null ? 0 : 1;
        $dormitory->fan = $request['fan'] == null ? 0 : 1;
        $dormitory->air = $request['air'] == null ? 0 : 1;
        $dormitory->wifi_dormitory = $request['wifi_dormitory'] == null ? 0 : 1;
        $dormitory->washer = $request['washer'] == null ? 0 : 1;
        $dormitory->wardrobe = $request['wardrobe'] == null ? 0 : 1;
        $dormitory->bad = $request['bad'] == null ? 0 : 1;
        $dormitory->Cooker_hood = $request['Cooker_hood'] == null ? 0 : 1;
        $dormitory->waterhot = $request['waterhot'] == null ? 0 : 1;
        $dormitory->cable = $request['cable'] == null ? 0 : 1;
        $dormitory->Wash_dishes = $request['Wash_dishes'] == null ? 0 : 1;
        $dormitory->animal = $request['animal'] == null ? 0 : 1;
        $dormitory->Direct_phone = $request['Direct_phone'] == null ? 0 : 1;
        $dormitory->microwave = $request['microwave'] == null ? 0 : 1;

        $dormitory->closed_circuit_camera = $request['closed_circuit_camera'] == null ? 0 : 1;
        $dormitory->Water_vending_machine = $request['Water_vending_machine'] == null ? 0 : 1;
        $dormitory->motorcycle = $request['motorcycle'] == null ? 0 : 1;
        $dormitory->Motor_vehicle = $request['Motor_vehicle'] == null ? 0 : 1;
        $dormitory->Safety = $request['Safety'] == null ? 0 : 1;
        $dormitory->scan = $request['scan'] == null ? 0 : 1;
        $dormitory->wifi_external = $request['wifi_external'] == null ? 0 : 1;
        $dormitory->food = $request['food'] == null ? 0 : 1;
        $dormitory->Seven = $request['Seven'] == null ? 0 : 1;
        $dormitory->Coin_laundry = $request['Coin_laundry'] == null ? 0 : 1;
        $dormitory->lift = $request['lift'] == null ? 0 : 1;
        $dormitory->swimming_pool = $request['swimming_pool'] == null ? 0 : 1;
        $dormitory->Fitness = $request['Fitness'] == null ? 0 : 1;

        // $dormitory->img_file_upid = $request['img_file_upid'];

        $dormitory->type_select_water = (int)$request['typewater'];
        $dormitory->text_unit_water = $request['text_unit_water'];
        $dormitory->text_people_water = $request['text_people_water'];
        $dormitory->text_room_water = $request['text_room_water'];
        $dormitory->text_note_water = $request['water'];

        $dormitory->type_select_fire = (int)$request['typefire'];
        $dormitory->text_unit_fire = $request['text_unit_fire'];
        $dormitory->text_note_fire = $request['fire'];

        $dormitory->type_select_money = (int)$request['typemoney'];
        $dormitory->text_month_money = $request['text_month_money'];
        $dormitory->text_number_money = $request['text_number_money'];
        $dormitory->text_note_money = $request['money'];

        $dormitory->type_select_deposit = (int)$request['typedeposit'];
        $dormitory->text_month_deposit = $request['text_month_deposit'];
        $dormitory->text_number_deposit = $request['text_number_deposit'];
        $dormitory->text_note_deposit = $request['deposit'];

        $dormitory->type_select_internet = (int)$request['typeinternet'];
        $dormitory->text_number_internet = $request['text_number_internet'];
        $dormitory->text_specify_usage_internet = $request['text_specify_usage_internet'];
        $dormitory->text_note_internet = $request['internet'];
        $dormitory->save();
        if ($request->hasfile('files_img'))
        {
            foreach($request->file('files_img') as $index => $image)
            {
                $name = 'Dormitory'.time().$index.$image->getClientOriginalName();
                $image->move(public_path().'/uploads/images/dormitory', $name);
                DB::insert('insert into pictures (dormitory_id, path) values (?, ?)', [$dormitory->id, $name]);
            }
        }
        return redirect('dormitory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pictures = DB::table('pictures')->where('dormitory_id', $id)->get();
        $dormitory = Dormitory::find($id);
        return view('showDormitory', ['dormitory' => $dormitory, 'pictures' => $pictures]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pictures = DB::table('pictures')->where('dormitory_id', $id)->get();
        $dormitory = Dormitory::find($id);
        return view('editDormitory', ['dormitory' => $dormitory, 'pictures' => $pictures]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imagesRemove = explode('|', $request['image_remove']);
        foreach ($imagesRemove as $image) {
            DB::table('pictures')->where('path', '=', $image)->delete();
            @unlink(public_path().'/uploads/images/dormitory/'.$image);
        }
        $dormitory = Dormitory::find($id);
        $dormitory->name_dormitory = $request['name_dormitory'];
        $dormitory->type_dormitory = $request['type_dormitory'];
        $dormitory->typeroom_dormitory = $request['typeroom_dormitory'];
        $dormitory->rent_dormitory = $request['rent_dormitory'];
        $dormitory->type_select_room = (int)$request['room'];
        $dormitory->type_select_Promotion = (int)$request['Promotion'];
        $dormitory->detail_dormitory = $request['detail_dormitory'];
        $dormitory->lat = round(doubleval($request['lat']), 8);
        $dormitory->lng = round(doubleval($request['lng']), 8);
        $dormitory->layktee_dormitory = $request['layktee_dormitory'];
        $dormitory->tanon_dormitory = $request['tanon_dormitory'];
        $dormitory->soi_dormitory = $request['soi_dormitory'];
        $dormitory->home_dormitory = $request['home_dormitory'];
        $dormitory->tambon_dormitory = $request['tambon_dormitory'];
        $dormitory->amphoe_dormitory = $request['amphoe_dormitory'];
        $dormitory->changwat_dormitory = $request['changwat_dormitory'];
        $dormitory->postalcode_dormitory = $request['postalcode_dormitory'];

        $dormitory->admin_name = $request['admin_name'];
        $dormitory->admin_phone = $request['admin_phone'];
        $dormitory->admin_email = $request['admin_email'];

        $dormitory->tv = $request['tv'] == null ? 0 : 1;
        $dormitory->meat_safe = $request['meat_safe'] == null ? 0 : 1;
        $dormitory->fan = $request['fan'] == null ? 0 : 1;
        $dormitory->air = $request['air'] == null ? 0 : 1;
        $dormitory->wifi_dormitory = $request['wifi_dormitory'] == null ? 0 : 1;
        $dormitory->washer = $request['washer'] == null ? 0 : 1;
        $dormitory->wardrobe = $request['wardrobe'] == null ? 0 : 1;
        $dormitory->bad = $request['bad'] == null ? 0 : 1;
        $dormitory->Cooker_hood = $request['Cooker_hood'] == null ? 0 : 1;
        $dormitory->waterhot = $request['waterhot'] == null ? 0 : 1;
        $dormitory->cable = $request['cable'] == null ? 0 : 1;
        $dormitory->Wash_dishes = $request['Wash_dishes'] == null ? 0 : 1;
        $dormitory->animal = $request['animal'] == null ? 0 : 1;
        $dormitory->Direct_phone = $request['Direct_phone'] == null ? 0 : 1;
        $dormitory->microwave = $request['microwave'] == null ? 0 : 1;

        $dormitory->closed_circuit_camera = $request['closed_circuit_camera'] == null ? 0 : 1;
        $dormitory->Water_vending_machine = $request['Water_vending_machine'] == null ? 0 : 1;
        $dormitory->motorcycle = $request['motorcycle'] == null ? 0 : 1;
        $dormitory->Motor_vehicle = $request['Motor_vehicle'] == null ? 0 : 1;
        $dormitory->Safety = $request['Safety'] == null ? 0 : 1;
        $dormitory->scan = $request['scan'] == null ? 0 : 1;
        $dormitory->wifi_external = $request['wifi_external'] == null ? 0 : 1;
        $dormitory->food = $request['food'] == null ? 0 : 1;
        $dormitory->Seven = $request['Seven'] == null ? 0 : 1;
        $dormitory->Coin_laundry = $request['Coin_laundry'] == null ? 0 : 1;
        $dormitory->lift = $request['lift'] == null ? 0 : 1;
        $dormitory->swimming_pool = $request['swimming_pool'] == null ? 0 : 1;
        $dormitory->Fitness = $request['Fitness'] == null ? 0 : 1;

        // $dormitory->img_file_upid = $request['img_file_upid'];

        $dormitory->type_select_water = (int)$request['typewater'];
        $dormitory->text_unit_water = $request['text_unit_water'];
        $dormitory->text_people_water = $request['text_people_water'];
        $dormitory->text_room_water = $request['text_room_water'];
        $dormitory->text_note_water = $request['water'];

        $dormitory->type_select_fire = (int)$request['typefire'];
        $dormitory->text_unit_fire = $request['text_unit_fire'];
        $dormitory->text_note_fire = $request['fire'];

        $dormitory->type_select_money = (int)$request['typemoney'];
        $dormitory->text_month_money = $request['text_month_money'];
        $dormitory->text_number_money = $request['text_number_money'];
        $dormitory->text_note_money = $request['money'];

        $dormitory->type_select_deposit = (int)$request['typedeposit'];
        $dormitory->text_month_deposit = $request['text_month_deposit'];
        $dormitory->text_number_deposit = $request['text_number_deposit'];
        $dormitory->text_note_deposit = $request['deposit'];

        $dormitory->type_select_internet = (int)$request['typeinternet'];
        $dormitory->text_number_internet = $request['text_number_internet'];
        $dormitory->text_specify_usage_internet = $request['text_specify_usage_internet'];
        $dormitory->text_note_internet = $request['internet'];
        $dormitory->save();
        if ($request->hasfile('files_img'))
        {
            foreach($request->file('files_img') as $index => $image)
            {
                $name = 'Dormitory'.time().$index.$image->getClientOriginalName();
                $image->move(public_path().'/uploads/images/dormitory', $name);
                DB::insert('insert into pictures (dormitory_id, path) values (?, ?)', [$dormitory->id, $name]);
            }
        }
        return redirect('dormitory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $pictures = DB::table('pictures')->where('dormitory_id', $id)->get();
        foreach ($pictures as $picture) {
            @unlink(public_path().'/uploads/images/dormitory/'.$picture->path);
        }
        Picture::where('dormitory_id', '=', $id)->delete();
        Dormitory::destroy($id);
        return redirect('dormitory');
    }
}
