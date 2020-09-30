Merge PDF files
===============

This is wrapper for `pdfbox`
(https://pdfbox.apache.org/).

Install
-------

1. Install java:
    ```
    $ sudo apt install default-jre
    ```
    
2. Install application`pdfbox` from official site
    https://pdfbox.apache.org/download.cgi .
    ```
    $ sudo mkdir -p /usr/local/share/java
    $ sudo mkdir -p /usr/local/bin
    $ cd /usr/local/share/java
    $ sudo wget 'http://apache-mirror.rbc.ru/pub/apache/pdfbox/2.0.6/pdfbox-app-2.0.6.jar'
    $ sudo ln -s pdfbox-app-2.0.6.jar pdfbox-app.jar
    ```
    Create file `/usr/local/bin/pdfbox`:
    ```
    #!/bin/bash
    java -jar '/usr/local/share/java/pdfbox-app.jar' $@
    ```
    Edit file permission:
    ```
    $ sudo chmod 755 /usr/local/bin/pdfbox
    ```
    
3. Install package:
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

