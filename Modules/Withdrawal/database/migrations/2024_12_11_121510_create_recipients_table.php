<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use \Core\Traits\Database\Migration;
    use \Core\Traits\Database\DisableForeignKeys;

    public function up(): void
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('account')->nullable();
            $table->string('channel')->default('cm.mobile');
            $table->string('number')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->default('CM');
            $table->string('reference')->unique();
            $table->text('description')->nullable();
            $this->addUserField($table);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipients');
    }
};
