<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->integer('item_number');
            $table->integer('item_amount');
            $table->dateTime('published');
            $table->timestamps();
        });

        /* うまくいかないので
        create table books (
            id MEDIUMINT NOT NULL AUTO_INCREMENT,
            item_name varchar(191) not null,
            item_number mediumint not null,
            item_amount mediumint not null,
            published datetime not null,
            created_at timestamp ,
            updated_at timestamp default current_timestamp,
            primary key(id)
        );
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
