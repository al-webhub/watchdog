<?php
/**
 * ZipArchive Class Wrapper
 */

namespace Landingly\Utils;
use ZipArchive;

class Zipper
{
    /**
     * @var ZipArchive
     */
    private $zip;

    /**
     * Zipper constructor.
     */
    public function __construct()
    {
        $this->zip = new ZipArchive;
    }

    /**
     * Create Zip archive with name - $filename and $files
     * @param string $filename
     * @param array $files
     * @return bool
     */
    public function create($filename, $files)
    {
        $archive = $this->zip->open($filename,  ZipArchive::CREATE);
        if (!$archive) {
            return false;
        }
        if (is_array($files) && count($files) > 0) {
            foreach ($files as $file) {
                if (is_dir($file)) {
                    if (!$this->zip->addDirRecursively()) {
                        $this->zip->close();
                        return true;
                    }
                } elseif (is_file($file)) {
                    $this->zip->addFile($file);
                } else {
                    return false;
                }
            }
            $this->zip->close();
        }
    }

    /**
     * Extract contents of ZIP archive $filename to $extractPath
     * @param string $filename
     * @param string $extractPath
     * @return bool
     */
    public function extract($filename, $extractPath)
    {
        $archive = $this->zip->open($filename);
        if (!$archive) {
            return false;
        }
        if ($this->zip->extractTo($extractPath)) {
            $this->zip->close();
            return true;
        }
    }

    /**
     * Add file or folder to archive
     * @param string $folder
     * @return bool
     */
    public function addDirRecursively($folder)
    {
        if (!$this->zip->addEmptyDir($folder)) {
            return false;
        }
        $items = scandir($folder);
        if (is_array($items) && count($items) > 0) {
            foreach ($items as $item) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($folder .'/'.$item)) {
                        if (!$this->addDirRecursively($folder . '/' . $item)) {
                            return false;
                        }
                    } elseif(is_file($folder .'/'.$item)) {
                        if (!$this->zip->addFile($folder . '/'. $item)) {
                            return false;
                        }
                    }
                }
            }
        }
    }
}