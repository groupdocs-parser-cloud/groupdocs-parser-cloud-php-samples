<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to extract text from pages range.
class ExtractTextByAPageNumberRange
{
    public static function Run()
    {
        $apiInstance = Utils::GetParseApiInstance();

        $options = new Model\TextOptions();

        $fileInfo = new Model\FileInfo();
        $fileInfo->setFilePath("cells/two-worksheets.xlsx");
        $options->setFileInfo($fileInfo);

        $options->setStartPageNumber(1);
        $options->setCountPagesToExtract(1);

        $request = new Requests\textRequest($options);
        $response = $apiInstance->text($request);

        foreach ($response->getPages() as $key => $page) {
            echo "Page index ", $page->getPageIndex(), ". Text: ", $page->getText() . PHP_EOL;
        }
        echo "\n";
    }
}
