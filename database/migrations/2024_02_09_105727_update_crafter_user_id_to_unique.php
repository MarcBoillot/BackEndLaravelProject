<?php

use App\Models\Crafter;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $crafters = Crafter::all();
        foreach ($crafters as $crafter){
            $userwithoutcrafter = User::doesntHave('crafter')->inRandomOrder()->first();
            $crafter->update([
                'user_id'=> $userwithoutcrafter->id
            ]);
        }
        Schema::table('crafters', function (Blueprint $table) {
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crafters', function (Blueprint $table) {
            $table->dropUnique('user_id');
        });
    }
};
