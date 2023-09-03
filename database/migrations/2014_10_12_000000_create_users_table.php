<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('identity_type');
            $table->bigInteger('identity_number');
            $table->string('pob');
            $table->date('dob');
            $table->string('address');
            $table->timestamps();
        });
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')->constrained('reporters');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('ticket_id'); // tahun bulan tgl nourut
            $table->string('title');
            $table->longText('description');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
        Schema::create('report_trackers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('report_id')->constrained('reports');
            $table->string('status')->default('Pending');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('reporters');
        Schema::dropIfExists('report_trackers');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('media');
    }
};
