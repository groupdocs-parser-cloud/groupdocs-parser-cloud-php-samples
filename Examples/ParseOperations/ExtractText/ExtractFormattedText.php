<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to extract formatted text from document.
class ExtractFormattedText
{
    public static function Run()
    {
        $apiInstance = Utils::GetParseApiInstance();

        $options = new Model\TextOptions();

        $fileInfo = new Model\FileInfo();
        $fileInfo->setFilePath("words-processing/docx/formatted-document.docx");
        $options->setFileInfo($fileInfo);

        $textOpts = new Model\FormattedTextOptions();
        $textOpts->setMode("Markdown");
        $options->setFormattedTextOptions($textOpts);

        $request = new Requests\textRequest($options);
        $response = $apiInstance->text($request);

        echo "Text: ", $response->getText() . PHP_EOL;
        echo "\n";
    }
}
