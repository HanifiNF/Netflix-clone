<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Example: Set the type based on specific titles
        $titlesAndTypes = [
            'Halo' => 'TV Series',
            'Fallout' => 'TV Series',
            'Kung Fu Panda 4' => 'Movie',
            'Parasyte: The grey' => 'TV Series',
            // Add more titles and their corresponding types as needed
        ];

        foreach ($titlesAndTypes as $title => $type) {
            DB::table('movies')->where('title', 'like', "%$title%")->update(['type' => $type]);
        }
    }

    public function down()
    {
        // If you need to rollback, you can reset the type column
        DB::table('movies')->update(['type' => null]);
    }
};
