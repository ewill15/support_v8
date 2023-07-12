<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,5) as $index) {
	        DB::table('sections')->insert([	        
                'name'=>'section-'.$index,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
	        ]);
	    }
        
        foreach (range(1,25) as $index) {
            DB::table('questions')->insert([	        
                'question'=>'question-'.$index,
                'answer'=>'answer-'.$index,
                'section_id'=>mt_rand(1,5),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

	        ]);
        }
    }
}
