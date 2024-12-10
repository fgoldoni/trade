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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
            $table->text('description')->nullable();
            $table->double('price')->default(0);
            $table->integer('quantity')->default(10000);
            $table->integer('sold')->default(0);
            $table->integer('days')->default(90);
            $table->boolean('online')->default(false);
            $table->integer('position')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->disableForeignKeys();
        Schema::dropIfExists('products');
        $this->enableForeignKeys();
    }
};