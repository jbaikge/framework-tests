<?php
class MyStorageObject extends FObject implements FObjectDatabaseStorage {
	public static function getModel () {
		return new FModelManager(array(
			FField::make('first_name'),
			FField::make('last_name'),
			FField::make('ignore_me')
				->storage_database_options()
					->ignore(true),
			FField::make('password'),
			FField::make('salt'),
		)); 
	}
}