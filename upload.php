<?php
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);

    if ($file['size'] <= 2 * 1024 * 1024 &&
        in_array($mime, ['image/jpeg', 'image/png'])) {

        $folder = dirname(__DIR__) . "/private_uploads/";

        if (!is_dir($folder)) mkdir($folder, 0700, true);

        $name = bin2hex(random_bytes(16)) . ".img";

        move_uploaded_file($file['tmp_name'], $folder . $name);

        echo "File Uploaded";
    } else {
        echo "Invalid File";
    }
}
?>

<form method="post" enctype="multipart/form-data">
<input type="file" name="file">
<button>Upload</button>
</form>