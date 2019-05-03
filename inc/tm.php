<?php
use Maythiwat\WalletAPI;
require_once(__DIR__ . '/WalletAPI.php');
include 'config.php';

$tw = new WalletAPI();
$card = $_POST['cashcard'];
$member = $_POST['member'];

// Login
if ($phone_login == true) {
  $token = $tw->GetToken($twtel, $twtelpin, 'phone');
} elseif ($phone_login == false) {
  $token = $tw->GetToken($twemail, $twpassword);
}

//Connect to database
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

  $strSQL2 = "SELECT * FROM tw_transactions WHERE txn_id = '". $card ."'";
  $objQuery2 = $mysqli->query($strSQL2);
  $objResult2 = $objQuery2->fetch_assoc();

// If successfully login
if ($token != null) {
  
  	// Perform topup request
  	$tm = $tw->CashcardTopup($token, $cash);
	@$tx = $tm['transactionId'];

	//Insert transaction history
	$tw_history = "INSERT INTO tw_transactions (name, txn_id, type) VALUES ('". $member ."', '". $card ."', 'truemoney')";
	//Add point to user
	$addpoint = "UPDATE ". $tbname ." SET ". $point_field_name ." = ". $point_field_name ."+'". $tm['amount'] ."' WHERE ". $field_username ." = ". $member ." ";

	if ($objResult2) {
        echo "<script language=\"JavaScript\">
                alert('ล้มเหลว เลขบัตรทรูมันนี่ ". $card ." ถูกใช้งานไปแล้ว');
                window.history.go(-1);
              </script>";
        break;
	} elseif ($tx !== false && $tx !== null) {
        echo "<script language=\"JavaScript\">
                alert('สำเร็จ ท่านได้รับพ้อยเป็นจำนวน ". $tm['amount'] ."');
                window.history.go(-1);
              </script>";
        //Database เพิ่มประวัติการใช้เลขบัตรทรูมันนี่
        mysqli_query($mysqli, $tw_history);
        //Database เพิ่มพ้อยให้กับผู้เล่น
        mysqli_query($mysqli, $addpoint);
        break;
	} else {
        echo "<script language=\"JavaScript\">
                alert('ผิดพลาด เลขบัตรทรูมันนี่ดังกล่าวไม่ถูกต้อง');
                window.history.go(-1);
              </script>";
        break;
	}

  // Logout
  $tw->Logout($token);
mysqli_close($mysqli);
}
?>
