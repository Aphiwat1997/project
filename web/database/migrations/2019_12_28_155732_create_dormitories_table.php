<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDormitoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormitories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_dormitory');
            $table->string('type_dormitory');
            $table->string('typeroom_dormitory');
            $table->string('rent_dormitory');
            $table->integer('type_select_room');
            $table->integer('type_select_Promotion');
            // $table->boolean('blank');
            // $table->boolean('busy');
            $table->string('detail_dormitory');
            // $table->double('lat');
            // $table->double('lng');
            $table->decimal('lat', 10,8);
            $table->decimal('lng', 11,8);
            $table->string('layktee_dormitory');
            $table->string('tanon_dormitory')->nullable();
            $table->string('soi_dormitory')->nullable();
            $table->string('home_dormitory');
            $table->string('tambon_dormitory');
            $table->string('amphoe_dormitory');
            $table->string('changwat_dormitory');
            $table->string('postalcode_dormitory');

            $table->string('admin_name');
            $table->string('admin_phone');
            $table->string('admin_email');
            $table->boolean('tv');
            $table->boolean('meat_safe');
            $table->boolean('fan');
            $table->boolean('air');
            $table->boolean('wifi_dormitory');
            $table->boolean('washer');
            $table->boolean('wardrobe');
            $table->boolean('bad');
            $table->boolean('Cooker_hood');
            $table->boolean('waterhot');
            $table->boolean('cable');
            $table->boolean('Wash_dishes');
            $table->boolean('animal');
            $table->boolean('Direct_phone');
            $table->boolean('microwave');

            $table->boolean('closed_circuit_camera');
            $table->boolean('Water_vending_machine');
            $table->boolean('motorcycle');
            $table->boolean('Motor_vehicle');
            $table->boolean('Safety');
            $table->boolean('scan');
            $table->boolean('wifi_external');
            $table->boolean('food');
            $table->boolean('Seven');
            $table->boolean('Coin_laundry');
            $table->boolean('lift');
            $table->boolean('swimming_pool');
            $table->boolean('Fitness');
            
            // $table->string('img_file_upid');
            //ค่าน้ำ
            $table->integer('type_select_water');
            $table->string('text_unit_water')->nullable();
            $table->string('text_people_water')->nullable();
            $table->string('text_room_water')->nullable();
            $table->string('text_note_water')->nullable();

            //ค่่าไฟ
            $table->integer('type_select_fire');
            $table->string('text_unit_fire')->nullable();
            $table->string('text_note_fire')->nullable();

            //เงินมัดจำ
            $table->integer('type_select_money');
            $table->string('text_month_money')->nullable();
            $table->string('text_number_money')->nullable();
            $table->string('text_note_money')->nullable();

            //จ่ายล่วงหน้า
            $table->integer('type_select_deposit');
            $table->string('text_month_deposit')->nullable();
            $table->string('text_number_deposit')->nullable();
            $table->string('text_note_deposit')->nullable();

            //ค่าเน็ต
            $table->integer('type_select_internet');
            $table->string('text_number_internet')->nullable();
            $table->string('text_specify_usage_internet')->nullable();
            $table->string('text_note_internet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dormitories');
    }
}
