<?php

use Illuminate\Database\Seeder;
use App\ClassRoom;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$rooms = ['101','102','103','104','105','106','107','108','109','110','111','112','113','114'];
    	$floor = '1st';
    	$building = "কলেজ ভবন";
    	foreach ($rooms as $key => $room) {
    		ClassRoom::create([
    			'room_no'=>$room,
    			'floor'=>$floor,
    			'building'=>$building,
    		]);
    	}
    }
}
