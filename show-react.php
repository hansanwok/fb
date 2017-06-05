<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script type="text/javascript" src="jquery-2.0.0.min.js"></script>
    <title>
        SDK PHP
    </title>
    <style type="text/css">
        .name{
            color:blue;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="count_total">
    Like: <span id="like"></span>
    <br>
    Love:<span id="love"></span>
</div>
<div id="show"></div>
<script>
    // hay la y tuong vote cho ronal do vs messi nhe, kieu nhu yen miu vua vote cho ronaldo
    $(document).ready(function () {
        //set time = 1s, gui ajax yeu cau tra ve
        //minh chi hien thi la cai react muon nhat
        setInterval(function () {

            $.ajax({
                url: 'reactions.php',
                type: 'get',
                dataType: 'json',
                success: function (reactions) {
                    var html = "";
                    var like = 0;
                    var love = 0;
                    $.each(reactions, function (key, react) {
                      // chen vao moi the html de hien thi ra toan bo cac react
                       /* switch (react.type)
                        {
                            case 'LIKE' : html += "<img class='pic' src='" + react.pic_small + "'/> <span class='name'>" + react.name + "</span> <span class='type'> " + " vua vote cho Messi" + " </span> <br>"; break;
                            case 'LOVE' : html += "<img class='pic' src='" + react.pic_small + "'/> <span class='name'>" + react.name + "</span> <span class='type'> " + " vua vote cho ronaldo" + " </span> <br>"; break;
                        }*/
                        // tinh toan so like hay haha
                        switch (react.type)
                        {
                            case 'LIKE': like++; break;
                            case 'LOVE': love++; break;
                        }
                    });
                    ///hien ra react muon nhat
                    switch (reactions[0].type)
                    {
                        case 'LIKE' : html += "<img class='pic' src='" + reactions[0].pic_small + "'/> <span class='name'>" + reactions[0].name + "</span> <span class='type'> " + " vua vote cho Messi" + " </span> <br>"; break;
                        case 'LOVE' : html += "<img class='pic' src='" + reactions[0].pic_small + "'/> <span class='name'>" + reactions[0].name + "</span> <span class='type'> " + " vua vote cho ronaldo" + " </span> <br>"; break;
                    }
                    $('#show').html(html);
                    $('#like').html(like);
                    $('#love').html(love);
                }
            });

        },2000);
    });

</script>

<?php
/*
require ('connect.php');

foreach ($reactions as $react)
{
    //lay ten qua id
   /* $response = $fb->get($like['id']."?fields=name");
    $user = $response->getGraphUser();
    $name = $user->getName(); */

/* handle the result
echo '<img src="'.$react['pic_small'].'" />'.$react['name'].' '.$react['type'].'<br>';

} */
?>


</body>
</html>