<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to extract images from pages range.
class ExtractImagesByAPageNumberRange {
    public static function Run() {
        $apiInstance = Utils::GetParseApiInstance();

		$options = new Model\ImagesOptions();

		$fileInfo = new Model\FileInfo();
		$fileInfo->setFilePath("slides/three-slides.pptx");				
		$options->setFileInfo($fileInfo);
		
		$options->setStartPageNumber(1);
        $options->setCountPagesToExtract(2);

		$request = new Requests\imagesRequest($options);
		$response = $apiInstance->images($request);

		foreach ($response->getPages() as $key => $page) {
			echo "Images from ", $page->getPageIndex(), " page." . PHP_EOL;
			foreach ($page->getImages() as $key => $image) {
				echo "Image path in storage: ", $image->getPath(), ". Download url: ",$image->getDownloadUrl() . PHP_EOL;
			} 
		}   
		echo "\n";
    }
}