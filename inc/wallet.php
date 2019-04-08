<?php
use Maythiwat\WalletAPI;
require_once(__DIR__ . '/WalletAPI.php');
include 'config.php';
$tw = new WalletAPI();

$ref = $_POST['wallet'];
$member = $_POST['member'];
// Login
if ($phone_login == true) {
  $token = $tw->GetToken($twtel, $twtelpin, 'phone');
} elseif ($phone_login == false) {
  $token = $tw->GetToken($twemail, $twpassword);
}

//Connect to database
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

  $strSQL2 = "SELECT * FROM tw_transactions WHERE txn_id = '". $ref ."'";
  $objQuery2 = $mysqli->query($strSQL2);
  $objResult2 = $objQuery2->fetch_assoc();


// If successfully login
if ($token != null) {
  
  // Transaction date range
  $start_date = date('Y-m-d', strtotime('-1 days'));
  $end_date = date('Y-m-d', strtotime('1 days'));
  
  // Perform Fetch
  $activities = $tw->FetchActivities($token, $start_date, $end_date);
  
  foreach($activities as $arr) {
    // Check is paid-in
    if ($arr['original_action'] == 'creditor') {
      $data = $tw->FetchTxDetail($token, $arr['report_id']);
      
      // Transaction ID
      $tx['id'] = $data['section4']['column2']['cell1']['value'];

      // Amount
      $tx['amount'] = str_replace(',', '', $data['section3']['column1']['cell1']['value']);

      $amount = $tx['amount'];

      //Add TrueWallet transactions history to database to prevent abuse of transaction number.
      $tw_history = "INSERT INTO tw_transactions (name, txn_id) VALUES ('". $member ."', '". $ref ."')";
      //Point multiply
      $dbpoint = $amount*$wallet_x;
      //Add point to player once $objResult2 is checked.
      $addpoint = "UPDATE ". $tbname ." SET ". $point_field_name ." = ". $point_field_name ."+'". $dbpoint ."' WHERE ". $field_username ." = ". $member ." ";
      
      // Then you can check user input and connect to database.
      if ($objResult2) {
        echo "<script language=\"JavaScript\">
                alert('ล้มเหลว เลขอ้างอิง $ref ถูกใช้งานไปแล้ว');
                window.history.go(-1);
              </script>";
        break;
      } elseif ($ref === $tx['id']) {
        echo "<script language=\"JavaScript\">
                alert('ได้รับเงินจำนวน $amount บาท และพ้อยเป็นจำนวน $dbpoint พ้อย');
                window.history.go(-1);
              </script>";
        //Database เพิ่มประวัติการใช้เลขอ้างอิงเพื่อไม่ให้ใช้เลขอ้างอิงซ้ำอีกรอบ
        mysqli_query($mysqli, $tw_history);
        //Database เพิ่มพ้อยให้กับผู้เล่น
        mysqli_query($mysqli, $addpoint);
        break;
      } else {
        echo "<script language=\"JavaScript\">
                alert('ผิดพลาดเลขอ้างอิงดังกล่าวไม่ถูกต้อง');
                window.history.go(-1);
              </script>";
        break;
      }
    }
  }
  
  // Logout
  $tw->Logout($token);
  mysqli_close($mysqli);
}
?>
