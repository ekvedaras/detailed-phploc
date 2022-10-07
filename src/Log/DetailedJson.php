<?php declare(strict_types=1);
/*
 * This file is part of PHPLOC.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\PHPLOC\Log;

use const JSON_PRETTY_PRINT;
use function array_merge;
use function file_put_contents;
use function json_encode;

final class DetailedJson
{
    public function printResult(string $filename, array $aggregatedCounts, array $fileCounts): void
    {
        $cwd = getcwd();
        $report = array_combine(
            array_merge(['total'], array_map(function (string $file) use ($cwd) {
                $file = realpath($file);
                return str_replace($cwd, '', $file);
            }, array_keys($fileCounts))),
            array_map([$this, 'prepareReport'], ['total' => $aggregatedCounts] + $fileCounts)
        );

        file_put_contents(
            $filename,
            json_encode($report, JSON_PRETTY_PRINT)
        );
    }

    private function prepareReport(array $count): array
    {
        $directories = [];

        if ($count['directories'] > 0) {
            $directories = [
                'directories' => $count['directories'],
                'files'       => $count['files'],
            ];
        }

        unset($count['directories'], $count['files']);

        return array_merge($directories, $count);
    }
}
