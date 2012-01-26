<?php
/*!
 * Functional placeholder for FUpload. Actual FUpload class should not 
 * implement FObjectDatabaseStorage. Storage implementations should be declared 
 * in descendant object classes. This class is here for testing purposes only.
 */
class FUpload extends FObject implements FObjectDatabaseStorage {
	/*!
	 * Builds the model for a generic upload. We capture basic information 
	 * including the original filename (for use later with fpassthru() or 
	 * similar functions), the file size in bytes, the file type as identified 
	 * at upload and the new unique filename of the upload.
	 * 
	 * @return object FModelManager instance
	 */
	public static function getModel() {
		return new FModelManager(
			FField::make('original'),
			FField::make('filename'),
			FField::make('type'),
			FField::make('size')
		);
	}
	/*!
	 * Returns the path and stored filename associated with this object instance.
	 * 
	 * @return string Upload path and filename 
	 */
	public function __toString () {
		return isset($this->filename) ? $this->getDirectory() . $this->filename : "";
	}
	/*!
	 * This is a collective method that executes all the steps necessary to 
	 * process uploaded file data, create the new object instance and move the
	 * file to its final filesystem location.
	 * 
	 * @param $file_data The contents of $_FILES[{field}]
	 * @param $upload Optional instance of a descendant object
	 * @return integer Object id of the Upload object or descendant object
	 */
	public static function saveFile ($file_data, $upload = null) {
		if ($upload === null) {
			$upload = new self();
		}
		$data = $upload::process($file_data);
		if (!is_array($data)) {
			return $data;
		}
		foreach ($data as $field => $value) {
			$upload->$field = $value;
		}
		$upload->update();
		$upload->filename = $upload->newFilename($upload->id, $upload->original);
		$destination = sprintf("%s%s",
			$upload->getDirectory(true),
			$upload->filename
		);
		move_uploaded_file($file_data['tmp_name'], $destination);
		$upload->update();
		return $upload->id;
	}
	/*!
	 * Performs pre-upload and pre-save checks on uploaded file information. 
	 * This method is easily extended by descendant objects. Simply execute 
	 * parent::process($file_data) first, then perform additional checks and 
	 * return an associative array.
	 * 
	 * @param $file_data The contents of $_FILES[{field}]
	 * @return array Associative array of validated / processed upload data
	 */
	public static function process ($file_data) {
		if (!is_array($file_data)) {
			return null;
		}
		if ($file_data['error'] != UPLOAD_ERR_OK) {
			return $file_data['error'];
		}
		$info = array();
		$info['original'] = $file_data['name'];
		$info['type'] = $file_data['type'];
		$info['size'] = $file_data['size'];
		return $info;
	}
	/*!
	 * Generates a new unique filename and returns it as a string.
	 * 
	 * @param $prefix The string value that should be prepended to the uploaded file name
	 * @param $filename The filename provided during upload
	 * @return string The new filename
	 */
	public function newFilename ($prefix, $filename) {
		// Determine file name and storage location
		return sprintf("%s-%s",
			$prefix,
			preg_replace('/[^\w.]+/', '_', $filename)
		);
	}
	/*!
	 * Returns the final upload directory as a string.
	 * 
	 * @param $filesystem Boolean
	 */
	public function getDirectory ($filesystem = false) {
		$subdir = (int)(($this->id + 999) / 1000) * 1000;
		$directory = sprintf("/uploads/%d/", $subdir);
		if ($filesystem) {
			$directory = sprintf("%s%s",
				isset($_ENV['config']['uploads.dir']) ? $_ENV['config']['uploads.dir'] : SITEROOT,
				$directory
			);
		}
		if ($filesystem && !file_exists($directory)) {
			mkdir($directory, 0755, true);
			chmod($directory, 0755);
		}
		return $directory;
	}
}
