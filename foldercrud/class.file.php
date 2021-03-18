<?php 
class File {
    private $defaultViewDirectory;
    private $nameViewDirectory;

    private $directorio_global;

    public function __construct(){
        $this->defaultViewDirectory = $_SERVER["DOCUMENT_ROOT"];
        $this->nameViewDirectory    = $_SERVER["SCRIPT_NAME"];
        $this->directory = "global_directory";
    }

    public function getDefaultViewDirectory(){
        return $this->defaultViewDirectory."/".substr($this->nameViewDirectory,1,strpos(ltrim($this->nameViewDirectory,'/'), '/'))."/";
    }

    public function exists($file) {
        if (file_exists($this->getDefaultViewDirectory().$file)) {return true;}else{return false;}
    }

    public function delete($file) {
        if ($this->exists($file)){@unlink($file); return true; }else{ return false; }
    }

    public function createDir($path) {
        return (!is_dir($path) && @mkdir($path, 0777, true));
    }

    public function renameDir($path, $newPath) {
        return (!is_dir($newPath) && rename($path, $newPath));
    }

    public function deleteEmptyDir($path) {
        return (is_dir($path) && @rmdir($path));
    }

    public function deleteDirRecursively($path) {
        if ($path !== "") {
            $path == $this->getDefaultViewDirectory().$path;
            foreach(glob($path . '/*') as $file) {
                if(is_dir($file)) $this->deleteDirRecursively($file); else @unlink($file); 
            } if (@rmdir($path)){return true;}else{return false;};
        }else{
            return false;
        }
    }

    public function getFilesFromDir($path = "") {
        if ($path == "") {
            $path = $this->getDefaultViewDirectory();
        }else{
            $path = $this->getDefaultViewDirectory().$path;
        }
        $names = array();
        foreach (new DirectoryIterator($path) as $file) {
            if ($file->isFile()) {
                $names[] =  $file->getFilename();
            }
        }
        return $names;
    }



}

// $myfile = new File();
// echo var_dump($myfile->getFilesFromDir());
// echo var_dump($myfile->delete('543543fhf.rar'));
// echo var_dump($myfile->createDir('peru/lima'));
// echo var_dump($myfile->deleteEmptyDir('hola'));
// echo var_dump($myfile->deleteDirRecursively('peru'));
// echo var_dump($myfile-> renameDir($path, $newPath)('viejo path','nuevo path'));

?>