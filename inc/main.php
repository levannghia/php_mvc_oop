<div class="main">
    <div class="content">
        <?php
        if(isset($_GET['menu'])){
            $temp = $_GET['menu'];
        }else{
            $temp = '';
        }
        if($temp == 'products'){
            include("./pages/main/products.php");
        }elseif($temp == 'topbrands'){
            include("./pages/main/topbrands.php");
        }elseif($temp == 'cart'){
            include("./pages/main/cart.php");
        }elseif($temp == 'contact'){
            include("./pages/main/contact.php");
        }elseif($temp == 'preview'){
            include("./pages/main/topbrands.php");
        }elseif($temp == 'login'){
            include("./pages/main/login.php");
        }
        else{
            include("./pages/main/preview.php");
        }
        ?>
    </div>
</div>