<?php

use Illuminate\Database\Seeder;
use App\Shift;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$shifts = ['Day','Evening'];
    	foreach ($shifts as $key => $shift) {
    		Shift::create([
    			'shift_name'=>$shift
    		]);
    	}
    }
}
