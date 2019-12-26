<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMrgsTable extends Migration {

	public function up()
	{
		Schema::create('mrgs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('data_npa');
			$table->string('file_rg_doc');
			$table->string('file_rg_pdf');
			$table->string('naim_act_rg');
			$table->string('naim_plan_bg');
			$table->integer('id_raion');
			$table->string('file_plan_doc');
			$table->string('file_plan_pdf');
			$table->date('date_plan');
			$table->string('file_opros_list_doc');
			$table->string('file_opros_list_pdf');
			$table->string('file_tz');
			$table->string('fio_otvetstven');
		});
	}

	public function down()
	{
		Schema::drop('mrgs');
	}
}