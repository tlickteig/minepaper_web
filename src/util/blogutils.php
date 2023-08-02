<?php
    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once("$documentRoot/util/utilities.php");

    class BlogArticle {
        private $id;
        private $path;
        private $html;
        private $author;
        private $title;
        private $thumbnailSrc;
        private $description;
        private $dateAdded;
        private $dateUpdated;

        public function __construct($id, $path, $html, $author, $title, $description, $category, $dateAdded, $dateUpdated, $thumbnailSrc) {

            $this->validate_non_zero_integer($id, "Id");
            $this->validate_string($path, "Path");
            $this->validate_string($html, "Html");
            $this->validate_string($author, "Author");
            $this->validate_string($title, "Title");
            $this->validate_timestamp($dateAdded, "DateAdded");

            //It is fine to leave description as null
            if (isset($description)) {
                $this->validate_string($description, "Description");
            }

            //It is fine to leave dateUpdated as null
            if (isset($dateUpdated)) {
                $this->validate_timestamp($dateUpdated, "DateUpdated");
            }

            $this->id = $id;
            $this->path = $path;
            $this->html = $html;
            $this->author = $author;
            $this->title = $title;
            $this->category = $category;
            $this->description = $description;
            $this->dateAdded = $dateAdded;
            $this->dateUpdated = $dateUpdated;
            $this->thumbnailSrc = $thumbnailSrc;
        }

        public function get_id() {
            return $this->id;
        }

        public function set_id($id) {
            $this->validate_non_zero_integer($id, "Id");
            $this->id = $id;
        }

        public function get_path() {
            return $this->path;
        }

        public function set_path($path) {
            $this->validate_string($path, "Path");
            $this->path = $path;
        }

        public function get_html() {
            return $this->html;
        }

        public function set_html($html) {
            $this->validate_string($html, "Html");
            $this->html = $html;
        } 

        public function get_author() {
            return $this->author;
        }

        public function set_author($author) {
            $this->validate_string($author, "Author");
            $this->author = $author;
        }

        public function get_title() {
            return $this->title;
        }

        public function set_title($title) {
            $this->validate_string($title, "Title");
            $this->title = $title;
        }

        public function get_description() {
            return $this->description;
        }

        public function set_description($title) {
            $this->validate_string($description, "Description");
            $this->description = $description;
        }

        public function get_category() {
            return $this->category;
        }

        public function set_category($category) {
            $this->category = $category;
        }

        public function get_date_added() {
            return $this->dateAdded;
        }

        public function set_date_added($dateAdded) {
            $this->validate_string($dateAdded, "DateAdded");
            $this->dateAdded = $dateAdded;
        }

        public function get_date_updated() {
            return $this->dateUpdated;
        }

        public function set_date_updated($dateUpdated) {
            $this->validate_string($dateUpdated, "DateUpdated");
            $this->dateUpdated = $dateUpdated;
        }

        public function get_thumbnail_src() {
            return $this->thumbnailSrc;
        }

        public function set_thumbnail_src($thumbnailSrc) {
            $this->thumbnailSrc = $thumbnailSrc;
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
        
        public static $articleCacheKey = "BLOG_POST";
        public static $articleCachettlSeconds = 3600;
        
        public static function fetch_article_list() {

            $article_list = array();
            $articles_output = array();
            $is_apcu_enabled = is_apcu_enabled();

            if ($is_apcu_enabled) {
                if (apcu_exists(BlogUtils::$articleCacheKey . "_LIST")) {
                    $article_list = apcu_fetch(BlogUtils::$articleCacheKey . "_LIST");
                }
            }

            if (count($article_list) == 0) {
                $xml = simplexml_load_file("../util/blog_data.xml");
                $article_list_xml = $xml->article;

                for ($i = 0; $i < count($article_list_xml); $i++) {
                    $article_entry = array();
                    $article_entry["id"] = intval($article_list_xml[$i]->id);
                    $article_entry["path"] = (string)$article_list_xml[$i]->path;
                    array_push($article_list, $article_entry);
                }

                if ($is_apcu_enabled) {
                    apcu_store(BlogUtils::$articleCacheKey . "_LIST", $article_list, BlogUtils::$articleCachettlSeconds);
                }
            }

            foreach ($article_list as $article_info) {
                $article = BlogUtils::fetch_article_by_id($article_info["id"]);
                array_push($articles_output, $article);
            }

            return $articles_output;
        }

        public static function fetch_article_by_id($id) {

            $is_apcu_enabled = is_apcu_enabled();
            $output = null;
            if ($is_apcu_enabled) {
                $output = BlogUtils::load_article_from_cache_by_id($id);
            }

            if (!isset($output)) {
                $xml = simplexml_load_file("../util/blog_data.xml");
                $json = json_encode($xml);
                $articles_obj = json_decode($json);

                $article_list = $articles_obj->article;
                for ($i = 0; $i < count($article_list); $i++) {
                    if (intval($article_list[$i]->id) == intval($id)) {
                        
                        $id = intval($article_list[$i]->id);
                        $path = (string)$article_list[$i]->path;
                        $description = (string)$article_list[$i]->description;
                        $category = (string)$article_list[$i]->category;
                        $html = $xml->article[$i]->html->asXML();
                        $author = (string)$article_list[$i]->author;
                        $title = (string)$article_list[$i]->title;
                        $thumbnailSrc = (string)$xml->article[$i]->thumbnailSrc;
                        $dateAdded = new DateTime();
                        $dateUpdated = new DateTime();

                        $html = str_replace("<html>", "", $html);
                        $html = str_replace("</html>", "", $html);

                        $dateAdded->setTimestamp(strtotime((string)$article_list[$i]->dateAdded));
                        $dateUpdated->setTimestamp(strtotime((string)$article_list[$i]->dateUpdated));
                        $output = new BlogArticle($id, $path, $html, $author, $title, $description, $category, $dateAdded, $dateUpdated, $thumbnailSrc);

                        if ($is_apcu_enabled) {
                            BlogUtils::save_article_to_cache($output);
                        }
                        break;
                    }
                }
            }

            return $output;
        }

        public static function fetch_article_by_path($path) {

            $is_apcu_enabled = is_apcu_enabled();
            $output = null;
            if ($is_apcu_enabled) {
                $output = BlogUtils::load_article_from_cache_by_path($path);
            }

            echo "sdfasf";

            if (!isset($output)) {
                $xml = simplexml_load_file("../util/blog_data.xml");
                $json = json_encode($xml);
                $articles_obj = json_decode($json);

                $article_list = $articles_obj->article;
                for ($i = 0; $i < count($article_list); $i++) {
                    if ($article_list[$i]->path == $path) {
                        $id = intval($article_list[$i]->id);
                        $path = (string)$article_list[$i]->path;
                        $description = (string)$article_list[$i]->description;
                        $category = (string)$article_list[$i]->category;
                        $html = $xml->article[$i]->html->asXML();
                        $author = (string)$article_list[$i]->author;
                        $title = (string)$article_list[$i]->title;
                        $thumbnailSrc = (string)$xml->article[$i]->thumbnailSrc;
                        $dateAdded = new DateTime();
                        $dateUpdated = new DateTime();

                        $html = str_replace("<html>", "", $html);
                        $html = str_replace("</html>", "", $html);

                        $dateAdded->setTimestamp(strtotime((string)$article_list[$i]->dateAdded));
                        $dateUpdated->setTimestamp(strtotime((string)$article_list[$i]->dateUpdated));
                        $output = new BlogArticle($id, $path, $html, $author, $title, $description, $category, $dateAdded, $dateUpdated, $thumbnailSrc);

                        if ($is_apcu_enabled) {
                            BlogUtils::save_article_to_cache($output);
                        }
                        break;
                    }
                }
            }

            return $output;
        }

        public static function save_article_to_cache($article) {
            
            $is_apcu_enabled = is_apcu_enabled();
            $articles = array();

            if ($is_apcu_enabled) {
                $cacheKey = BlogUtils::$articleCacheKey . "_" . $article->get_id() . "_" . $article->get_path();
                apcu_store($cacheKey, (array)$article, BlogUtils::$articleCachettlSeconds);
            }
        }

        public static function load_article_from_cache_by_id($id) {

            $is_apcu_enabled = is_apcu_enabled();
            $output = null;

            if ($is_apcu_enabled) {
                foreach (apcu_cache_info()["cache_list"] as $key => $value) {
                    $key = $value["info"];
                    if (str_contains($key, BlogUtils::$articleCacheKey . "_" . $id)) {

                        $json_data = json_encode(apcu_fetch($value["info"]));
                        $json_data = str_replace("\u0000", "", $json_data);
                        $json_data = str_replace("\"BlogArticle", "\"", $json_data);
                        $cache_data = json_decode($json_data);
                        
                        $id = intval($cache_data->id);
                        $path = $cache_data->path;
                        $html = $cache_data->html;
                        $description = $cache_data->description;
                        $category = $cache_data->category;
                        $author = $cache_data->author;
                        $title = $cache_data->title;
                        $thumbnailSrc = $cache_data->thumbnailSrc;
                        $dateAdded = new DateTime();
                        $dateUpdated = new DateTime();

                        $dateAdded->setTimestamp(strtotime($cache_data->dateAdded->date));
                        $dateUpdated->setTimestamp(strtotime($cache_data->dateUpdated->date));
                        $output = new BlogArticle($id, $path, $html, $author, $title, $description, $category, $dateAdded, $dateUpdated, $thumbnailSrc);
                    }
                }
            }

            return $output;
        }

        public static function load_article_from_cache_by_path($path) {

            $is_apcu_enabled = is_apcu_enabled();
            $output = null;

            if ($is_apcu_enabled) {
                foreach (apcu_cache_info()["cache_list"] as $key => $value) {
                    $key = $value["info"];
                    if (str_contains($key, "_" . $path)) {

                        $json_data = json_encode(apcu_fetch($value["info"]));
                        $json_data = str_replace("\u0000", "", $json_data);
                        $json_data = str_replace("\"BlogArticle", "\"", $json_data);
                        $cache_data = json_decode($json_data);
                        
                        $id = intval($cache_data->id);
                        $path = $cache_data->path;
                        $html = $cache_data->html;
                        $description = $cache_data->description;
                        $category = $cache_data->category;
                        $author = $cache_data->author;
                        $title = $cache_data->title;
                        $thumbnailSrc = $cache_data->thumbnailSrc;
                        $dateAdded = new DateTime();
                        $dateUpdated = new DateTime();

                        $dateAdded->setTimestamp(strtotime($cache_data->dateAdded->date));
                        $dateUpdated->setTimestamp(strtotime($cache_data->dateUpdated->date));
                        $output = new BlogArticle($id, $path, $html, $author, $title, $description, $category, $dateAdded, $dateUpdated, $thumbnailSrc);
                    }
                }
            }

            return $output;
        }
    }
?>