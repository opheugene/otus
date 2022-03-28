<?php declare(strict_types=1);

final class Equation
{
    const PRECISE = 4;

    public static function solve(float $a, float $b, float $c): array
    {
        if (self::equalToZero($a)) {
            throw new InvalidArgumentException('"a" cannot be equal to 0');
        }

        if (self::equalToZero($b)) {
            if (self::lessThanZero($c)) {
                $x1 = sqrt(abs($c / $a));
                $x2 = -$x1;
            } elseif (self::equalToZero($c)) {
                $x1 = $x2 = 0;
            } else {
                return [];
            }
        } else {
            $d = $b * $b - 4 * $a * $c;
            if (self::greaterThanZero($d)) {
                $x1 = (-$b + sqrt($d)) / 2 * $a;
                $x2 = (-$b - sqrt($d)) / 2 * $a;
            } elseif (self::equalToZero($d)) {
                $x1 = $x2 = (-$b) / 2 * $a;
            } else {
                return [];
            }
        }

        return [$x1, $x2];
    }

    private static function equalToZero(float $f): bool
    {
        return 0 === bccomp(number_format($f, 10), '0', self::PRECISE);
    }

    private static function greaterThanZero(float $f): bool
    {
        return 1 === bccomp(number_format($f, 10), '0', self::PRECISE);
    }

    private static function lessThanZero(float $f): bool
    {
        return -1 === bccomp(number_format($f, 10), '0', self::PRECISE);
    }
}
