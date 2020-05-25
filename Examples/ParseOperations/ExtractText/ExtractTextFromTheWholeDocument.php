<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to extract text from whole document.
class ExtractTextFromTheWholeDocument
{
    public static function Run()
    {
        $apiInstance = Utils::GetParseApiInstance();

        $options = new Model\TextOptions();

        $fileInfo = new Model\FileInfo();
        $fileInfo->setFilePath("email/eml/embedded-image-and-attachment.eml");
        $options->setFileInfo($fileInfo);

        $request = new Requests\textRequest($options);
        $response = $apiInstance->text($request);

        echo "Text: ", $response->getText() . PHP_EOL;
        echo "\n";
    }
}
