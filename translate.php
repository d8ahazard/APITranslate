<?php
# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Translate\TranslateClient;

# Your Google Cloud Platform project ID
$projectId = 'AutoTranslate';

# Instantiates a client
$serviceAccountPath = "credentials.json";
$translate = new TranslateClient([
    'projectId' => $projectId,
    'keyFilePath' => $serviceAccountPath
]);

# The text to translate
$text = $_GET["text"] ?? false;
$target = $_GET["lang"] ?? false;

if ($text && $target) {
    $translation = $translate->translate($text, [
        'target' => $target
    ]);

    echo $translation['text'];
}