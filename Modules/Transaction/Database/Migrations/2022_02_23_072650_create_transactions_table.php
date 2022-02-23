<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->string('description',30);
            $table->string('destinationFirstname',33);
            $table->string('destinationLastname',33);
            $table->string('destinationNumber',26);
            $table->integer('inquirySequence');
            $table->integer('inquiryTime');
            $table->string('refCode');
            $table->string('sourceNumber');
            $table->string('type');
            $table->string('message')->nullable();
            $table->string('paymentNumber',26)->nullable();
            $table->integer('reasonDescription')->nullable();
            $table->string('deposit',26)->nullable();
            $table->string('sourceFirstName',26)->nullable();
            $table->string('sourceLastName',26)->nullable();
            $table->foreignIdFor(\App\Models\User::class);

            $table->timestamp('inquiryDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
