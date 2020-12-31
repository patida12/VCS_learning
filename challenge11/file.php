<?php
class File
{
    public $filename = 'db.txt';
    public $content = 'user';
    public function __destruct()
    {
        file_put_contents($this->filename, $this->content);
    }
}
?>