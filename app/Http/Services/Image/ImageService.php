<?php

namespace App\Http\Services\Image;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class ImageService extends ImageToolsService
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    public function save($image)
    {
        $this->setImage($image);
        $this->provider();

        $img = $this->manager->read($image->getRealPath())
            ->encode(new WebpEncoder(quality: 100));

        $path = public_path($this->getImageAddress());
        $img->save($path);

        return $this->getImageAddress();
    }

    public function fitAndSave($image, $width, $height)
    {
        $this->setImage($image);
        $this->provider();

        $img = $this->manager->read($image->getRealPath())
            ->cover($width, $height)
            ->encode(new WebpEncoder(quality: 100));

        $path = public_path($this->getImageAddress());
        $img->save($path);

        return $this->getImageAddress();
    }

    public function createIndexAndSave($image)
    {
        $imageSizes = Config::get('image.index-image-sizes');

        $this->setImage($image);

        $this->getImageDirectory() ?? $this->setImageDirectory(date("Y/m/d"));
        $this->setImageDirectory($this->getImageDirectory() . '/' . time());

        $this->getImageName() ?? $this->setImageName(time());
        $imageName = $this->getImageName();

        $indexArray = [];

        foreach ($imageSizes as $sizeAlias => $imageSize) {

            $currentImageName = $imageName . '_' . $sizeAlias;
            $this->setImageName($currentImageName);

            $this->provider();

            $img = $this->manager->read($image->getRealPath())
                ->cover($imageSize['width'], $imageSize['height'])
                ->encode(new WebpEncoder(quality: 100));

            $path = public_path($this->getImageAddress());
            $img->save($path);

            $indexArray[$sizeAlias] = $this->getImageAddress();
        }

        return [
            'indexArray' => $indexArray,
            'directory'  => $this->getFinalImageDirectory(),
            'currentImage' => Config::get('image.default-current-index-image')
        ];
    }

    public function deleteImage($imagePath)
    {
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    public function deleteIndex($images)
    {
        $directory = public_path($images['directory']);
        $this->deleteDirectoryAndFiles($directory);
    }

    public function deleteDirectoryAndFiles($directory)
    {
        if (!is_dir($directory)) {
            return false;
        }

        $files = glob($directory . '/*', GLOB_MARK);

        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->deleteDirectoryAndFiles($file);
            } else {
                unlink($file);
            }
        }

        return rmdir($directory);
    }
}
