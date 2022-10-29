<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        session_start();
        if (isset($_SESSION["username"])) {
            echo "<script>
                alert('Silahkan logout terlebih dahulu!');
                window.location.href='/';
            </script>";
        }
        helper(['form']);
        echo view('register');
    }

    public function postReg()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filetype = $_FILES["avatar"]["type"];
                $filename = $_FILES["avatar"]["name"];
                $filesize = $_FILES["avatar"]["size"];
            
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                    die("<script>
                        alert('Error: Please select a valid file format.');
                        window.location.href='/register';
                    </script>");
            
                $maxsize = 0.02 * 1024 * 1024;
                if($filesize > $maxsize)
                    die("<script>
                        alert('Error: File size is larger than the allowed limit (20KB).');
                        window.location.href='/register';
                    </script>");
            
                if(in_array($filetype, $allowed)){
                    $imgData = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
                } else{
                    echo "<script>
                    alert('Error: There was a problem uploading your file. Please try again.');
                    window.location.href='/register';
                    </script>";
                }
            } else {
                echo "Error: " . $_FILES["avatar"]["error"];
            }

            if (!empty($imgData)) {
                $datae = [
                    'email' => $_POST['email'],
                    'avatar' => base64_encode($imgData),
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'confpassword' => $_POST['confpassword']
                ];
            } else {
                $datae = [
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'confpassword' => $_POST['confpassword']
                ];
            }
            $jsonReg = json_encode($datae); 
            // return $jsonReg;  
            
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8080/register',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonReg,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            $result = json_decode($response, true);
            if (isset($result['error'])) {
                $str = '';
                // echo $result['messages']['email'];
                if (isset($result['messages']['email'])) {
                    $str = $str. $result['messages']['email']. '\n';
                }
                if (isset($result['messages']['name'])) {
                    $str = $str. $result['messages']['name']. '\n';
                }
                if (isset($result['messages']['username'])) {
                    $str = $str. $result['messages']['username']. '\n';
                }
                if (isset($result['messages']['password'])) {
                    $str = $str. $result['messages']['password']. '\n';
                }
                if (isset($result['messages']['confpassword'])) {
                    $str = $str. $result['messages']['confpassword']. '\n';
                }
                echo "<script>
                            alert('$str');
                            window.location.href='/register';
                        </script>";
            } else {
                echo "<script>
                        alert('Akun berhasil dibuat. Silahkan login!');
                        window.location.href='/login';
                    </script>";
            }
            
            // print_r($response);
        }
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filetype = $_FILES["avatar"]["type"];
                $filename = $_FILES["avatar"]["name"];
                $filesize = $_FILES["avatar"]["size"];
            
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                    die("<script>
                        alert('Error: Please select a valid file format.');
                        window.location.href='/register';
                    </script>");
            
                $maxsize = 0.02 * 1024 * 1024;
                if($filesize > $maxsize)
                    die("<script>
                        alert('Error: File size is larger than the allowed limit (20KB).');
                        window.location.href='/register';
                    </script>");
            
                if(in_array($filetype, $allowed)){
                    $imgData = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
                } else{
                    echo "<script>
                    alert('Error: There was a problem uploading your file. Please try again.');
                    window.location.href='/register';
                    </script>";
                }
            } else {
                echo "Error: " . $_FILES["avatar"]["error"];
            }
    
            if (!empty($imgData)) {
                $datae = [
                    'email' => $_POST['email'],
                    'avatar' => base64_encode($imgData),
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'confpassword' => $_POST['confpassword']
                ];
            } else {
                $datae = [
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'confpassword' => $_POST['confpassword']
                ];
            }
            $jsonReg = json_encode($datae); 
            // return $jsonReg; 
            $str = '';
            if (isset($_POST['name'])) {
                $str .= 'name='.$_POST['name'];
            }
            if (isset($_POST['username'])) {
                $str .= '&'.'username='. $_POST['network'];
            }
            if (isset($_POST['email'])) {
                $str .= '&'.'email='. $_POST['launch'];
            }
            if (isset($_POST['password'])) {
                $str .= '&'.'password='. $_POST['body'];
            } 
            if (isset($_POST['confpassword'])) {
                $str .= '&'.'confpassword='. $_POST['body'];
            } 
            if (isset($imgData)) {
                $str .= '&'.'avatar='. $imgData;
            }
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8080/update/'.$_SESSION['id'],
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
            echo $response;
            // echo $response;
            $result = json_decode($response, true);
            if (isset($result['error'])) {
                $str = '';
                // echo $result['messages']['email'];
                if (isset($result['messages']['email'])) {
                    $str = $str. $result['messages']['email']. '\n';
                }
                if (isset($result['messages']['name'])) {
                    $str = $str. $result['messages']['name']. '\n';
                }
                if (isset($result['messages']['username'])) {
                    $str = $str. $result['messages']['username']. '\n';
                }
                if (isset($result['messages']['password'])) {
                    $str = $str. $result['messages']['password']. '\n';
                }
                if (isset($result['messages']['confpassword'])) {
                    $str = $str. $result['messages']['confpassword']. '\n';
                }
            } else {
                echo "<script>
                        alert('Akun berhasil diubah. Silahkan login!');
                    </script>";
            }
            
            // print_r($response);
        }
    }
}
