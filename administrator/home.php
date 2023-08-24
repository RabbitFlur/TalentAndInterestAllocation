<?php include '../template/header.php'; ?>
<head>
    <title>Admin Login</title>
</head>
<body>
<div class="profile">
    <h2><img src="../image/admin.png" alt="Gambar" style="max-width: 100%; height: auto;"></h2>
    <form action="../controller/admin_process_login.php" method="post">
    <div class="input-container">    
        <input type="text" id="username" name="username" placeholder="Username" required class="input-text" data-ignore="true" value="" autocomplete="off">
    </div>
    <div class="input-container"> 
        <input type="password" id="password" name="password" placeholder="Password" required class="input-text" data-ignore="true" value="" autocomplete="off">
    </div>  
    <button type="submit" id="login" name="login">Log in</button>
    </form>
</div>
<?php include '../template/footer.php'; ?>


<title>Talent and Interest Allocation</title>
</head>


