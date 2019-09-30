<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('title');
            $table->string('link');
            $table->string('guid');
            $table->dateTime('pub_date');
            $table->mediumText('description');
            $table->date('deal_start_date');
            $table->date('deal_end_date');
            $table->date('deal_publish_date');
            $table->date('deal_edit_date');
            $table->string('coupon');
            $table->string('tracking_url');
            $table->longText('restrictions');
            $table->mediumText('keywords');
            $table->string('category');
            $table->integer('commission_percentage');
            $table->integer('merchantID');
            $table->string('merchant_name');          
            $table->mediumText('deal_title');      
            $table->text('image_big');      
            $table->text('image_small');
            $table->mediumText('html_of_deal');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
