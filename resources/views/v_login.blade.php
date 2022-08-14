<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.0/css/font-awesome.css">
    <style>
        Html,
        body {
            height: 100%;
            background: url('foto_bahan/rfaz_login.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .grandParentContaniner {
            display: table;
            height: 100%;
            margin: 0 auto;
        }

        .parentContainer {
            display: table-cell;
            vertical-align: middle;
        }

        input {
            height: 30px;
            width: 280px;
            font-size: 16px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, FontAwesome;
            border-radius: 5px;
            padding-left: 5px;
        }

        button {
            background-color: #33A5FF;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 18px;
            color: white;
            border: none;
            cursor: pointer;
            width: 290px;
            height: 35px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="grandParentContaniner">
        <div class="parentContainer">
            <form action="/login/cek" method="POST">
                @csrf
                <table border="0" width="100%">
                    <tr>
                        <td style="text-align:center">
                            <img src="foto_bahan/tulisan_rfaz.png" />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <input name="username" type="text" placeholder="&#61447;  username" class="mainLoginInput"></input>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center"">
                            <input name=" password" placeholder="&#61475;  password" type="password" class="mainLoginInput"></input>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center; padding:10px;"><button type="submit">Masuk</td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</body>

</html>