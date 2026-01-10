<?php

namespace Darling\PHPCliFormattingUtilities\tests\interfaces\exceptions;

use Darling\PHPCliFormattingUtilities\interfaces\exceptions\CliFormattingException;
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

}
