<?php
// Required dependencies and include autoload.php
require_once(__DIR__ . '\vendor\autoload.php');

include(__DIR__ . '\Utils.php');
include(__DIR__ . '\TemplateUtils.php');
include(__DIR__ . '\InfoOperations\GetSupportedFileTypes.php');
include(__DIR__ . '\InfoOperations\GetDocumentInformation.php');
include(__DIR__ . '\InfoOperations\GetContainerItemsInformation.php');

include(__DIR__ . '\ParseOperations\ExtractImages\ExtractImagesByAPageNumberRange.php');
include(__DIR__ . '\ParseOperations\ExtractImages\ExtractImagesFromADocumentInsideAContainer.php');
include(__DIR__ . '\ParseOperations\ExtractImages\ExtractImagesFromTheWholeDocument.php');

include(__DIR__ . '\ParseOperations\ExtractText\ExtractFormattedText.php');
include(__DIR__ . '\ParseOperations\ExtractText\ExtractTextByAPageNumberRange.php');
include(__DIR__ . '\ParseOperations\ExtractText\ExtractTextFromADocumentInsideAContainer.php');
include(__DIR__ . '\ParseOperations\ExtractText\ExtractTextFromTheWholeDocument.php');

include(__DIR__ . '\ParseOperations\ParseByTemplate\ParseByTemplateDefinedAsAnObject.php');
include(__DIR__ . '\ParseOperations\ParseByTemplate\ParseByTemplateOfADocumentInsideAContainer.php');
include(__DIR__ . '\ParseOperations\ParseByTemplate\ParseByTemplateStoredInUserStorage.php');

include(__DIR__ . '\TemplateOperations\CreateOrUpdateTemplate.php');
include(__DIR__ . '\TemplateOperations\DeleteTemplate.php');
include(__DIR__ . '\TemplateOperations\GetTemplate.php');

// Uploading sample files into storage
//Utils::UploadResources();

// Info Examples

GetSupportedFileTypes::Run();
GetDocumentInformation::Run();
GetContainerItemsInformation::Run();

// Parse Examples

ExtractImagesByAPageNumberRange::Run();
ExtractImagesFromADocumentInsideAContainer::Run();
ExtractImagesFromTheWholeDocument::Run();

ExtractFormattedText::Run();
ExtractTextByAPageNumberRange::Run();
ExtractTextFromADocumentInsideAContainer::Run();
ExtractTextFromTheWholeDocument::Run();

ParseByTemplateDefinedAsAnObject::Run();
ParseByTemplateOfADocumentInsideAContainer::Run();
ParseByTemplateStoredInUserStorage::Run();

// Template examples

CreateOrUpdateTemplate::Run();
DeleteTemplate::Run();
GetTemplate::Run();
