<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to delete template file from storage.
class DeleteTemplate
{
    public static function Run()
    {
        $apiInstance = Utils::GetTemplateApiInstance();

        $options = new Model\TemplateOptions();

        TemplateUtils::CreateIfNotExists("templates/template-for-companies.json");
        $options->setTemplatePath("templates/template-for-companies.json");

        $request = new Requests\deleteTemplateRequest($options);
        $response = $apiInstance->deleteTemplate($request);

        echo "Done.\n\n";
    }
}
