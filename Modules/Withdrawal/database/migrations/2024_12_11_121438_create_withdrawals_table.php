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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('booking_amount');
            $table->string('amount_total');
            $table->string('number')->nullable();
            $table->string('fee');
            $table->string('beneficiary');
            $table->text('description')->nullable();
            $table->string('reference')->unique();
            $table->string('status');
            $table->string('currency')->default('XAF');
            $table->string('geo')->nullable();
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
        Schema::dropIfExists('withdrawals');
    }
};
