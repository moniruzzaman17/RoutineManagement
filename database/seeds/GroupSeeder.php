<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$groups = ['Science','Arts','Commerce'];
    	foreach ($groups as $key => $group) {
    		Group::create([
    			'group_name'=>$group,
    		]);
    	}
    }
}
