<?php

namespace Core\Traits\Database;

use Illuminate\Database\Schema\Blueprint;

trait Migration
{
    /**
     * Create fields common to all tables.
     */
    public function addCommonFields(Blueprint $table, bool $hasSoftDelete = false): void
    {
        $table->id();
        $table->timestamps();

        if ($hasSoftDelete) {
            $table->softDeletes();
        }
    }

    /**
     * Create fields common to seo.
     */
    public function addSeoFields(Blueprint $table): void
    {
        $table->string('seo_title', 60)->nullable();
        $table->text('seo_description')->nullable();
    }

    /**
     * Create fields common to seo.
     */
    public function addAvatar(Blueprint $table): void
    {
        $table->string('avatar', 2048)->nullable();
    }

    public function addImage(Blueprint $table): void
    {
        $table->string('image_path', 2048)->nullable();
    }

    /**
     * Create fields common to seo.
     */
    public function addTeamField(Blueprint $table): void
    {
        $table->foreignUlid('team_id')->nullable()->index()->constrained('teams')->cascadeOnDelete();
    }

    public function addCategoryField(Blueprint $table): void
    {
        $table->foreignUlid('category_id')->nullable()->index()->constrained('categories');
    }

    public function addEventField(Blueprint $table): void
    {
        $table->foreignUlid('event_id')->nullable()->index()->references('id')->on('events')->onDelete('cascade');
    }

    public function addModelField(Blueprint $table): void
    {
        $table->foreignUlid('model_id')->nullable()->index()->references('id')->on('models')->onDelete('cascade');
    }

    public function addCurrencyField(Blueprint $table): void
    {
        $table->foreignUlid('currency_id')
            ->index()
            ->nullable()
            ->constrained('currencies')
            ->cascadeOnDelete();
    }

    public function addOrderField(Blueprint $table): void
    {
        $table->string('order_id')->nullable()->index();
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    }

    public function addTicketField(Blueprint $table): void
    {
        $table->foreignUlid('ticket_id')->nullable()->references('id')->on('tickets')->onDelete('cascade');
    }

    public function addProductField(Blueprint $table): void
    {
        $table->foreignUlid('product_id')->nullable()->references('id')->on('products')->onDelete(
            'cascade'
        );
    }

    public function addUserField(Blueprint $table): void
    {
        $table->foreignId('user_id')->nullable()->index()->references('id')->on('users')->onDelete('cascade');
    }

    public function addLocationField(Blueprint $table): void
    {
        $table->foreignId('country_id')->nullable()->unsigned()->index()->references('id')->on(
            'world_countries'
        )->cascadeOnDelete();
        $table->foreignId('division_id')->nullable()->unsigned()->index()->references('id')->on(
            'world_divisions'
        )->cascadeOnDelete();
        $table->foreignId('city_id')->nullable()->unsigned()->index()->references('id')->on(
            'world_cities'
        )->cascadeOnDelete();
    }

    public function dropLocationField(Blueprint $table): void
    {
        $table->dropConstrainedForeignId('country_id');
        $table->dropConstrainedForeignId('division_id');
        $table->dropConstrainedForeignId('city_id');
    }
}
