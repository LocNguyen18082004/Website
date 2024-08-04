<?php 
class emailmodel extends DModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function send_order_processed_email($order_info) {
        $to = $order_info['customer_email'];
        $subject = "Đơn hàng của bạn đã được xử lý";
        $message = "Kính gửi " . $order_info['customer_name'] . ",\n\n";
        $message .= "Đơn hàng của bạn với mã " . $order_info['order_code'] . " đã được xử lý thành công.\n";
        $message .= "Ngày đặt hàng: " . $order_info['order_date'] . "\n";
        $message .= "Ngày xử lý: " . date('Y-m-d H:i:s') . "\n\n";
        $message .= "Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi.";

        // Sử dụng hàm mail của PHP để gửi email
        mail($to, $subject, $message);
    }


}