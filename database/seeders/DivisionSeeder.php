<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $division = new Division();

        $division->name = "Dirección general";
        $division->level = 1;

        $division->save();

        $division2 = new Division();

        $division2->name = "Producto";
        $division2->level = 1;

        $division2->save();

        $division3 = new Division();

        $division3->name = "Operaciones";
        $division3->level = 1;

        $division3->save();

        $division4 = new Division();

        $division4->name = "CEO";
        $division4->level = 1;
        $division4->parent_id = $division->id;

        $division4->save();

        $division5 = new Division();

        $division5->name = "Mandu-Corp";
        $division5->level = 2;
        $division5->parent_id = $division->id;

        $division5->save();

        $division6 = new Division();

        $division6->name = "Growth";
        $division6->level = 2;
        $division6->parent_id = $division2->id;

        $division6->save();

        $division7 = new Division();

        $division7->name = "Strategy";
        $division7->level = 3;
        $division7->parent_id = $division->id;

        $division7->save();
    }
}
