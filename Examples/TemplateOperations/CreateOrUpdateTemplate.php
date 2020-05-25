<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to save template file in storage.
class CreateOrUpdateTemplate
{
    public static function Run()
    {
        $apiInstance = Utils::GetTemplateApiInstance();

        $options = new Model\CreateTemplateOptions();

        $template = TemplateUtils::GetTemplate();
        $options->setTemplate($template);
        $options->setTemplatePath("templates/template-for-companies.json");

        $request = new Requests\createTemplateRequest($options);
        $response = $apiInstance->createTemplate($request);

        echo "Path to saved template in storage: ", $response->getTemplatePath(), ". Link to download template: ", $response->getUrl() . PHP_EOL;
        echo "\n";
    }
}
