<?php
class Api_wa extends CI_Controller {
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }

    public function send($nomor, $message, $id_klinik)
    {
        $curl = curl_init();

		if($id_klinik = 3){
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://hp.fonnte.com/api/send_message.php",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => array(
					'phone' => $nomor,
					'type' => 'text',
					'text' => $message,
					'delay' => '1',
					'schedule' => '0'),
				CURLOPT_HTTPHEADER => array(
					"Authorization: kfhQFDo7oj7je2SUwrYj"
				),
				));
		}elseif($id_klinik = 4){
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://hp.fonnte.com/api/send_message.php",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => array(
					'phone' => $nomor,
					'type' => 'text',
					'text' => $message,
					'delay' => '1',
					'schedule' => '0'),
				CURLOPT_HTTPHEADER => array(
					"Authorization: hFZeF4nJfKYZr9HbbYwt"
				),
				));
		}
		

		$response = curl_exec($curl);


		curl_close($curl);
		return $response;
		sleep(1); #do not delete!
    }
}