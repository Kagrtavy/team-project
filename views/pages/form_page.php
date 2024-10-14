<h1>Order</h1>
<?php if (count($errors) > 0) :?>
    <ul>
        <?php foreach ($errors as $error) :?>
            <li><?= $error?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<form action="<?= getUrl('proc')?>" method="post" novalidate>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="phone">Phone:</label><br>
    <input type="tel" id="phone" name="phone" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Submit">
</form>

