<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MailListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('mail_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('send_date');
            $table->string('to_email',50)->nullable();
            $table->mediumText('body')->nullable();
            $table->boolean('is_read')->default(0);
            $table->boolean('is_spam')->default(0);
            $table->boolean('is_draft')->default(0);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
        // Schema::rename($maillists,$mail_lists);

        Schema::dropIfExists('mail_lists');
    }
}
