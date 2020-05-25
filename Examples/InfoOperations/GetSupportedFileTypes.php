<?php

// This example demonstrates how to obtain all supported document formats
class GetSupportedFileTypes
{
    public static function Run()
    {
        $infoApi = Utils::GetInfoApiInstance();

        $response = $infoApi->getSupportedFileFormats();

        foreach ($response->getFormats() as $key => $value) {
            echo "extension ", $value->getExtension(), ", format ", $value->getFileFormat() . PHP_EOL;
        }
        echo "\n";
    }
}
