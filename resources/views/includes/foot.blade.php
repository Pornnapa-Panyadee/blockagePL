
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
<!-- Styles -->
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/myCss.css') }}"> -->
<link rel="stylesheet" href="{{ asset('css/chatQR.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">



<div class="footer" style="background-color:#fff" align="center">
    <div style="margin-left:30px;">
        <table align="center" width=90%>
            <tr align="center">
                <td width="12%">
                    <a href="https://eng.cmu.ac.th/"> <img src="{{ asset('images/logo/footer/cmu.png') }}" width="80%"></a>
                </td>
                <td width="12%"> 
                    <a href="https://cendim.eng.cmu.ac.th/">  <img src="{{ asset('images/logo/footer/cendim.jpg') }}" width="90%"></a> 
                </td>
           
                <td colspan="2">
                ติดต่อเรา : ศูนย์ความเป็นเลิศด้านการจัดการภัยพิบัติทางธรรมชาติ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเชียงใหม่ <br>
                239 ถนนห้วยแก้ว ต.สุเทพ อ.เมือง จ.เชียงใหม่ 50200 โทร 053-942074 <br>
                Facebook: <a href="https://www.facebook.com/CENDiMcmu" >CENDiMcmu</a>
                </td>
                
                <td width="24%"> 
                    <img src="{{ asset('images/linebot/QR_lindbot.png') }}" width="30%"> <br> 
                    ระบบสนับสนุนข้อมูลความช่วยเหลือผ่าน Line Application <br> Nian-CNX
                </td>
            </tr>
        </table>
    </div>
</div



<div class="chatbox">
    <div class="chatbox_support_admin chatbox-infomation">
        <div class="chatbox__header">
            <div class="chatbox__image--header">
                <button class="btn-close" id="closeTab">X</button>
             </div>
            <div class="chatbox__content--header"></div>
        </div>
        <div class="chatbox__messages">
            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                <div>
                    <div class="messages__item messages__item--visitor">
                        <p>คุยกับน้องผ่าน line ได้นะคะด้วยการเพิ่มน้องเป็นเพือนผ่าน line id: @188hzruo หรือผ่าน QRCode</p>
                        <center><img src="{{ asset('images/qrcode/ninaqrcode.png') }}" height=130 width=130></center>
                    </div>
                </div>
            </div>
            <div class="chatbox__footer">
            </div>
        </div>

        <div class="chatbox__button_pix chatbox_button_admin">
            <button ><img src="{{ asset('images/chat_bot_web.png') }}" /></button>
        </div>
    </div>
</div>

<script src="{{ asset('js/Chat.js') }}"></script>
<script src="{{ asset('js/app_chatQR.js') }}"></script>