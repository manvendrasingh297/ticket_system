<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->unique();

            $table->string('title');
            $table->text('description');
            $table->text('assigned_user_comment')->nullable();
            
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('assigned_by')->comment("frontend user id"); 

            $table->integer('status')->default(1)->comment("1=todo,2=inprogress,3=complet,4=closed");   
            $table->integer('priority')->default(1)->comment("1=high,2=medium,3=low");   

            $table->timestamp('created_at')->useCurrent(); // Define the 'created_at' column
            $table->timestamp('updated_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
