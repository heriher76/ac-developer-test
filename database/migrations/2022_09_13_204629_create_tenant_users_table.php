<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantUsersTable extends Migration
{
    public function up()
    {
        Schema::create('tenant_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenant_id');
            $table->string('subdomain_user_id');

            $table->unique(['tenant_id', 'subdomain_user_id']);

            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subdomain_user_id')->references('subdomain')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenant_users');
    }
}
