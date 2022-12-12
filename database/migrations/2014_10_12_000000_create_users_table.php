<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string("id_users")->primary();
            $table->string("nama", 100);
            $table->string("email")->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("role", 30);
            $table->bigInteger("created_by")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
