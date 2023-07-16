<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.css')}}">
    <title>verify notic</title>
</head>
<body>
    <h3 style="text-align: center;">คุณไม่ได้รับสิทธิ์ให้เข้าถึงหน้าเพจนี้</h3>
    <h3 style="text-align: center;"> {{$massageNotic}} <a href="https://watercenter.scmc.cmu.ac.th/blockage/jang_basin/contact" target="_blank">ติดต่อ</a> แอดมิน</h3>
    <h3 style="text-align: center;"><a class="btn btn-primary"  href="{{ asset('/')}}">กลับสู่หน้าหลัก</a></h3>
</body>
</html>