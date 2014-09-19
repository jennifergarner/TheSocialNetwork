<?php

    require_once "../assets/functions.php";
    date_default_timezone_set("America/Los_Angeles");

    class blog {
        public $user, $title, $content, $dateTime, $category, $folder;
        private $identifier = "bid";
        public $table = "blogs";
        public $id;
        
        //Methods
        public function get () {
            $dao = new SQL ();
            $results = $dao->select ($this->table, $this->identifier, $this->id);
            foreach ($results[0] as $key => $value) {
                if (property_exists($this, $key)) { //if it's a property of user (must be same names)
                    $this->$key = $value; //set object's properties
                }
            }
        }
        
        public function create () {
            $columns = array ("uid", "title", "content", "category", "folder");
            $values = array ($_SESSION['uid'], $this->title, $this->content, $this->category, $this->folder);
            $dao = new SQL ();
            $this->id = $dao->insert ($this->table, $columns, $values);
            $this->message = "Blog created!";
        }
        
        public function edit () {
            $columns = array ("title", "content", "category", "folder");
            $values = array ($this->title, $this->content, $this->category, $this->folder);
            $dao = new SQL ();
            $success = $dao->update ($this->table, $columns, $values, $this->identifier, $this->id);
            if ($success) {
                $this->message = "Blog updated!";
            } else {
                $this->message = "Oops - an error occurred.";
            }
        }
        
        public function delete () {
            $dao = new SQL ();
            $success = $dao->delete ($this->table, $this->identifier, $this->id);
            if ($success) {
                $this->message = "Blog deleted!";
            } else {
                $this->message = "Oops - an error occurred.";
            }
        }
        
        public function listAll () {
            $dao = new SQL ();
            return $dao->selectAll($this->table);
        }
        
        public function display () {
            
        }
        
        
        
    }
?>