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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transporter')->nullable();
            $table->enum('status', ['processing', 'approved', 'departing', 'delivered'])->default('processing');
            $table->string('cargo_type');
            $table->string('cargo_describe');
            $table->string('truck_type');
            $table->decimal('weight',10,0);
            $table->string('load_place');
            $table->string('unload_place');
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic');
            $table->string('phone');
            $table->string('login');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('departing_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->date('ready_date');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
