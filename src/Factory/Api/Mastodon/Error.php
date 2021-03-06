<?php
/**
 * @copyright Copyright (C) 2010-2021, the Friendica project
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

namespace Friendica\Factory\Api\Mastodon;

use Friendica\BaseFactory;
use Friendica\Core\System;
use Friendica\DI;

class Error extends BaseFactory
{
	public function RecordNotFound()
	{
		$error = DI::l10n()->t('Record not found');
		$error_description = '';
		$errorobj = New \Friendica\Object\Api\Mastodon\Error($error, $error_description);

		System::jsonError(404, $errorobj->toArray());
	}

	public function UnprocessableEntity(string $error = '')
	{
		$error = $error ?: DI::l10n()->t('Unprocessable Entity');
		$error_description = '';
		$errorobj = New \Friendica\Object\Api\Mastodon\Error($error, $error_description);

		System::jsonError(422, $errorobj->toArray());
	}

	public function Unauthorized(string $error = '')
	{
		$error = $error ?: DI::l10n()->t('Unauthorized');
		$error_description = '';
		$errorobj = New \Friendica\Object\Api\Mastodon\Error($error, $error_description);

		System::jsonError(401, $errorobj->toArray());
	}

	public function Forbidden(string $error = '')
	{
		$error = $error ?: DI::l10n()->t('Token is not authorized with a valid user or is missing a required scope');
		$error_description = '';
		$errorobj = New \Friendica\Object\Api\Mastodon\Error($error, $error_description);

		System::jsonError(403, $errorobj->toArray());
	}

	public function InternalError(string $error = '')
	{
		$error = $error ?: DI::l10n()->t('Internal Server Error');
		$error_description = '';
		$errorobj = New \Friendica\Object\Api\Mastodon\Error($error, $error_description);

		System::jsonError(500, $errorobj->toArray());
	}
}
