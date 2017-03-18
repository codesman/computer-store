<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {
	private $table = "products";

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$foreign = (object) [
			"key"   => "manufacturer_id",
			"table" => "manufacturers",
		];

		Schema::create( $this->table, function ( Blueprint $table ) use ( $foreign ) {
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->decimal( 'price', 5, 2 );
			$table->integer( "{$foreign->key}" )->unsigned();
			$table->foreign( "{$foreign->key}" )->references( 'id' )->on( $foreign->table );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( $this->table );
	}
}
