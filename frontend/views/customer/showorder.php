<?php

foreach ($OrderItem as $key => $value) {
    echo $key."</br>".$value['order_id'];
}



foreach ($Customer as $key => $value) {
    echo $key."</br>".$value['id'];
}


foreach ($Order as $key => $value) {
    echo $key."</br>".$value;
}
?>
</div>
