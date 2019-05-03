<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>TrueMoney Cashcard</title>
  </head>

  <body>
    <div class="container">
      <div class="text-center">
        <h1>ระบบตัดบัตร TrueMoney เข้าสู่ TrueWallet</h1>
    <form action="inc/tm.php" method="post">
      <div class="form-group">
        <label for="wallet">เลขบัตรทรูมันนี่</label>
        <input type="text" class="form-control" name="cashcard" id="cashcard" maxlength="14" aria-describedby="cashcard" placeholder="ใส่เลขบัตรทรูมันนี่">
      </div>
      <div class="form-group">
        <label for="member">ชื่อสมาชิก หรือ Ref1</label>
        <input type="text" class="form-control" name="member" id="member" aria-describedby="wallet" placeholder="กรอกชื่อสมาชิก">
      </div>
        <button type="submit" name="submit" class="btn btn-primary">เติมเงิน</button>
    </form>
    <BR>
      <h6>TrueMoney Payment</h6>
      <h6>Made by <a href="https://github.com/MrTheBank">MrTheBank</a></h6>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
