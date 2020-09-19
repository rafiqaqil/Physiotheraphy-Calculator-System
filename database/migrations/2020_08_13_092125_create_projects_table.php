<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            //Foreign KEY
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            
            
            //ATTRIBUTES
            $table->string('COMPANY_INCHARGE');
            $table->string('CUSTOMER_NAME');
            $table->string('PERSON_INCHARGE');
            $table->string('PERSON_INCHARGE_CONTACT');
            $table->string('PROJECT_NO');
            $table->string('LO_NUMBER');
            $table->string('PROJECT_STATUS');
            $table->decimal('FINANCIAL_OWN', 8,2);
            $table->decimal('FINANCIAL_FACILITY', 9,2);
            $table->decimal('FINANCIAL_FACILITY_RATE', 9,3);
            
            //DEADLINES AND DATES
            
            $table->date('DEADLINE_LO_ACCEPTANCE')->nullable($value = true);
            $table->date('DEADLINE_LO_RECIEVED')->nullable($value = true);
            $table->date('DEADLINE_LO_DUE')->nullable($value = true);
            
            $table->date('DEADLINE_PROJECT_SUMMARY')->nullable($value = true);
            $table->date('DEADLINE_DOWNPAYMENT')->nullable($value = true);
            $table->date('DEADLINE_COMMITMENT')->nullable($value = true);
            
            $table->string('REMARKS_1')->nullable($value = true);
            $table->string('REMARKS_2')->nullable($value = true);
            $table->string('REMARKS_3')->nullable($value = true);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
