<?php

use Illuminate\Database\Seeder;
use App\Designations;
class Designationseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		    Designations::create([
		        'title' => 'CEO',
		    ]);		    
		    Designations::create([
		        'title' => 'IT Officer',
		    ]);

		    Designations::create([
		        'title' => 'HR',
		    ]);
		    Designations::create([
		        'title' => 'Accountant',
		    ]);
		    Designations::create([
		        'title' => 'Senior IT Officer',
		    ]);
		    Designations::create([
		        'title' => 'Software Engineer',
		    ]);		    
		    Designations::create([
		        'title' => 'Sr. Software Engineer',
		    ]);
    }
}
