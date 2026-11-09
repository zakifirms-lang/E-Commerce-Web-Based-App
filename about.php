<html>
<head>
    <title>ABOUT</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="view/jordan.png" alt="Logo">
        </div>
        <div class="jordan">
            <img src="view/nama.png">
        </div>
    </header>
    <div id="nav">
    <ul>
        <li><a href="index.php"><b>HOME</b></a></li>
    <li class="dropdown">
        <a href="#login"><b>LOGIN</b></a>
    <div class="dropdown-content">
        <a href="login/admin.html">Admin</a>
        <a href="login/user.html">User</a>
    </div>
    </li>
        <li><a href="about.php"><b>ABOUT</b></a></li>
    </div>
    <div class="icon">   
    <a href="user/data_barang_user.php"><i class="fa-solid fa-user"></i></a>
        <a href="admin/data_barang.php"><i class="fa-solid fa-screwdriver-wrench"></i></a>
    </div>
    </ul>

    <div class="isi">
        <div class="text">
        <h1>Jordan</h1>
        <i><h2>Discover the World of Flight</h2></i>
        <p>"Jordan Brand, a division of Nike, Inc., is the ultimate embodiment of athletic excellence, style, and innovation. Established in 1997, the brand bears the name of basketball legend <b>Michael Jordan</b>, who revolutionized the game and redefined what it means to be a global sports icon."</p>
        </div>
        <div class="foto">
        <img src="view/michael.png">
        </div>
    </div> 

</body>
<script>
    $(document).ready(function(){
        $(".dropdown").click(function(){
            $(".dropdown-content").slideToggle("slow");
        });
    });
</script>
</html>