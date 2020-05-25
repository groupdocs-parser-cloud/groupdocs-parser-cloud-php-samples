<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to get document information
class GetDocumentInformation {
    public static function Run() {
        $apiInstance = Utils::GetInfoApiInstance();

		$options = new Model\InfoOptions();

		$fileInfo = new Model\FileInfo();
		$fileInfo->setFilePath("words-processing/docx/password-protected.docx");
		$fileInfo->setPassword("password");				
        $options->setFileInfo($fileInfo);

		$request = new Requests\getInfoRequest($options);
		$response = $apiInstance->getInfo($request);

		echo "Format: ", $response->getFileType()->getFileFormat() . PHP_EOL;
		echo "Page count: ", $response->getPageCount() . PHP_EOL;
        echo "\n";                          
    }
}
