<?php

use GroupDocs\Parser\Model;
use GroupDocs\Parser\Model\Requests;

// This example demonstrates how to obtain container items information.
class GetContainerItemsInformation
{
	public static function Run()
	{
		$apiInstance = Utils::GetInfoApiInstance();

		$options = new Model\ContainerOptions();

		$fileInfo = new Model\FileInfo();
		$fileInfo->setFilePath("containers/archive/zip.zip");
		$options->setFileInfo($fileInfo);

		$request = new Requests\containerRequest($options);
		$response = $apiInstance->container($request);

		foreach ($response->getContainerItems() as $key => $value) {
			echo "Name ", $value->getName() . PHP_EOL;
		}
		echo "\n";
	}
}
