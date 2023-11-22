<?php
    if (isset($_POST['download'])) { // if download btn clicked
        $imgUrl = $_POST['imgUrl']; // getting img url from hidden input
        $ch = curl_init($imgUrl);//initializing curl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//it transfer data as the return value of curl_exec rather than outputting it directly
        $download = curl_exec($ch); // executing curl
        curl_close($ch); //closing curl session
        header('Content-type: image/jpg');// setting content-type of header to imag/jpg so we can get img in jpg not base64 format
        header('Content-Disposition: attachment; filename="thumbnail.jpg"'); //setting Content-Disposition to attachment to indicating browser this file should download with give file name
        echo $download; //download img in jpg format
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <header>Download Thumbnail</header>
        <div class="url-input">
            <span class="title">Paste video url:</span>
            <div class="field">
                <input type="text" placeholder="https://www.youtube.com/watch?v=FucPPCPDd2Y&list=WL&index=2" required>
                <input class="hidden-input" type="hidden" name="imgUrl">
                <div class="bottom-line"></div>
            </div>
        </div>
        <div class="preview-area">
            <img class="thumbnail" src="" alt="thumbnail">
            <i class="icon fa fa-cloud-download"></i>
            <span>Paste video url to see preview</span>
        </div>
        <button class="download-btn" type="submit" name="download"> Download Thumbnail</button>
    </form>

    <script src="script.js"></script>
</body>
</html>