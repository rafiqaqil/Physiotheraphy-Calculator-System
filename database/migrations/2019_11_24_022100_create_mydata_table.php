<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMydataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('mydatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->string('str1');
            $table->string('str2');
            $table->string('str3');
            $table->string('str4');
            $table->string('str5');
            $table->string('str6');
            $table->string('str7');
            $table->decimal('dec1',10, 2);
            $table->decimal('dec2',10, 2);
            $table->decimal('dec3',10, 2);
            $table->decimal('dec4',10, 2);
            $table->decimal('dec5',10, 2);
            
            $table->index('user_id');
            $table ->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydata');
    }
}
