<?php 
// https://stackoverflow.com/questions/34148098/woocommerce-api-create-order-and-checkout
    $orderData = array(
    "order" => array(
        "line_items" => array( 
            array(
                "product_id" => 1, 
                "quantity" => 1
            ) 
        )
    )
);
$client->orders->create($orderData);

$orderData = array("order" => array(
"status" => "processing",
"payment_details" => array("method_id"=>"cod","method_title"=>"Cash on Delivery"),
"billing_address" =>array("first_name"=>"Tumusime","last_name"=>"Deus","company"=>"mcash","city"=>"Kampala","address_1"=>"Plot 7 Mukalazi zone","email"=>"jones@mcash.ug","phone"=>"0784529043"),
"shipping_address" => array("first_name"=>"Tumusime","last_name"=>"Deus","company"=>"mcash","city"=>"Kampala","address_1"=>"Plot 7 Mukalazi zone","email"=>"jones@mcash.ug","phone"=>"0784529043"), 
"shipping_lines"=>array(array("id"=>5,"method_id"=>"flat_rate:1","method_title"=>"Flat rate","total"=>"10000.00")),
"line_items" => array( 
        array(
            "product_id" => 10, 
            "quantity" => 1,
        ) ,
         array(
            "product_id" => 15, 
            "quantity" => 2,
        ) 
    )
));
$client->orders->create($orderData);
?>