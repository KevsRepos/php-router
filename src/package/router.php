<?php declare(strict_types=1);

namespace Router;

class Router {
    private $method;
    private $query_string;
    private $url;
    private $controller_path;
    private $page_path;
    private $page_names;
    private $parent_directories = [];
    private $page_names_length;
    private $data = [];
    private $slot;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->query_string = $_SERVER["QUERY_STRING"];
        $this->url = str_replace("?$this->query_string", "", $_SERVER["REQUEST_URI"]);

        if(substr($this->url, -1) === "/") {
            $this->url = substr($this->url, 0, -1);
        }

        $this->controller_path = "routes{$this->url}/controller.php";
        $this->page_path = str_replace("//", "/", "routes{$this->url}/page.php");

        $this->path_names = explode('/', $this->url);
        $this->path_names_length = count($this->path_names);

        for ($i=0; $i < $this->path_names_length; $i++) {
            array_push($this->parent_directories, implode("/", $this->path_names));
        
            array_pop($this->path_names);
        }

        $this->parent_directories = array_filter($this->parent_directories);

        array_push($this->parent_directories, "/");
    }

    public function handle_request()
    {
        try {
            $this->load_method_handler();

            if($this->method === "GET" && !file_exists($this->page_path)) {
                throw new \Error($this->url);
            }

            $this->load_layouts();
        } catch(\Error $err) {
            // echo var_dump($err);
            $this->load_error_page($err);
        }
    }

    public function get_page()
    {
        return $this->slot;
    }

    private function load_error_page(\Error $err)
    {
        if(empty($this->parent_directories)) {
            echo "Es ist ein Fehler aufgetreten.";
            return;
        }

        foreach ($this->parent_directories as $folder) {
            if(file_exists("routes/{$folder}/error.php")) {
                include_once "routes/{$folder}/error.php";
                break;
            }
        }
    }

    private function load_method_handler()
    {
        if(file_exists($this->controller_path)) {
            
            require_once $this->controller_path;

            $namespace = "\\" . str_replace("controller.php", "", str_replace("/", "\\", $this->controller_path)) . "Controller";

            $method_caller = new $namespace();

            try {
                $this->data = match($this->method) {
                    "GET" => $method_caller->GET($_GET),
                    "POST" => $method_caller->POST($_POST),
                    "PUT" => $method_caller->PUT($_POST),
                    "PATCH" => $method_caller->PATCH($_POST),
                    "DELETE" => $method_caller->DELETE($_POST)
                };
            } catch(\Error) {}
        }
    }

    private function load_layouts()
    {
        $layout_data = [];
        $this->slot = $this->get_next_slot($this->page_path, null,  $this->data);
        
        foreach ($this->parent_directories as $folder) {
            if(file_exists("routes/{$folder}/layout.php")) {
                if(file_exists("routes/{$folder}/controller.php")) {
                    
                    require_once "routes/{$folder}/controller.php";

                    $namespace = str_replace("\\\\", "\\", "\\routes" . str_replace("/", "\\", $folder) . "\Controller");

                    $get_layout_data = new $namespace();
                    $layout_data = method_exists($get_layout_data, 'layout') ? $get_layout_data->layout() : [];
                }
    
                $this->slot = $this->get_next_slot("routes/{$folder}/layout.php", $this->slot, $layout_data);
            }
        }
    }

    private function get_next_slot($file, $slot, $data) {
        ob_start();
        require_once $file;
        return ob_get_clean();
    }
}