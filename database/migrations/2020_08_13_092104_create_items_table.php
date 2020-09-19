<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            //Foreign KEY 
            $table->unsignedBigInteger('quote_id');
            $table->index('quote_id');
            
            //Foreign KEY
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            
            //ITEM ATTRIBUTES
            $table->string('ITEM_NAME');
            $table->string('CURRENCY');  
            $table->string('ACTIVE_STATUS');
            
            $table->decimal('EXCHANGE_RATE',10, 2);
            $table->decimal('QTY',10, 2);
            $table->decimal('COST_PER_UNIT',10, 2);
            $table->decimal('CHARGER_COMMISION',10, 2);
            $table->decimal('CHARGER_TRAINING',10, 2);
            $table->decimal('CHARGER_DELIVERY',10, 2);
            $table->decimal('CHARGER_OTHER',10, 2);
            
            $table->decimal('MARGIN',10, 2);
            
            
           
            
            
            //Derivatives -> DATA CALCULATED FROM INPUT
            $table->decimal('TOTAL_CHARGERS_MYR',10, 2); //EXCHANGE_RATE *  (CHARGER_COMMISION+ CHARGER_TRAINING + CHARGER_DELIVERY + CHARGER_OTHER)
            
             $table->decimal('COST_PER_UNIT_MYR',10, 2); // = EXCHANGE_RATE * (COST_PER_UNIT+TOTAL_CHARGERS_MYR)
             
             $table->decimal('TOTAL_COST_MYR',10, 2); // (EXCHANGE_RATE * ( (COST_PER_UNIT) *QTY ) +TOTAL_CHARGERS_MYR
             
             $table->decimal('PRICE_PER_UNIT_MYR',10, 2); // EXCHANGE_RATE * ( (COST_PER_UNIT) *MARGIN)  +TOTAL_CHARGERS_MYR
             $table->decimal('TOTAL_PRICE_MYR',10, 2); //// PRICE_PER_UNIT_MYR * QTY
             
             $table->decimal('NET_PROFIT_MYR',10, 2); //TOTAL_PRICE_MYR - TOTAL_COST_MYR
             
            
            //SUMMARY INFORMATION FOR ANALYTICAL SUMMARY VIEW
             $table->string('DESCRIPTION');
             $table->string('SUPLIER');
             $table->string('project_id');
             
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
