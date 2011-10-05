<?php
class MyWhereClass extends FObject implements FObjectDatabaseStorage {
	public static function getModel () {
		return new FModelManager(array(
		));
	}
}
