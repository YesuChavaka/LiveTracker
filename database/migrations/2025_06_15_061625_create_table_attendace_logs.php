<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckInsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->id(); // id - bigint
            $table->unsignedBigInteger('user_id'); // user_id - bigint
            $table->decimal('check_in_latitude', 10, 8); // check_in_latitude - decimal(10, 8)
            $table->decimal('check_in_longitude', 11, 8); // check_in_longitude - decimal(11, 8)
            $table->decimal('check_out_latitude', 10, 8)->nullable(); // check_out_latitude - decimal(10, 8), checked
            $table->decimal('check_out_longitude', 11, 8)->nullable(); // check_out_longitude - decimal(11, 8), checked
            $table->dateTime('check_in_time'); // check_in_time - datetime
            $table->dateTime('check_out_time')->nullable(); // check_out_time - datetime, checked
            $table->string('status'); // status - nvarchar(255)
            $table->timestamps(); // created_at and updated_at (both checked, nullable by default)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ins');
    }
}
