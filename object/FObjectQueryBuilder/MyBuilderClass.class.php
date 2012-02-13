<?php
// Sample class for FObjectQueryBuilder tests
class MyBuilderClass extends FObject implements FObjectDatabaseStorage {
	public static function getModel () {
		return new FModelManager(array(
			FField::make('builder_field'),
			FField::make('cast_field')
				->storage_options()
					->cast('CHAR(32)')
		));
	}

	public function __toString () {
		return 'MyBuilderClass';
	}

	public static function setup () {
		if (FDB::query("SELECT * FROM objects WHERE object_type = 'MyBuilderClass'")->count() <= 0) {
			$temp = new self();
			$temp->builder_field = 'testing';
			$temp->cast_field = 'characters';
			$temp->update();
		}
	}
}
