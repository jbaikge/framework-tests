<?php
$definition = array(
	FField::make('author')
		->storage_options()
			->foreignKey('User'),
	FField::make('title')
		->length(150)
		->storage_xml_options()
			->cdata(true),
	FField::make('url')
		->form_options()
			->type('FURLField'),
	FField::make('date')
		->timestamp(true)
		->insertOnly(true)
		->form_options()
			->disabled(true)
			->type('FFreeFormDateField')
			->label('News Date')
			->default('now')
		->storage_xml_options()
			->disabled(true)
		->storage_xml_salesforce_options()
			->ignore(true),
	FField::make('body')
		->longtext(true)
);
