<?php

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
        Schema::create('testings', function (Blueprint $table) {
            $table->increments('testingID');
            $table->string('name', 100)->unique();
            $table->string('description', 255);
            $table->string('document', 255)->nullable();
            $table->unsignedTinyInteger('testtypeID');
            $table->unsignedTinyInteger('updated_by');
            $table->string('icon')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
