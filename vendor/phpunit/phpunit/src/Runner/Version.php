<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

use SebastianBergmann\Version as VersionId;

final class Version
{
    /**
     * @var string
     */
    private static $pharVersion = '';

    /**
     * @var string
     */
    private static $version = '';

    /**
     * Returns the current version of PHPUnit.
     */
    public static function id(): string
    {
        if (self::$pharVersion !== '') {
            return self::$pharVersion;
        }

        if (self::$version === '') {
<<<<<<< HEAD
            self::$version = (new VersionId('8.5.8', \dirname(__DIR__, 2)))->getVersion();
=======
            self::$version = (new VersionId('8.5.6', \dirname(__DIR__, 2)))->getVersion();
>>>>>>> ca06f3736ca28c7c52a74d0ff9524246336f6d76
        }

        return self::$version;
    }

    public static function series(): string
    {
        if (\strpos(self::id(), '-')) {
            $version = \explode('-', self::id())[0];
        } else {
            $version = self::id();
        }

        return \implode('.', \array_slice(\explode('.', $version), 0, 2));
    }

    public static function getVersionString(): string
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }

    public static function getReleaseChannel(): string
    {
        if (\strpos(self::$pharVersion, '-') !== false) {
            return '-nightly';
        }

        return '';
    }
}
