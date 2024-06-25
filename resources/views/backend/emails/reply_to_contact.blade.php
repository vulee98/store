<!DOCTYPE html>
<html>
<head>
    <title>Phản hồi liên hệ</title>
</head>
<body>

    <h3>Thông tin sản phẩm</h3>
    <p>Tên sản phẩm: {{ $product->prod_name }}</p>
    <p>Giá: {{ number_format($product->prod_price, 0, ',', '.') }} VND</p>
    <p>Bảo hành: {{ $product->prod_warranty }}</p>
    <p>Phụ kiện: {{ $product->prod_accessories }}</p>
    <p>Tình trạng: {{ $product->prod_condition }}</p>
    <p>Khuyến mại: {{ $product->prod_promotion }}</p>
    <br>
    <h3>phản hồi của store: </h3>
    <p>{{ $messageContent }}</p>
</body>
</body>
</html>
