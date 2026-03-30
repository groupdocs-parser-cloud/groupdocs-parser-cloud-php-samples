<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example shows how to call the AI Parse operation.
// It sends a document together with a template that defines the fields
// you want the AI to extract (e.g., Invoice Number, Date, Email).
class ParseByAIWithTemplate
{
    public static function Run()
    {
        // Get an instance of the Parse API
        $apiInstance = Utils::GetParseApiInstance();

        // Prepare AI parse options
        $options = new Model\AIParseOptions();

        // Set the file that will be parsed (must be uploaded to storage beforehand)
        $fileInfo = new Model\FileInfo();
        $fileInfo->setFilePath("pdf/Invoice.pdf"); // adjust the path to your file
        $options->setFileInfo($fileInfo);

        // Define a simple template – a map of field names that should be extracted.
        // The values are left empty – the service will fill them.
        $options->setTemplate([
            "InvoiceNum" => "",
            "Date"       => "",
            "Email"      => ""
        ]);

        // Build the request and call the API
        $request = new Requests\AIParseRequest($options);
        $result  = $apiInstance->aiParse($request);

        // Output the extracted values
        echo "AI Parse result:" . PHP_EOL;
        foreach ($result as $field => $value) {
            echo $field . ': ' . $value . PHP_EOL;
        }
        echo PHP_EOL;
    }
}
