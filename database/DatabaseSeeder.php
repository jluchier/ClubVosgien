<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name" => "jj",
            "email" => "jluchier@free.fr",
            "password" => Hash::make("LeSuperMdp"),
            "email_verified_at" => now(),
            "privilege" => "Admin",
            'remember_token' => Str::random(10),
        ]);
        DB::table("users")->insert([
            "name" => "inscrit",
            "email" => "inscrit@yopmail.com",
            "password" => Hash::make("LeSuperMdp"),
            "email_verified_at" => now(),
            "privilege" => "Inscrit",
            'remember_token' => Str::random(10),
        ]);
        DB::table("users")->insert([
            "name" => "A valider",
            "email" => "avalider@yopmail.com",
            "password" => Hash::make("LeSuperMdp"),
            "email_verified_at" => now(),
            "privilege" => "A valider",
            'remember_token' => Str::random(10),
        ]);
        DB::table("users")->insert([
            "name" => "Banni",
            "email" => "banni@yopmail.com",
            "password" => Hash::make("LeSuperMdp"),
            "email_verified_at" => now(),
            "privilege" => "Banni",
            'remember_token' => Str::random(10),
        ]);
    }
}
