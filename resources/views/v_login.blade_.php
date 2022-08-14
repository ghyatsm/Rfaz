<!DOCTYPE html>
<html>

<head>


    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.0/css/font-awesome.css">
    <!--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link rel="stylesheet" href="style.css">
-->
</head>

<style>
    html,
    body {

        background-size: 100%;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        display: table;
    }

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
        padding: 10px;
    }

    .mainLoginInput {
        height: 35px;
        /* tinggi dari textbox */
        font-size: 16px;
        /* ukuran huruf di dalam textbox */
        font-family: FontAwesome;
    }
</style>

<body style="background-image: url('foto_bahan/rfaz_login.jpg');">
    <form action="/login/cek" method="POST">
        @csrf
        <div class="container">
            <div class="content">
                <table border="1" width="100%">
                    <tr>
                        <td>
                            <table border="0" width="100%">
                                <tr>
                                    <td>
                                        <img src="foto_bahan/tulisan_rfaz.png" />
                                    </td>
                                </tr>
                                <tr height="20">
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><input name="username" size="30" style="border-radius: 5px;" class="mainLoginInput" type="text" placeholder="&#61447; Username" /></td>
                                </tr>
                                <tr>
                                    <td style="padding:10px;"><input name="password" size="30" style="border-radius: 5px;" class="mainLoginInput" type="password" placeholder="&#61447; Password" /></td>
                                </tr>
                                <tr height="70">
                                    <td><button style="width:260px;height:35px;border-radius: 5px;" type="submit">Masuk</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>

</html>