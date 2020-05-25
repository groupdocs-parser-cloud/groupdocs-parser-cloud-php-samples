<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to extract text from container item.
class ExtractTextFromADocumentInsideAContainer
{
    public static function Run()
    {
        $apiInstance = Utils::GetParseApiInstance();

        $options = new Model\TextOptions();

        $fileInfo = new Model\FileInfo();
        $fileInfo->setFilePath("pdf/PDF with attachements.pdf");
        $fileInfo->setPassword("password");
        $options->setFileInfo($fileInfo);

        $containerItemInfo = new Model\ContainerItemInfo(array("relativePath" => "template-document.pdf"));
        $options->setContainerItemInfo($containerItemInfo);

        $options->setStartPageNumber(2);
        $options->setCountPagesToExtract(1);

        $request = new Requests\textRequest($options);
        $response = $apiInstance->text($request);

        foreach ($response->getPages() as $key => $page) {
            echo "Page index ", $page->getPageIndex(), " page. Text: ", $page->getText() . PHP_EOL;
        }
        echo "\n";
    }
}
