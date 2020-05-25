<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to extract images from whole document.
class ExtractImagesFromTheWholeDocument
{
	public static function Run()
	{
		$apiInstance = Utils::GetParseApiInstance();

		$options = new Model\ImagesOptions();

		$fileInfo = new Model\FileInfo();
		$fileInfo->setFilePath("slides/three-slides.pptx");
		$options->setFileInfo($fileInfo);

		$request = new Requests\imagesRequest($options);
		$response = $apiInstance->images($request);

		foreach ($response->getImages() as $key => $image) {
			echo "Image path in storage: ", $image->getPath(), ". Download url: ", $image->getDownloadUrl() . PHP_EOL;
		}
		echo "\n";
	}
}
