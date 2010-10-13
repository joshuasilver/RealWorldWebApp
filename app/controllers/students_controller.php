<?php
class StudentsController extends AppController {

    var $name = 'Students';

    function index() {
        $this->set('studentList', $this->Student->find('all'));
    }

    function add() {
        if (!empty($this->data)) {
            if ($this->Student->save($this->data)) {
                $this->Session->setFlash('Your student has been added.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function sendMessage($id) {
        $this->Student->id = $id;
        $this->set('student', $this->Student->read());

        if (!empty($this->data)) {
            $statusMessage = $this->_twilioHelper($this->Student->field('phone_number'), $this->data['message']);

            $this->Session->setFlash($statusMessage);
            $this->redirect(array('action' => 'index'));
        }
    }

    private function _twilioHelper($to, $message) {

        $accountSid = "AC5240099c0302ebb10f5f70a698994aa6";
        $token      = "1ce0d5425377202f2db4ddcce4dc8c92";
        $from       = "404-369-5497";

        $to         = $this->Student->field('phone_number');
        $body       = $this->data['message'];
        $postData   = "From=$from&To=$to&Body=$body";
        $url        = "https://$accountSid:$token@api.twilio.com/2010-04-01/Accounts/$accountSid/SMS/Messages";

        // create a new cURL resource
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0); // DO NOT RETURN HTTP HEADERS
        curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL

        // set POST options and fields
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS , $postData);

        // execute the cURL call and retrive result
        $result = curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        // for debugging purposes:
        //var_dump($result);

        $xmlResult = new SimpleXMLElement($result);
        if (isset($xmlResult->RestException)) {
            $statusMessage = "Error sending message: " . "<br />" .
                            "Status: "   . $xmlResult->RestException->Status  . "<br />" .
                            "Message: "  . $xmlResult->RestException->Message . "<br />" .
                            "Code: "     . $xmlResult->RestException->Code    . "<br />" .
                            "MoreInfo: " . $xmlResult->RestException->MoreInfo;
        } else {
            $statusMessage = "Your message has been sent successfully.";
        }
        return $statusMessage;
    }

}

?>
