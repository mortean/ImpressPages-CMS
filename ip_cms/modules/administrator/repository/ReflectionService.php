<?php
    /**
     * @package ImpressPages

     *
     */
namespace Modules\administrator\repository;


/**
 *
 * Image related plugins usually need several copies of the same file:
 * original
 * thumbnail
 * small cropped
 * large but smaller than orignial
 * ...
 *
 * It could become a pain to manage all those copies. Old copies should be removed
 * when user crops original photo differently. Or default image sizes changes after theme change.
 *
 * Reflection service takes care of this process. Every time you need a cropped version of
 * image, just use method getReflection and pass cropping options. You will get a path to
 * cropped image. If such version of original doesn't exist, it will be created.
 * You don't need to care about deletion. All copies will be automatically deleted as file
 * will be deleted from the repository.
 *
 * WARNING
 * you can use this class only for images stored in repository (uploaded using default ImpressPages CMS
 * functionality). Otherwise automatic removal is not going to work.
 *
 * Usage example:
 *
 * $reflectionService = \Modules\administrator\repository\ReflectionService::instance();
 * $transform = new \Modules\administrator\repository\Transform\ImageFit(100, 100, null, TRUE);
 * $reflection = $reflectionService->getReflection($file, $desiredName, $transform);
 * if (!$reflection){
 *     echo $reflectionService->getLastException()->getMessage();
 *     //do something
 * }
 *
 *
 * @author Mangirdas
 *
 */
class ReflectionService
{
    protected static $instance;
    protected $lastException = null;

    protected function __construct()
    {

    }

    protected function __clone()
    {

    }

    /**
     * Get singleton instance
     * @return ReflectionService
     */
    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new ReflectionService();
        }

        return self::$instance;
    }


    /**
     * @param string $file - absolute path to image which reflection is requested
     * @param $desiredName - desired file name. If reflection is missing, service will try to create new one with name as possible similar to desired
     * @param Transform\Base $transform - how to crop the image. Leave null if you want original file to be reflected.
     * @return string - file name
     * @throws TransformException
     */
    public function getReflection($file, $desiredName = null, Transform\Base $transform = null)
    {
        if (!file_exists(BASE_DIR.$file) || !is_file(BASE_DIR.$file)) {
            $this->lastException = new TransformException("File doesn't exist", TransformException::MISSING_FILE);
            return false;
        }
        $reflectionModel = ReflectionModel::instance();
        try {
            $reflection = $reflectionModel->getReflection($file, $desiredName, $transform);
        } catch (TransformException $e) {
            $this->lastException = $e;
            return false;
        } catch (\Ip\PhpException $e) {
            $this->lastExceptin = $e;
            return false;
        }

        return $reflection;
    }

    /**
     * @return TransformException
     */
    public function getLastException()
    {
        return $this->lastException;
    }





}