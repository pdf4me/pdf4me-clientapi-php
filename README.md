The [Pdf4me Client API](https://developer.pdf4me.com/docs/api/getting-started/) is a PHP package which connects to its highly scalable SaaS cloud service with many functionalities 
to solve your document and PDF requirements. The SaaS API provides expert functionality to convert, optimize, compress, 
produce, merge, split, ocr, enrich, archive, rotate, protect, validate, repair, print documents and PDF's.

Feature | Description 
------------ | ------------- 
[**Optimize**](https://developer.pdf4me.com/docs/api/basic-functionality/optimize/) | PDF's can often be optimized by removing structural redundancy. This leads to much smaller PDF's.
[**Merge**](https://developer.pdf4me.com/docs/api/basic-functionality/merge-pdfs/) | Multiple PDF's can be merged into single optimized PDFs.
[**Split**](https://developer.pdf4me.com/docs/api/basic-functionality/split-pdf/) | A PDF can be splitted into multiple PDF's.
[**Extract**](https://developer.pdf4me.com/docs/api/basic-functionality/extract-pdf/) | From a PDF extract multiple pages into a new document.
[**OCR**](https://developer.pdf4me.com/docs/api/basic-functionality/ocr/) | Create a searchable OCR Document out of your scans or images.
[**Images**](https://developer.pdf4me.com/docs/api/basic-functionality/create-image/) | Extract images from your document, can be any type of document.
[**Create Pdf/A**](https://developer.pdf4me.com/docs/api/basic-functionality/pdfa/) | Create a archive conform PDF/A including xmp Metadata.
[**Convert to PDF**](https://developer.pdf4me.com/docs/api/basic-functionality/convert-to-pdf/) | Convert your documents from any format to a proper PDF document.
[**Stamp**](https://developer.pdf4me.com/docs/api/basic-functionality/stamp/) | Stamp your document with text or images.
[**Rotate**](https://developer.pdf4me.com/docs/api/basic-functionality/rotate-pdf/) | Rotates pages in your document.
[**Protect**](https://developer.pdf4me.com/docs/api/basic-functionality/protect/) | Protects or Unlocks your document with given password.
[**Validation**](https://developer.pdf4me.com/docs/api/basic-functionality/validate/) | Validate your document for PDF/A compliance.
[**Repair**](https://developer.pdf4me.com/docs/api/basic-functionality/repair/) | Repairs your document.
[**Barcode**](https://developer.pdf4me.com/docs/api/basic-functionality/barcode/) | Reads all types of barcode embedded in document or creates them


## Installation

The Pdf4me PHP API client can be installed using [Composer](https://getcomposer.org/).

### Composer

To install run `composer require pdf4me/pdf4me_api_client_php:"dev-master"`


## Getting Started

To get started get a Token by dropping us an [email](mailto:support-dev@pdf4me.com) or registering in our [portal](https://portal.pdf4me.com/).

The Token is required for Authentication. The Pdf4me Client Api provides you already with the necessary implementation. You need only to get an instance for the Pdf4meClient as shown in the sample below.

``` php
// load Composer
require 'vendor/autoload.php';

use Pdf4me\API\HttpClient as pdf4meAPI;

$token = "6fg********jdS"; // replace this with your token
$apiurl = 'https://api**.***.com';
$client = new pdf4meAPI($token,$apiurl); // $token is compulsary and $apiurl are optional


# The pdf4meClient object delivers the necessary authentication when instantiating the different pdf4meClients such as for instance Merge

$pdfMerge = $client->pdf4me()->merge([
          "documents"=> [
              [
		'name' => 'test1.pdf',
    		'docData' => $client->getFileData('/var/www/test1.pdf')
], [
		'name' => 'test.pdf',
    		'docData' => $client->getFileData('/var/www/test.pdf')
]]

    ]);

print_r($pdfMerge);
```

## Documentation

Please visit our [documentation](https://developer.pdf4me.com/docs/api/) for more information about all the functionalities provided and on how to use pdf4me.

#### PDF4me Consumer
Those who are looking for PDF4me online tool can find it at [PDF4me.com](https://pdf4me.com/)
