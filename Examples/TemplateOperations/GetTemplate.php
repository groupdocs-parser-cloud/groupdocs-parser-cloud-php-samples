<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to get template file from storage.
class GetTemplate
{
    public static function Run()
    {
        $apiInstance = Utils::GetTemplateApiInstance();

        $options = new Model\TemplateOptions();

        TemplateUtils::CreateIfNotExists("templates/template-for-companies.json");
        $options->setTemplatePath("templates/template-for-companies.json");

        $request = new Requests\getTemplateRequest($options);
        $response = $apiInstance->getTemplate($request);
        foreach ($response->getFields() as $key => $field) {
            echo "Field: ", $field->getFieldName() . PHP_EOL;
        }

        foreach ($response->getTables() as $key => $table) {
            echo "Table: ", $table->getTableName() . PHP_EOL;
        }
        echo "\n";
    }
}
