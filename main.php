<?php
require_once('src/crest.php');

    $contact_check = (CRest::call("telephony.externalCall.searchCrmEntities", ["PHONE_NUMBER"=> '0701234567']));
    $contact_id = $contact_check['result'][0]['CRM_ENTITY_ID'];
    pre_r($contact_check);
    $deals = (CRest::call("crm.deal.list", [
            'filter'=> ["CONTACT_ID"=> $contact_id, "CLOSED" => "N"],
            'select'=> [ "ASSIGNED_BY_ID"]
            ] 
    ));
    $responsable = $deals['result'];
    pre_r($responsable);
    $suna_la = 'Coada de asteptare Standart';
    for ($i=0; $i < count($responsable); $i++) { 
        $responsable_id = $responsable[$i]['ASSIGNED_BY_ID'];
        if ($responsable_id == 14){$suna_la = 'Utilizator_ID - 14';}
        elseif ($responsable_id == 29) {$suna_la = 'Utilizator_ID - 29';}
        elseif ($responsable_id == 27) {$suna_la = 'Utilizator_ID - 27';}
    }
    echo 'Suna la: '.$suna_la;

function pre_r($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
?>
