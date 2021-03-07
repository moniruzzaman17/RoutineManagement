<?php

use Illuminate\Database\Seeder;
use App\ClassInfo;

class ClassInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$classes = ['Playgroup','Nursery','One','Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten','Eleven','Twelve'];
    	foreach ($classes as $key => $class) {
    		ClassInfo::create([
    			'class_name'=>$class,
    		]);
    	}
    }
}
