<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('subscription_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_payment', 10, 2)->nullable(false); // Removed after() and fixed notNull()
            $table->boolean('apply_membership')->default(false); // Boolean type
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
