<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->enum('leave_type', ['sick', 'personal', 'vacation']);
            $table->text('leave_cause');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('leave_status', ['requested', 'approved', 'reject']);
            $table->unsignedBigInteger('commander');
            $table->foreign('commander')->references('id')->on('employees')->onDelete('cascade');
            $table->text('note')->nullable();
            $table->dateTime('created_at');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('employees')->onDelete('cascade');
            $table->dateTime('approved_at')->nullable();
            $table->integer('approved_by')->nullable();
            $table->dateTime('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_leaves');
    }
}
