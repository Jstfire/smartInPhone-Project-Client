<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Login extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
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
        echo view('login');
    }
    public function postLogin(){
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datae = [
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
            // $datae=array();
            // $datae[]=array(
            //     'email' => $_POST['email'],
            //     'password' => $_POST['password']
            // );
            // return json_encode($datae); 
            $jsonLogin = json_encode($datae); 
            // return $jsonLogin;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8080/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonLogin,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
            // echo $result['status'];
            // echo $result['messages']['error'];
            // echo $result['messages']['email'];
            // echo $result['messages']['password'];
            if (isset($result['error'])) {
                if ($result['error'] == '400') {
                    if (isset($result['messages']['email'])) {
                        echo "<script>
                            alert('The email field must contain a valid email address.');
                            window.location.href='/login';
                        </script>";
                        // return redirect()->to('/login');
                    } else if (isset($result['messages']['password'])) {
                        echo "<script>
                            alert('The password field is required.');
                            window.location.href='/login';
                        </script>";
                        // return redirect()->to('/login');
                    }
                } else if ($result['error'] == '404') {
                    echo $result['messages']['error'];
                }
            } else {
                $_SESSION["token"] = $response;
                $str = 'Authorization: Bearer '. $_SESSION["token"];
                echo $str;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://localhost:8080/me',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array($str),
                ));

                $response1 = curl_exec($curl);
                var_dump($response1);
                $result2 = json_decode($response1, true);
                curl_close($curl);
                var_dump($result2);
                $_SESSION["name"] = $result2['name'];
                $_SESSION["username"] = $result2['username'];
                $_SESSION["avatar"] = $result2['avatar'];
                $_SESSION["email"] = $result2['email'];
                $_SESSION["role"] = $result2['role'];

                // echo $_SESSION["email"];
                // echo $response;
                // var_dump($response);
                  
                echo "<script>
                    alert('Login sukses!');
                    window.location.href='/';
                </script>";
                // return redirect()->to('/');
            }
            
            // $error = $response["messages"];
            // echo "<script>alert('$response')</script>";
            // $base = base_url();
            // echo base_url();
            // return redirect()->to('/');
            // var_dump($result);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
?>
