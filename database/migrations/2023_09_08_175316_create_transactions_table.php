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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outlet_id')->constrained('outlets')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_transaksi');
            $table->date('tgl_transaksi');
            $table->dateTime('batas_waktu');
            $table->dateTime('tgl_bayar')->nullable();
            $table->integer('biaya_tambahan')->default(0);
            $table->integer('diskon')->default(0);
            $table->integer('pajak')->default(0);
            $table->integer('total')->default(0);
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil'])->default('baru');
            $table->boolean('dibayar')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
