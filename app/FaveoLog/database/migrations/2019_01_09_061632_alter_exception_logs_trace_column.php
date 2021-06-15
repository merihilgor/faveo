<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterExceptionLogsTraceColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('exception_logs', function (Blueprint $table) {
          $table->text('trace', 5000)->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('exception_logs', function (Blueprint $table) {
          $table->string('trace')->change();
      });
    }
}
