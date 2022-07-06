<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('teacher_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->text('description');
            $table->foreignIdFor(\App\Models\Course::class)
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('answer', 60);
            $table->text('options');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teacher_lessons');
    }
};
