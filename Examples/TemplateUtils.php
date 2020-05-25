<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

class TemplateUtils
{
    public static function CreateIfNotExists(string $path)
    {
        $storageApi = Utils::GetStorageApiInstance();
        $isExistRequest = new Requests\objectExistsRequest($path);
        $isExistResponse = $storageApi->objectExists($isExistRequest);

        if (!$isExistResponse->getExists()) {
            $apiInstance = Utils::GetTemplateApiInstance();

            $options = new Model\CreateTemplateOptions();
            $template = self::GetTemplate();
            $options->setTemplate($template);
            $options->setTemplatePath($path);
            $options->setStorageName(Utils::$MyStorage);

            $request = new Requests\createTemplateRequest($options);

            $apiInstance->createTemplate($request);
        }
    }
    public static function GetTemplate()
    {
        $field1 = new Model\Field();
        $field1->setFieldName("Address");
        $fieldPosition1 = new Model\FieldPosition();
        $fieldPosition1->setFieldPositionType("Regex");
        $fieldPosition1->setRegex("Company address:");
        $field1->setFieldPosition($fieldPosition1);

        $field2 = new Model\Field();
        $field2->setFieldName("CompanyAddress");
        $fieldPosition2 = new Model\FieldPosition();
        $fieldPosition2->setFieldPositionType("Linked");
        $fieldPosition2->setLinkedFieldName("ADDRESS");
        $fieldPosition2->setIsRightLinked(true);

        $searchArea = new Model\Size();
        $searchArea->setWidth(100);
        $searchArea->setHeight(10);
        $fieldPosition2->setSearchArea($searchArea);
        $fieldPosition2->setAutoScale(false);
        $field2->setFieldPosition($fieldPosition2);

        $field3 = new Model\Field();
        $field3->setFieldName("Company");
        $fieldPosition3 = new Model\FieldPosition();
        $fieldPosition3->setFieldPositionType("Regex");
        $fieldPosition3->setRegex("Company name:");
        $field3->setFieldPosition($fieldPosition3);

        $field4 = new Model\Field();
        $field4->setFieldName("CompanyName");
        $fieldPosition4 = new Model\FieldPosition();
        $fieldPosition4->setFieldPositionType("Linked");
        $fieldPosition4->setLinkedFieldName("Company");
        $fieldPosition4->setIsRightLinked(true);

        $searchArea4 = new Model\Size();
        $searchArea4->setWidth(100);
        $searchArea4->setHeight(10);
        $fieldPosition4->setSearchArea($searchArea4);
        $fieldPosition4->setAutoScale(false);
        $field4->setFieldPosition($fieldPosition4);

        $table = new Model\Table();
        $table->setTableName("Companies");
        $detectorparams = new Model\DetectorParameters();
        $rect = new Model\Rectangle();
        $size = new Model\Size(array("height" => 60, "width" => 480));
        $rect->setSize($size);
        $point = new Model\Point(array("x" => 77, "y" => 279));
        $rect->setPosition($point);

        $detectorparams->setRectangle($rect);
        $table->setDetectorParameters($detectorparams);

        $fields = array($field1, $field2, $field3, $field4);
        $tables = array($table);
        $options = new Model\Template();
        $options->setFields($fields);
        $options->setTables($tables);

        return $options;
    }
}
