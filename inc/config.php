<?php
//เข้าสู่ระบบ TrueWallet ด้วยเบอร์โทรศัพท์หรือไม่ (ใส่ "true" ถ้าใช้เบอร์โทรศัพท์ ใส่ "false" ถ้าใช้ E-Mail)
$phone_login = true;

//ใส่เบอร์โทรศัพท์ในการเข้าสู่ระบบ (เช่น 0xxxxxxxxx)
$twtel = "TrueWallet Phone Tel.";
//ใส่ PIN Code ในการเข้าสู่ระบบ
$twtelpin = "PIN CODE";

//ให้ใส่ E-Mail ของ Truemoney Wallet
$twemail = "TrueWallet E-Mail";
//ให้ใส่รหัสผ่าน E-Mail ของ Truemoney Wallet
$twpassword = "TrueWallet Password";

//Database ส่วนของการเชื่อมต่อฐานข้อมูล

//Host ของฐานข้อมูล
$dbhost = "Your hostname/IP";
//Username ของฐานข้อมูล
$dbuser = "Your database username";
//Password ของฐานข้อมูล
$dbpassword = "Your database password";
//ฐานข้อมูล
$dbname = "Your database name";

//Database ส่วนของตารางในการเพิ่มพ้อยให้กับลูกค้า

//ตารางของพ้อยที่ถูกเก็บ
$tbname = "";
//Field ที่ใช้อ้างอิง Username
$field_username = "";
//Field ที่ใช้ในการเก็บพ้อยจากการเติมเงิน
$point_field_name = "";

//จำนวน เงินเติมคูณด้วยเลขที่ต้องการ (เช่น เงินเติม 50 บาท x 1 = 50 บาท)
$wallet_x = "1";

//สำหรับใช้งานระบบตัดบัตรทรูมันนี่
//กำหนดราคาบัตรว่าจะได้พ้อยเท่าไหร่เมื่อเติมเงิน
//ห้ามแก้ตรง $tmm['50'], $tmm['90'] และอื่น มิเช่นนั้น ระบบจะเพิ่มพ้อยไม่ได้
$tmm['50'] = '50';
$tmm['90'] = '90';
$tmm['150'] = '150';
$tmm['300'] = '300';
$tmm['500'] = '500';
$tmm['1000'] = '1000';
?>
