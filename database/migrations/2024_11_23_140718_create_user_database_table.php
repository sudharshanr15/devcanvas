<?php

use App\Models\Projects;
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
        Schema::create('user_databases', function (Blueprint $table) {
            $table->id();
            $table->string("driver");
            $table->string("host");
            $table->string("port", 6);
            $table->string("database")->unique("database");

            # TODO: try to make username and password dynamic fields
            $table->string("username");
            $table->string("password");

            $table->foreignIdFor(Projects::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_databases');
    }
};
