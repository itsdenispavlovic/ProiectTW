<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <!-- DO NOT REPEAT YOURSELF RULE NUMBER ONE! -->
    <h1>Simple Registration Form</h1>
    <form id="registrationForm">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Please enter your username"><br />

        <label for="Firstname">Firstname</label>
        <input type="text" name="fname" id="fname" placeholder="Please enter your firstname"><br />

        <label for="Lastname">Lastname</label>
        <input type="text" name="lname" id="lname" placeholder="Please enter your lastname"><br />

        <label for="Password">Password</label>
        <input type="password" name="password" id="password" placeholder="Please enter your password"><br />
        <input id="regB" type="submit" value="Register">
    </form>

    <script>
    $(document).ready(() => {
        $('#regB').click((e) => {
            e.preventDefault();

            $.ajax
            ({
                type: 'POST',
                url: 'regC.php',
                data: $('#registrationForm').serialize(),
                success: (response) => {
                    alert(response);
                    if(response == 1)
                    {
                        alert("Account has been created!");
                    }
                }
            });
        });
    });
    </script>
</body>
</html>