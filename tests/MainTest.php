<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/MergePdf.php';

use issidorov\mergePdf\MergePdf;
use PHPUnit\Framework\TestCase;


class MainTest extends TestCase
{
    public function testMergeToFile()
    {
        $outFile = __DIR__ . '/result.pdf';

        if (file_exists($outFile)) {
            unlink($outFile);
        }

        $pdf = new MergePdf([
            __DIR__ . '/assets/pdf-sample.pdf',
            __DIR__ . '/assets/sample.pdf',
        ]);

        $pdf->writeToFile($outFile);

        $this->assertFileExists($outFile);
    }
}