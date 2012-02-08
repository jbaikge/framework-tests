<?php
class MyWhereClass extends FObject implements FObjectDatabaseStorage {
	public static function getModel () {
		return new FModelManager(array(
			FField::make('field1'),
			FField::make('field2'),
			FField::make('field3')
		));
	}
}
