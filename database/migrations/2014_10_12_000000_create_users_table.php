<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_users', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('username', 150)->default(null);
            $table->string('name', 100)->default(null);
            $table->string('email', 100);
            $table->string('password', 100)->default(NULL);
		    $table->string('password_key', 50)->default(null);
		    $table->integer('password_expire_days')->default(null);
		    $table->string('mobile', 11)->default(null);
		    $table->date('date_of_birth')->default(null);
		    $table->enum('gender', ['Male', 'Female'])->default('Male');
		    $table->enum('religion', ['Muslim', 'Hindu', 'Christian', 'Buddhist'])->default('Muslim');
		    $table->dateTime('last_login')->default(null);
		    $table->enum('status', ['Active', 'Inactive'])->default('Active');
		    $table->string('user_image', 100)->default('images/default/avatar.jpg');
		    $table->string('address', 255)->default(null);
		    $table->string('default_url', 255)->default(null);
		    $table->integer('default_module_id')->default('0');
		    $table->string('remember_token', 100)->default(null);
		    $table->integer('created_by')->default('0');
		    $table->dateTime('created_at')->default(null);
		    $table->integer('updated_by')->default('0');
		    $table->time('updated_at')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

		    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_users');
    }
}
