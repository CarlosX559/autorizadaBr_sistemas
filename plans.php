<?php

class AutorizadabrAPI {

    private $apiUrl = 'https://api.autorizadabr.com.br/api/list/plans';
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function login() {
        $postData = json_encode([
            'email' => $this->email,
            'password' => $this->password
        ]);

        $ch = curl_init($this->apiUrl);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postData)
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Erro na requisição: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}

//token 55e11ff2-e520-480c-a7b5-de5b92baafb8-5ad5386e-f68f-4351-a130-a542ef7634e2

// Utilize a classe
$email = 'autorizadabr@gmail.com.br';
$password = 'password';

$api = new AutorizadabrAPI($email, $password);
$response = $api->login();

// Manipule a resposta conforme necessário
var_dump($response);
