<?php
namespace verbb\squeeze\services;

use verbb\squeeze\Squeeze;

use Craft;
use craft\base\Component;
use craft\elements\Asset;
use craft\helpers\FileHelper;

use Exception;
use ZipArchive;

class Service extends Component
{
    // Public Methods
    // =========================================================================

    public function archive(string $filename, array $files)
    {
        $assets = Asset::find()->id($files)->limit(null)->all();

        $tempFile = Craft::$app->getPath()->getTempPath() . DIRECTORY_SEPARATOR . $filename . '_' . time() . '.zip';

        $zip = new ZipArchive();

        if ($zip->open($tempFile, ZipArchive::CREATE) === true) {
            foreach ($assets as $asset) {
                $file = $asset->getCopyOfFile();
                $zip->addFromString($asset->filename, $asset->getContents());

                FileHelper::unlink($file);
            }
            
            $zip->close();
            
            return $tempFile;   
        }
        
        throw new Exception(Craft::t('squeeze', 'Failed to generate the archive'));
    }

}
