<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to parse a document placed inside a container.
class ParseByTemplateOfADocumentInsideAContainer
{
    public static function Run()
    {
        $apiInstance = Utils::GetParseApiInstance();

        $options = new Model\ParseOptions();

        $fileInfo = new Model\FileInfo();
        $fileInfo->setFilePath("containers/archive/companies.zip");
        $options->setFileInfo($fileInfo);

        $template = TemplateUtils::GetTemplate();
        $options->setTemplate($template);

        $containerItemInfo = new Model\ContainerItemInfo(array("relativePath" => "companies.docx"));
        $options->setContainerItemInfo($containerItemInfo);

        $request = new Requests\parseRequest($options);
        $response = $apiInstance->parse($request);

        foreach ($response->getFieldsData() as $key => $data) {
            if ($data->getPageArea()->getPageTextArea() != null) {
                echo "Field name: ", $data->getName(), ". Text : ", $data->getPageArea()->getPageTextArea()->getText() . PHP_EOL;
            }

            if ($data->getPageArea()->getPageTableArea() != null) {
                echo "Table name: ", $data->getName() . PHP_EOL;
                foreach ($data->getPageArea()->getPageTableArea()->getPageTableAreaCells() as $key => $cell) {
                    echo "Table cell. Row ", $cell->getRowIndex() . " column ", $cell->getColumnIndex(), ". Text: ", $cell->getPageArea()->getPageTextArea()->getText() . PHP_EOL;
                }
            }
        }
        echo "\n";
    }
}
