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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
      
           $table->float('amount');
           $table->string('from')->nullable();
           $table->string('to')->nullable();
            $table->dateTime('created_at')->nullable()->default((new DateTime())->format('Y-m-d H:i:s'));
            $table->dateTime('updated_at')->nullable()->default((new DateTime())->format('Y-m-d H:i:s'));
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

          

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
