<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
             //Foreign KEY 
            $table->unsignedBigInteger('user_id');
             $table->index('user_id');
            //Foreign KEY 
            $table->string ('project_id');
 
            $table->timestamps();
            $table->softDeletes();
            
            $table->string('QUOTE_DESCRIPTION');
            $table->string('SUPPLIER');
            $table->string('SUPPLIER_CONTACT');
            $table->string('PDF_FILE');
            $table->string('ACTIVE_STATUS');
         
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
