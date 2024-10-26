<?php
namespace verbb\squeeze\controllers;

use verbb\squeeze\Squeeze;

use Craft;
use craft\helpers\FileHelper;
use craft\web\Controller;

use yii\web\Response;

class DownloadController extends Controller
{
    // Properties
    // =========================================================================

    protected array|int|bool $allowAnonymous = true;


    // Public Methods
    // =========================================================================

    public function actionIndex(): Response
    {
        $files = $this->request->getRequiredParam('files');
        $filename = $this->request->getRequiredParam('archivename');
        
        $archive = Squeeze::$plugin->getService()->archive($filename, $files);

        $response = Craft::$app->getResponse()->sendFile($archive, null, ['forceDownload' => true]);

        FileHelper::unlink($archive);

        return $response;
    }
}
