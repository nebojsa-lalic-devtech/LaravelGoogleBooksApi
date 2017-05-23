<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'isbn' => str_random(10),
            'book_name' => str_random(10),
            'author' => str_random(10)
        ]);
    }
}