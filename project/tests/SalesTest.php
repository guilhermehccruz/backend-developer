<?php

use Illuminate\Http\UploadedFile;

class SalesTest extends TestCase
{
	/**
	 * Test the sales route with a valid file.
	 *
	 * @return void
	 */
	public function testValidFileUpload()
	{
		$response = $this->call('post', '/sales', [
			'file' => new UploadedFile(base_path('../sales.txt'), 'text/plain', 'text/plain', null, true)
		]);

		$this->assertEquals(200, $response->status());
	}

	/**
	 * Test the sales route with invalid files.
	 *
	 * @return void
	 */
	public function testInvalidFileUpload()
	{
		// Upload valid file type but with invalid value in it
		$response = $this->call('post', '/sales', [
			'file' => new UploadedFile(base_path('../invalidFile.txt'), 'text/plain', 'text/plain', null, true)
		]);

		$this->assertEquals(422, $response->status());

		// Upload invalid file type
		$response = $this->call('post', '/sales', [
			'file' => new UploadedFile(base_path('../invalidFile2.png'), 'image/x-png', 'image/x-png', null, true)
		]);

		$this->assertEquals(500, $response->status());
	}

	/**
	 * Test the sales route withou a file.
	 *
	 * @return void
	 */
	public function testMissingFileInRequest()
	{
		$response = $this->call('post', '/sales', []);

		$this->assertEquals(500, $response->status());
	}
}
