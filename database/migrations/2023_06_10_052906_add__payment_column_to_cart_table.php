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
        Schema::table('cart', function (Blueprint $table) {
            $table->unsignedBigInteger('CustomerID')->after('id')->required();
            $table->unsignedBigInteger('MenuID')->after('CustomerID')->required();
            
            $table->unsignedBigInteger('PaymentID')->after('MenuID')->nullable();
            $table->string('PaymentDate')->after('PaymentID')->nullable();
            
            $table->foreign('CustomerID')->references('id')->on('customer')->onDelete('restrict');
            $table->foreign('MenuID')->references('id')->on('menu')->onDelete('restrict');
            $table->foreign('PaymentID')->references('id')->on('payment')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->dropForeign(['CustomerID']);
            $table->dropForeign(['MenuID']);
            $table->dropForeign(['PaymentID']);
            $table->dropColumn('CustomerID');
            $table->dropColumn('MenuID');
            $table->dropColumn('PaymentID');
            $table->dropColumn('PaymentDate');
        });
    }
};
