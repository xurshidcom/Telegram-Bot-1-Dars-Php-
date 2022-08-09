<?php 


define('TOKEN','5376863266:AAEEXeMpMYNzNovV5Ktfe3HW6WglGL_s9cg');

// https://xurshid.com/bot.php


function bot($method,$datas=[]){
	$url = "https://api.telegram.org/bot".TOKEN."/".$method;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
	$res = curl_exec($ch);
	if(curl_error($ch)){
		var_dump(curl_error($ch));
	}else{
		return json_decode($res);
	}
}



$update = json_decode(file_get_contents('php://input'));

$message = $update->message;
$chat_id = $message->chat->id;
$chat_id_type = $message->chat->type;
$message_id = $message->message_id;
$first_name = $message->chat->first_name;
$last_name = $message->chat->last_name;
$username = $message->from->username;
$text = $message->text;



if ($text=="/start") {
	bot ('SendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"<b>Assalomu alaykum</b>, <i>Xush kelibsiz!, Sizga Qanday Yordam Bera olaman!</i>",
			'parse_mode'=>'html', 
	]);
	
}




 ?>