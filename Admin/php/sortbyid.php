<?php
$result = mysqli_query($con, "SELECT * FROM orderhistory,users where orderhistory.userID = users.userID ORDER BY orderID DESC");
while ($row = mysqli_fetch_assoc($result)) {
    $status = $row['orderStatus'];
    if ($row['orderMethod'] == 'selfc') {
        $method = "Self Collect";
        if ($status == 'received')
            $statstr = "Order Received";
        else if ($status == 'process')
            $statstr = "Preparing Food";
        else if ($status == 'ready')
            $statstr = "Ready for Self-Collect";
        else if ($status == 'cancel')
            $statstr = "Order Cancelled";
        else if ($status == 'collected')
            $statstr = "Order Collected";
    } else if ($row['orderMethod'] == 'delivery') {
        $method = "Delivery";
        if ($status == 'received')
            $statstr = "Order Received";
        else if ($status == 'process')
            $statstr = "Preparing Food";
        else if ($status == 'delivering')
            $statstr = "Delivering";
        else if ($status == 'delivered')
            $statstr = "Food Delivered";
        else if ($status == 'cancel')
            $statstr = "Order Cancelled";
    }
    echo "<tr>
        <td class='align-middle'><a href='./orderdetails.php?id=" . $row['orderID'] . "'>" . $row['orderID'] . "</a></td>
        <td class='align-middle'>" . $row['username'] . "</td>
        <td class='align-middle'>" . $row['orderDate'] . "</td>
        <td class='align-middle '>RM " . number_format((float)$row['orderPay'], 2, '.', '') . "</td>
        <td class='align-middle text-center'>" . $method . "</td>
        <td class='align-middle text-center'>" . $statstr . "</td>
        </tr>";
}
