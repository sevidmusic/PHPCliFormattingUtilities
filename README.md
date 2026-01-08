The following classes will be provided by this library:

```php
<?php

declare(strict_types=1);

/**
 * Custom exception for CliColorizer failures.
 */
class CliColorizerException extends Exception {}

/**
 * --- VALUE CLASS: RgbColor ---
 * Handles RGB components using PHP 8.5 Property Hooks for automatic clamping.
 * * @property-read int<0, 255> $r
 * @property-read int<0, 255> $g
 * @property-read int<0, 255> $b
 */
readonly class RgbColor
{
    /** @var int<0, 255> */
    public int $r {
        set => max(0, min(255, $value));
    }

    /** @var int<0, 255> */
    public int $g {
        set => max(0, min(255, $value));
    }

    /** @var int<0, 255> */
    public int $b {
        set => max(0, min(255, $value));
    }

    /**
     * @param int<0, 255> $r
     * @param int<0, 255> $g
     * @param int<0, 255> $b
     */
    public function __construct(int $r, int $g, int $b)
    {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
    }

    /**
     * Factory to create an RgbColor from a Hexadecimal string.
     * * @param string $hex Supports #FFF, #FFFFFF, FFF, FFFFFF.
     * @return self
     */
    public static function fromHex(string $hex): self
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = "{$hex[0]}{$hex[0]}{$hex[1]}{$hex[1]}{$hex[2]}{$hex[2]}";
        }

        /** @var array{0: string, 1: string, 2: string} $parts */
        $parts = str_split($hex, 2);

        // hexdec returns an int/float; in this context, always an int.
        return new self(
            hexdec($parts[0]),
            hexdec($parts[1]),
            hexdec($parts[2])
        );
    }

    /**
     * Provides the raw ANSI-formatted RGB string.
     */
    public function __toString(): string
    {
        return "{$this->r};{$this->g};{$this->b}";
    }
}

/**
 * --- VALUE CLASS: ColorizeParams ---
 * DTO for styling configuration.
 */
readonly class ColorizeParams
{
    public function __construct(
        public string $text,
        public RgbColor $bg,
        public RgbColor $fg,
        public bool $padded = false
    ) {}
}

/**
 * --- MAIN CLASS: CliColorizer ---
 * Provides 24-bit TrueColor ANSI styling, TTY aware.
 */
class CliColorizer
{
    private const string ESC = "\033[";
    private const string RESET = "\033[0m";

    /**
     * Applies styling based on params, but only if the output is a TTY.
     * * @param ColorizeParams $params
     * @return string
     * @throws CliColorizerException
     */
    public static function apply(ColorizeParams $params): string
    {
        $content = $params->padded ? " {$params->text} " : $params->text;

        if (!self::isTty()) {
            return $content;
        }

        // Uses implicit __toString() conversion via curly braces.
        return self::ESC . "48;2;{$params->bg}m" .
               self::ESC . "38;2;{$params->fg}m" .
               $content .
               self::RESET;
    }

    /**
     * Internal check for TTY status without error suppression or type casting.
     * * @throws CliColorizerException if STDOUT is invalid in a CLI context.
     */
    private static function isTty(): bool
    {
        if (!defined('STDOUT') || !is_resource(STDOUT)) {
            if (PHP_SAPI === 'cli') {
                throw new CliColorizerException("STDOUT is not a valid resource; terminal detection failed.");
            }
            return false;
        }

        if (function_exists('posix_isatty')) {
            return posix_isatty(STDOUT);
        }

        $term = getenv('TERM');

        // Logic evaluates to bool naturally via strict comparison.
        return $term !== false && $term !== 'dumb';
    }
}
```
```
```
