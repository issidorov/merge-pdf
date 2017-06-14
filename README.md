Merge PDF files
===============

This is wrapper on `pdfbox`
(https://pdfbox.apache.org/).

Install
-------

1. Install application`pdfbox`.
2. Install this package:
```
$ composer require issidorov/merge-pdf
```

Example
-------
```
use issidorov\mergePdf\MergePdf;

$pdf = new MergePdf([
    $filename1,
    $filename2,
    $filename3
]);

$pdf->appendFile($filename);

$pdf->writeToFile($filename);
$filename = $pdf->writeToTmpFile();
```

