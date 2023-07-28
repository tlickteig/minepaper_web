<?php
    class BlogArticle {
        private $id;
        private $path;
        private $html;
        private $author;
        private $title;
        private $dateAdded;
        private $dateUpdated;

        public function __construct($id, $path, $html, $author, $title, $dateAdded, $dateUpdated) {

            $this->validate_non_zero_integer($id, "Id");
            $this->validate_string($path, "Path");
            $this->validate_string($html, "Html");
            $this->validate_string($author, "Author");
            $this->validate_string($title, "Title");
            $this->validate_timestamp($dateAdded, "DateAdded");

            //It is fine to leave dateUpdated as null
            if (isset($dateUpdated)) {
                $this->validate_timestamp($dateUpdated, "DateUpdated");
            }

            $this->id = $id;
            $this->path = $path;
            $this->html = $html;
            $this->author = $author;
            $this->title = $title;
            $this->dateAdded = $dateAdded;
            $this->dateUpdated = $dateUPdated;
        }

        public function get_id() {
            return $id;
        }

        public function set_id($id) {
            $this->validate_non_zero_integer($id, "Id");
            $this->id = $id;
        }

        public function get_path() {
            return $path;
        }

        public function set_path($path) {
            $this->validate_string($path, "Path");
            $this->path = $path;
        }

        public function get_html() {
            return $html;
        }

        public function set_html($html) {
            $this->validate_string($html, "Html");
            $this->html = $html;
        } 

        public function get_author() {
            return $author;
        }

        public function set_author($author) {
            $this->validate_string($author, "Author");
            $this->author = $author;
        }

        public function get_title() {
            return $title;
        }

        public function set_title($title) {
            $this->validate_string($title, "Title");
            $this->title = $title;
        }

        public function get_date_added() {
            return $dateAdded;
        }

        public function set_date_added($dateAdded) {
            $this->validate_string($dateAdded, "DateAdded");
            $this->dateAdded = $dateAdded;
        }

        public function get_date_updated() {
            return $dateAdded;
        }

        public function set_date_updated($dateUpdated) {
            $this->validate_string($dateUpdated, "DateUpdated");
            $this->dateUpdated = $dateUpdated;
        }

        private function validate_string($input, $property_name) {
            if (!isset($input)) {
                throw new Exception("$property_name cannot be null");
            }

            if (empty($input)) {
                throw new Exception("$property_name cannot be null");
            }
        }

        private function validate_non_zero_integer($input, $property_name) {
            if (!isset($input) or !boolval(is_numeric($input)) or $input < 0) {
                throw new Exception("$property_name was in an incorrect format");
            }
        }

        private function validate_timestamp($input, $property_name) {
            if (!isset($input) or !is_a($input, "DateTime")) {
                throw new Exception("$property_name was in an incorrect format");
            }
        }
    }

    class BlogUtils {
        
        public static $articleCacheKey = "BLOG_POSTS";
        public static $articleCachettlSeconds = 3600;
        
        public static function fetch_article_by_id($id) {

        }

        public static function fetch_article_by_path($path) {

        }

        public static function save_article_to_cache($article) {
            
        }

        public static function load_article_from_cache_by_id($id) {

        }

        public static function load_article_from_cache_by_path($path) {

        }
    }
?>