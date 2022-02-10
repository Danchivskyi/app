<?php
    class Model {
        private $table = array();
        private $fileText;
        private $fileSize;
        private $file;
        public function addElement($element){
            return array_push($this->table, $element);
        }
        public function returnStack(){
            return $this->table;
        }
        public function getFileData($nazwa){
            
            $this->file = @fopen($nazwa, "r");
            if($this->file == false) {
                $this->file = fopen($nazwa, "w") or die("Nie można otworzyć pliku!");
            }
            $this->fileSize = filesize($nazwa);
            if($this->fileSize) {
                $this->fileText = fread($this->file, $this->fileSize);
            }
            else {
                $this->fileText = '';
            }
            fclose($this->file);
            return $this->fileText;
        }
    }

    
?>