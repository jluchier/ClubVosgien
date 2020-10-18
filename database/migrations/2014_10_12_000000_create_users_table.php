<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
			$table->enum("privilege", ["Admin", "Inscrit", "A valider", "Banni"])->default("A valider");
		});

		DB::table("users")->insert([
			"name" => "jj",
			"email" => "jluchier@free.fr",
			"password" => Hash::make("LeSuperMdp"),
			"email_verified_at" => now(),
			"privilege" => "Admin"
		]);
		DB::table("users")->insert([
			"name" => "inscrit",
			"email" => "inscrit@yopmail.com",
			"password" => Hash::make("LeSuperMdp"),
			"email_verified_at" => now(),
			"privilege" => "Inscrit"
		]);
		DB::table("users")->insert([
			"name" => "A valider",
			"email" => "avalider@yopmail.com",
			"password" => Hash::make("LeSuperMdp"),
			"email_verified_at" => now(),
			"privilege" => "A valider"
		]);
		DB::table("users")->insert([
			"name" => "Banni",
			"email" => "banni@yopmail.com",
			"password" => Hash::make("LeSuperMdp"),
			"email_verified_at" => now(),
			"privilege" => "Banni"
		]);
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
}
