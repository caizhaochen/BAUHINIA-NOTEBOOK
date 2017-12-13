<?php

use Illuminate\Database\Seeder;

class NotebooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Notebooks')->delete();

        for ($i=0; $i < 10; $i++) {
            \App\Article::create([
                'title'   => 'Title '.$i,
                'body'    => 'Body '.$i,
                'user_id' => 1,
            ]);
        }
    }
}
