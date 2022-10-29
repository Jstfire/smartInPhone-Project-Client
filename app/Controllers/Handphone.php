<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Handphone extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        session_start();
        return view('listHP'); 
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        session_start();
        return view('showHP');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        session_start();
        if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
            echo "<script>
                alert('Restricted Access. Login pakai akun admin ya:)');
                window.location.href='/';
            </script>";
        }
        return view('addHP');
    }

    public function postHP()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_FILES["phone_photo"]) && $_FILES["phone_photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filetype = $_FILES["phone_photo"]["type"];
                $filename = $_FILES["phone_photo"]["name"];
                $filesize = $_FILES["phone_photo"]["size"];
            
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                    die("<script>
                        alert('Error: Please select a valid file format.');
                        window.location.href='/addHP';
                    </script>");
            
                $maxsize = 1 * 1024 * 1024;
                if($filesize > $maxsize)
                    die("<script>
                        alert('Error: File size is larger than the allowed limit (1MB).');
                        window.location.href='/addHP';
                    </script>");
            
                if(in_array($filetype, $allowed)){
                    $imgData = addslashes(file_get_contents($_FILES['phone_photo']['tmp_name']));
                } else{
                    echo "<script>
                    alert('Error: There was a problem uploading your file. Please try again.');
                    window.location.href='/addHP';
                    </script>";
                }
            } else {
                echo "Error: " . $_FILES["phone_photo"]["error"];
            }

            if (!empty($imgData)) {
                $datae = [
                    'phone_photo' => base64_encode($imgData),
                    'name' => $_POST['name'],
                    'network' => $_POST['network'],
                    'launch' => $_POST['launch'],
                    'body' => $_POST['body'],
                    'display' => $_POST['display'],
                    'platform' => $_POST['platform'],
                    'memory' => $_POST['memory'],
                    'maincam' => $_POST['maincam'],
                    'selfcam' => $_POST['selfcam'],
                    'sound' => $_POST['sound'],
                    'comms' => $_POST['comms'],
                    'features' => $_POST['features'],
                    'battery' => $_POST['battery'],
                    'tests' => $_POST['tests']
                ];
            } else {
                $datae = [
                    'name' => $_POST['name'],
                    'network' => $_POST['network'],
                    'launch' => $_POST['launch'],
                    'body' => $_POST['body'],
                    'display' => $_POST['display'],
                    'platform' => $_POST['platform'],
                    'memory' => $_POST['memory'],
                    'maincam' => $_POST['maincam'],
                    'selfcam' => $_POST['selfcam'],
                    'sound' => $_POST['sound'],
                    'comms' => $_POST['comms'],
                    'features' => $_POST['features'],
                    'battery' => $_POST['battery'],
                    'tests' => $_POST['tests']
                ];
            }
            $jsonData = json_encode($datae); 
            // return $jsonData;
            $str1 = 'Authorization: Bearer '. $_SESSION["token"];
            $str2 = 'Content-Type: application/json';
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8080/handphone/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array($str1, $str2),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
            // $result = json_decode($response, true);
            // if ($response =='false'){
            //     echo "<script>
            //         alert('Please complete the form!');
            //         window.location.href='/';
            //     </script>";
            // }
            if (!isset($response['msg'])){
                echo "<script>
                    alert('Data submitted successfully.');
                    window.location.href='/';
                </script>";
            }
        }
    }
    public function postUpdateHP()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['ID'])) {
                $id = $_GET['ID'];
            }
            if(isset($_FILES["phone_photo"]) && $_FILES["phone_photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filetype = $_FILES["phone_photo"]["type"];
                $filename = $_FILES["phone_photo"]["name"];
                $filesize = $_FILES["phone_photo"]["size"];
            
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                    die("<script>
                        alert('Error: Please select a valid file format.');
                        window.location.href='/';
                    </script>");
            
                $maxsize = 1 * 1024 * 1024;
                if($filesize > $maxsize)
                    die("<script>
                        alert('Error: File size is larger than the allowed limit (1MB).');
                        window.location.href='/';
                    </script>");
            
                if(in_array($filetype, $allowed)){
                    $imgData = addslashes(file_get_contents($_FILES['phone_photo']['tmp_name']));
                } else{
                    echo "<script>
                    alert('Error: There was a problem uploading your file. Please try again.');
                    window.location.href='/';
                    </script>";
                }
            } else {
                echo "Error: " . $_FILES["phone_photo"]["error"];
            }

            $str = '';
            if (isset($_POST['name'])) {
                $str .= 'name='.$_POST['name'];
            }
            if (isset($_POST['network'])) {
                $str .= '&'.'network='. $_POST['network'];
            }
            if (isset($_POST['launch'])) {
                $str .= '&'.'launch='. $_POST['launch'];
            }
            if (isset($_POST['body'])) {
                $str .= '&'.'body='. $_POST['body'];
            }
            if (isset($_POST['display'])) {
                $str .= '&'.'display='. $_POST['display'];
            }
            if (isset($_POST['platform'])) {
                $str .= '&'.'platform='. $_POST['platform'];
            }
            if (isset($_POST['memory'])) {
                $str .= '&'.'memory='. $_POST['memory'];
            }
            if (isset($_POST['maincam'])) {
                $str .= '&'.'maincam='. $_POST['maincam'];
            }
            if (isset($_POST['selfcam'])) {
                $str .= '&'.'selfcam='. $_POST['selfcam'];
            }
            if (isset($_POST['sound'])) {
                $str .= '&'.'sound='. $_POST['sound'];
            }
            if (isset($_POST['comms'])) {
                $str .= '&'.'comms='. $_POST['comms'];
            }
            if (isset($_POST['features'])) {
                $str .= '&'.'features='. $_POST['features'];
            }
            if (isset($_POST['tests'])) {
                $str .= '&'.'tests='. $_POST['tests'];
            }
            if (isset($imgData)) {
                $str .= '&'.'phone_photo='. $imgData;
            }
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8080/handphone/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $str,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            echo $str;
            echo 'http://localhost:8080/handphone/'.$id;
            var_dump($response);

            if (!isset($response['messages'])){
                echo "<script>
                    alert('Data changed successfully.');
                    window.location.href='/';
                </script>";
            }
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        session_start();
        if (!isset($_SESSION["token"])) {
            echo "<script>
                alert('Restricted Access. Login dulu yaaa:)');
                window.location.href='/login';
            </script>";
        }
        return view('updateHP');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        session_start();
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];
        }
        if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
            echo "<script>
                alert('Restricted Access. Login pakai akun admin ya:)');
                window.location.href='/';
            </script>";
        }
        $str = 'Authorization: Bearer '. $_SESSION["token"];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/handphone/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array($str),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        echo "<script>
                alert('Data deleted successfully.');
                window.location.href='/dashboardAdmin';
            </script>";
    }

    public function compare()
    {
        session_start();
        return view('compare');
    }

    public function getHintName()
    {
        session_start();
        return view('temp/getHintName'); 
    }
    public function getHintNameAdmin()
    {
        session_start();
        return view('temp/getHintNameAdmin');
    }
}
