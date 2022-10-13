<?php
session_start();
$pdo= new PDO('mysql:host=localhost; port=3306; dbname=test', 'test', 'Asdf@1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>
<head>
    <title>Natasha's form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<style>
    table, td, th {width: 33%;}
    h1{text-align:center;}
    #error{
        text-align: center;
        color: red;
    }
    table{margin-left:auto;
        margin-right:auto;}
    form {
        width: 300px;
        margin: 0 auto;
    }
    input {
        width: 100%;
    }
</style>
</head>

<body>
    
<h1>Data Form</h1>

    <?php if(isset($_SESSION['error']))
        {
            echo($_SESSION['error']);
            unset($_SESSION['error']);
        }
        ?>
    <script type="text/javascript">
        function f() {

            event.preventDefault()
            var name = document.getElementById('name').value;
            var city = document.getElementById('city').value;
            var occupation = document.getElementById('occupation').value;
            if (name.length < 1 || city.length < 1 || occupation.length < 1) {
                $('#error').show();
            } else {
                $('#error').hide();
                console.log(name, city, occupation);
                request = $.ajax({
                    url: "http://localhost/natasha/handle.php",
                    type: "post",
                    data: {
                        'name': name,
                        'city': city,
                        'occupation': occupation,

                    },
                    datatype: 'JSON',

                });
                request.done(function (response, textStatus, jqXHR) {
                    console.log('It worked');
                    $('#result').empty()
                    $('#result').append('<h1>Result data</h1><table id="res" class="table-striped table-bordered"><thead><tr><th>Name</th> <th>City</th> <th>Occupation</th></tr></thead><tbody>');
                    var str = ''//
                    for (var i = 0; i < response.length; i++) {
                        str += '<tr><td>' + response[i].name + '</td><td>' + response[i].city + '</td><td>' + response[i].occupation + '</td></tr>';
                    }
                    $('#res').append(str + '</tbody></table>');
                    $("#done").get(0).reset();
                });
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(
                        "The following error occurred: " +
                        textStatus, errorThrown
                    );
                });
            }
        }
    </script>
<div id="error" style="display: none;">
    All fields are required.
</div>
    <form method="post" id="done" >
    <label for="name" class=".control-label">Name: </label><input type="text" name="name" id="name" placeholder='Name' class="form-control" required><br>
    <label for="city" class=".control-label">City: </label><input type="text" name="city" id="city" placeholder="City" class="form-control" required><br>
    <label for="occupation" class=".control-label">Occupation: </label><input type="text" name="occupation" id="occupation" placeholder="Occupation" class="form-control" required><br>
     <input type="submit" value="submit" name="submit" class="btn btn-default"  onclick="return f();">
</form>
<hr>
<div id="result">
</div>
</body>
</html>
