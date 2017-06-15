<?php

namespace issidorov\mergePdf;


use Exception;

class MergePdf
{
    private $filenames = [];

    public function __construct($filenames = [])
    {
        foreach ($filenames as $filename) {
            $this->appendFile($filename);
        }
    }

    public function appendFile($filename)
    {
        $path = realpath($filename);

        if ($path !== false) {
            $this->filenames[] = $path;
        } else {
            throw new Exception('File not found');
        }
    }

    public function writeToFile($filename)
    {
        $args = [];

        foreach ($this->filenames as $_filename) {
            $args[] = escapeshellarg($_filename);
        }

        $args[] = escapeshellarg($filename);

        $command = 'pdfbox PDFMerger ' . implode(' ', $args);

        exec($command);

        if (!file_exists($filename)) {
            throw new Exception('Invalid merge pdf files');
        }
    }

    public function writeToTmpFile()
    {
        $tmpFileName = tempnam(sys_get_temp_dir(), 'merge-pdf-');
        $this->writeToFile($tmpFileName);
        return $tmpFileName;
    }
}