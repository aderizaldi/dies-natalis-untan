<?php

use App\Enums\JenisKelaminEnum;
use App\Enums\StatusPesertaEnum;
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
        Schema::create('form_agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agenda_id')->constrained('agendas')->cascadeOnDelete();
            $table->string('nomor_peserta')->unique();
            $table->enum('status_peserta', StatusPesertaEnum::getValues());
            $table->string('nama');
            $table->enum('jenis_kelamin', JenisKelaminEnum::getValues());
            $table->integer('umur');
            $table->string('no_hp');
            $table->text('alamat')->nullable();
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_agendas');
    }
};
