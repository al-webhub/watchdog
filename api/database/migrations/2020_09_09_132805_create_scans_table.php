<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
            $table->unsignedInteger('score_desktop')->default(0);
            $table->unsignedInteger('score_mobile')->default(0);
            $table->double('cls_desktop')->default(0);
            $table->double('cls_mobile')->default(0);
            $table->unsignedInteger('fcp_mobile')->default(0);
            $table->unsignedInteger('fcp_desktop')->default(0);
            $table->unsignedInteger('tti_mobile')->default(0);
            $table->unsignedInteger('tti_desktop')->default(0);
            $table->unsignedInteger('si_mobile')->default(0);
            $table->unsignedInteger('si_desktop')->default(0);
            $table->unsignedInteger('fcpu_idle_mobile')->default(0);
            $table->unsignedInteger('fcpu_idle_desktop')->default(0);
            $table->unsignedInteger('ttfb_mobile')->default(0);
            $table->unsignedInteger('ttfb_desktop')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scans');
    }
}
