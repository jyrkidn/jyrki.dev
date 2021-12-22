<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DropFilamentUsersAndFilamentPasswordResetsTables extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('filament_users');
        Schema::dropIfExists('filament_password_resets');
    }
}
