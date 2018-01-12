<?php


include '../app/views/common/top.html';
?>
<link rel="stylesheet" href="../home/css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">
<title>HomePage - TWeb</title>


<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>


</head>

<style>

    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #1FB264;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 400px;
        max-width: 100%;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }</style>

<?php
include '../app/views/common/nav.php';
?>


<!--<button id="ajax" name="btn-login" class="btn btn-warning btn-shadow" type='submit'>ajax</button>-->

<div class="container">
    <h1>UPLOAD</h1>

    <div class="file-upload">
        <button id='btn_add' class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image
        </button>

        <div class="image-upload-wrap">
            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"/>
            <div class="drag-text">
                <h3>Drag and drop a file or select add Image</h3>
            </div>
        </div>
        <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image"/>
            <div class="image-title-wrap">
                <button id="btn_remove" type="button"  class="remove-image">Remove <span class="image-title">Uploaded Image</span>
                </button>
            </div>
        </div>
    </div>
</div>

</body>
<script>

    window.onload = function () {
      $('#btn_remove').click(removeUpload);
      $('#btn_add').click(readURL);
    };


    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    //quando clicco su pulsante rimuovi img
    function removeUpload() {

        $('.file-upload-input').replaceWith($('.file-upload-input'));
        $('.file-upload-content').hide();
        $('.image-upload-wrap').removeClass('image-dropping');
        $('.image-upload-wrap').show();
    }

    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');

    });

</script>
</html>


