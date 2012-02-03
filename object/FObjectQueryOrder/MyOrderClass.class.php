<?php
// Simple class for working with FObjectQueryOrder tests.
class MyOrderClass extends FObject implements FObjectDatabaseStorage {
	public static function getModel () {
		return new FModelManager(array(
			FField::make('text_field'),
			FField::make('int_field')
		));
	}
}
