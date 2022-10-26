<?php declare(strict_types=1);

require_once __DIR__ . "/package/router.php";

$router = new Router\Router();

$router->handle_request();

echo $router->get_page();

// $method = $_SERVER['REQUEST_METHOD'];
// $query_string = $_SERVER["QUERY_STRING"];


// $url = str_replace("?$query_string", "", $_SERVER["REQUEST_URI"]);

// if(substr($url, -1) === "/") {
//     $url = substr($url, 0, -1);
// }

// $path;

// $controller_path = "routes{$url}/controller.php";
// $namespace_path = str_replace("/", "\\", $controller_path);
// $page_path = str_replace("//", "/", "routes{$url}/page.php");

// $path_names = explode('/', $url);
// $parent_directories = [];
// $path_names_length = count($path_names);

// for ($i=0; $i < $path_names_length; $i++) {
//     array_push($parent_directories, implode("/", $path_names));

//     array_pop($path_names);
// }

// $parent_directories = array_filter($parent_directories);

// array_push($parent_directories, "/");

// function get_next_slot($file, $slot, $data) {
//     ob_start();
//     require_once $file;
//     return ob_get_clean();
// }

// try {
//     $data = [];
//     $layout_data = [];
//     $method_caller;

//     if(file_exists($controller_path)) {
//         echo $controller_path;
//         require_once $controller_path;

//         $method_caller = new Controller();

//         try {
//             $data = match($method) {
//                 "GET" => $method_caller->GET($_GET),
//                 "POST" => $method_caller->POST($_POST),
//                 "PUT" => $method_caller->PUT($_POST),
//                 "PATCH" => $method_caller->PATCH($_POST),
//                 "DELETE" => $method_caller->DELETE($_POST)
//             };
//         } catch(Error) {}
//     }

//     if($method === "GET" && !file_exists($page_path)) {
//         throw new Exception("Route $url not found.");
//     }

//     $slot = get_next_slot($page_path, null,  $data);

//     foreach ($parent_directories as $folder) {
//         if(file_exists("routes/{$folder}/layout.php")) {
//             if(file_exists("routes/{$folder}/controller.php")) {
//                 require_once "routes/{$folder}/controller.php";
//                 $get_layout_data = new Controller();
//                 $layout_data = method_exists($get_layout_data, 'layout') ? $get_layout_data->layout() : [];
//             }

//             $slot = get_next_slot("routes/{$folder}/layout.php", $slot, $layout_data);
//         }
//     }

//     echo $slot;
// } catch(Exception $err) {
//     if(empty($parent_directories)) {
//         echo "Es ist ein Fehler aufgetreten.";
//         return;
//     }
//     foreach ($parent_directories as $folder) {
//         if(file_exists("routes/{$folder}/error.php")) {
//             include_once "routes/{$folder}/error.php";
//             break;
//         }
//     }
// }