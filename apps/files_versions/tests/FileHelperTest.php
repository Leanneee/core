<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\Files_Versions\Tests;

use OCA\Files_Versions\FileHelper;

class FileHelperTest extends \Test\TestCase {
	/**
	 * @dataProvider dataTestGetPathAndRevision
	 * @param string $path
	 * @param string[][] $expectedVersionInfo
	 */
	public function testGetPathAndRevision($path, $expectedVersionInfo) {
		$fileHelper = new FileHelper();
		$versionInfo = $fileHelper->getPathAndRevision($path);
		$this->assertEquals($expectedVersionInfo['path'], $versionInfo['path']);
		$this->assertEquals($expectedVersionInfo['revision'], $versionInfo['revision']);
	}

	public function dataTestGetPathAndRevision() {
		return [
			[
				'files_versions/name.txt.v1548687210',
				[
					'path' => 'files_versions/name.txt',
					'revision' => '1548687210'
				],
				'files_versions/somepath/name.txt.v1548687211',
				[
					'path' => 'files_versions/somepath/name.txt',
					'revision' => '1548687211'
				],
				'files_versions/somepath.v1548687210/name.txt.v1548687214',
				[
					'path' => 'files_versions/somepath.v1548687210/name.txt',
					'revision' => '1548687214'
				],
			]
		];
	}
}
