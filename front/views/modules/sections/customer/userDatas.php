<?php
$customer = new CustomerController();
$datas = $customer->getCustomeDatas($_SESSION['id']);
if($_POST && isset($_POST['email']))
{
    $update = $customer->updateUserDatas($_SESSION['id'], $_POST);
}
?>
<div class="col-xs-12">
    <h3>Personal datas</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">First name:</label>
            <input type="text" class="form-control" value="<?php echo $datas['name']; ?>" placeholder="Your name" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="surname">Last name:</label>
            <input type="text" class="form-control" value="<?php echo $datas['surname']; ?>" placeholder="Your last name" id="surname" name="surname">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" value="<?php echo $datas['birthday']; ?>" placeholder="Your birthday date" id="birthday" name="birthday">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" value="<?php echo $datas['email']; ?>" placeholder="Enter email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Into your password" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" value="<?php if($datas['phone'] ==! 0) {echo $datas['phone'];} else {echo '';} ?>" placeholder="Phone number" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="company">Last name:</label>
            <input type="text" class="form-control" value="<?php echo $datas['company']; ?>" placeholder="Your company" id="company" name="company">
        </div>
        <div class="form-group">
            <button class="btn btn-default backColor mb-2">
                ACTUALIZAR <span class="fa fa-chevron-right"></span>
            </button>
        </div>
    </form>
</div>
