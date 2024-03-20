<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_assets/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_assets/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="/vnpay_assets/assets/jquery-1.11.3.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY DEMO</h3>
            </div>
            <h3>Tạo mới đơn hàng</h3>
            <div class="table-responsive">
                <form action="/payment/online" id="create_form" method="post">       
                    @csrf
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number" value="{{$order_total}}"/>
                    </div>
                    <div class="form-group">
                        <label for="OrderDescription">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="OrderDescription" name="OrderDescription" rows="2"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">---Chọn----</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnPopup">Xác nhận thanh toán</button>
                    <button type="submit" name="redirect" id="redirect" class="btn btn-default" onclick="history.back()">Quay lại</button>

                </form>
            </div>
            <p>
                &nbsp;
            </p>
        </div>  
        <script>
            // Lấy thời gian hiện tại
            var currentDate = new Date();

            // Định dạng ngày, tháng, năm, giờ, phút, giây
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1; // Lưu ý: Tháng trong JavaScript bắt đầu từ 0
            var year = currentDate.getFullYear();
            var hours = currentDate.getHours();
            var minutes = currentDate.getMinutes();
            var seconds = currentDate.getSeconds();

            // Chuyển đổi thành chuỗi định dạng "dd/mm/yyyy hh:mm:ss"
            var formattedDate = (day < 10 ? '0' : '') + day + '-' + (month < 10 ? '0' : '') + month + '-' + year;
            var formattedTime = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

            // Cập nhật giá trị của textarea
            document.getElementById("OrderDescription").value = "Thanh toan don hang thoi gian: " + formattedDate + ' ' + formattedTime;
        </script>
    </body>
</html>
