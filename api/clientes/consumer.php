<?php
class Consumer
{
    public function sendGetAll()
    {
        $ch = curl_init("http://www.infoedictos.com.bo/api/clientes");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
        if(!$response) 
        {
            return false;
        }
        else
        {
            var_dump($response);
        }
    }

    public function sendGetById($id)
    {
        $ch = curl_init("http://www.infoedictos.com.bo/api/clientes/$id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
        if(!$response) 
        {
            return false;
        }
        else
        {
            var_dump($response);
        }
    }
 
   
}

$curl = new Consumer();
$curl->sendGetById(2);
