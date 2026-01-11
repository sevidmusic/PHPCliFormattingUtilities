<?php

namespace Darling\PHPCliFormattingUtilities\tests\interfaces\exceptions;

use Darling\PHPCliFormattingUtilities\interfaces\exceptions\CliFormattingException;
use Darling\PHPCliFormattingUtilities\classes\exceptions\CliFormattingException as CliFormattingExceptionInstance;
use PHPUnit\Framework\Attributes\CoversClass;

/**
 * The CliFormattingExceptionTestTrait defines common tests for
 * implementations of the CliFormattingException interface.
 *
 * @see CliFormattingException
 *
 */
#[CoversClass(CliFormattingException::class)]
trait CliFormattingExceptionTestTrait
{
    /**
     * @var CliFormattingException $cliFormattingException
     *                              An instance of a
     *                              CliFormattingException
     *                              implementation to test.
     */
    protected CliFormattingException $cliFormattingException;

    /**
     * Set up an instance of a CliFormattingException implementation to test.
     *
     * This method must set the CliFormattingException implementation instance
     * to be tested via the setCliFormattingExceptionTestInstance() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUp(): void
     * {
     *     $this->setCliFormattingExceptionTestInstance(
     *         new \Darling\PHPCliFormattingUtilities\classes\exceptions\CliFormattingException()
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the CliFormattingException implementation instance to test.
     *
     * @return CliFormattingException
     *
     */
    protected function cliFormattingExceptionTestInstance(): CliFormattingException
    {
        return $this->cliFormattingException;
    }

    /**
     * Set the CliFormattingException implementation instance to test.
     *
     * @param CliFormattingException $cliFormattingExceptionTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the CliFormattingException
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setCliFormattingExceptionTestInstance(
        CliFormattingException $cliFormattingExceptionTestInstance,
    ): void {
        $this->cliFormattingException = $cliFormattingExceptionTestInstance;
    }

    public function testCliFormattingExceptionCanBeThrown(): void
    {
        $this->expectException(CliFormattingException::class);
        $this->throwCliFormattingException(
            'A formatting error occured.'
            . 'Triggered by: testCliFormattingExceptionCanBeThrown',
        );
    }

    public function testCliFormattingExceptionCanBeThrownWithSpecifiedMessage(): void
    {
        $message = 'A formatting error occured.'
            . 'Triggered by: testCliFormattingExceptionCanBeThrownWithSpecifiedMessage';
        $this->expectException(CliFormattingException::class);
        $this->expectExceptionMessage($message);
        $this->throwCliFormattingException($message);
    }

    private function throwCliFormattingException(string $message = ''): void
    {
        throw new CliFormattingExceptionInstance($message);
    }

    /**
     * Reports an error identified by $message if $condition is false.
     *
     * Note: This method should be inherited from the
     *       PHPUnit\Framework\TestCase class.
     *
     * @param bool $condition The value to test.
     *
     * @param string $message A message to show if the test case
     *                        failed.
     *
     * @see PHPUnit\Framework\TestCase
     */
    abstract public static function assertTrue(bool $condition, string $message = ''): void;

    /**
     * Excpect that the specified Exception is thrown.
     *
     * Note: This method should be inherited from the
     *       PHPUnit\Framework\TestCase class.
     *
     * @see PHPUnit\Framework\TestCase
     */
    abstract public function expectException(string $exception): void;

    /**
     * Excpect that the specified Exception message was thrown.
     *
     * Note: This method should be inherited from the
     *       PHPUnit\Framework\TestCase class.
     *
     * @see PHPUnit\Framework\TestCase
     */
    abstract public function expectExceptionMessage(string $exception): void;
}
