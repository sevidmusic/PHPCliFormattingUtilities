<?php

namespace Darling\PHPCliFormattingUtilities\tests\classes\exceptions;

use \Darling\PHPCliFormattingUtilities\classes\exceptions\CliFormattingException;
use \Darling\PHPCliFormattingUtilities\tests\PHPCliFormattingUtilitiesTest;
use \Darling\PHPCliFormattingUtilities\tests\interfaces\exceptions\CliFormattingExceptionTestTrait;
use \PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CliFormattingException::class)]
class CliFormattingExceptionTest extends PHPCliFormattingUtilitiesTest
{

    /**
     * The CliFormattingExceptionTestTrait defines
     * common tests for implementations of the
     * Darling\PHPCliFormattingUtilities\interfaces\exceptions\CliFormattingException
     * interface.
     *
     * @see CliFormattingExceptionTestTrait
     *
     */
    use CliFormattingExceptionTestTrait;

    public function setUp(): void
    {
        $this->setCliFormattingExceptionTestInstance(
            new CliFormattingException()
        );
    }
}

