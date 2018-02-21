<html>
<head>
    <title>Test Api</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
</head>
<body>
<button id="login1">Login App User</button>
<button id="login2">Login Admin</button>
<button id="user">User</button>
<button id="invitation">Send Invitation</button>
<button id="invitationVerify">Verify Invitation</button>
<button id="changeEmail">Change Email</button>
<button id="changePassword">Change Password</button>
<button id="fileUpload">File Upload</button>
<form id="my-dropzone" class="dropzone" style="display: none;">
    <div class="fallback">
        <input name="image" type="file"/>
    </div>
</form>
<button id="getFamily">Get Family</button>
<script>
    var API_TOKEN = '';
    Dropzone.autoDiscover = false;

    function setHeader() {
        $.ajaxSetup({
            headers: {
                'Authorization': API_TOKEN
            }
        });
    }

    $('#fileUpload').click(function () {
        $('#login2').click();
    });

    $('#login1').click(function () {
        $.post('http://127.0.0.1:8000/api/user/login', {
            email: "appuser@example.com",
            password: "123456"
        }, function (response) {
            API_TOKEN = 'Bearer ' + response.data.api_token;
            console.log(API_TOKEN);
        });
    });
    $('#login2').click(function () {
        $.post('http://127.0.0.1:8000/api/user/login', {
            email: "admin@test.com",
            password: "admin"
        }, function (response) {
            API_TOKEN = 'Bearer ' + response.data.api_token;
            $('#my-dropzone').show().dropzone({
                url: '/api/user/profile/add_photo',
                paramName: "image",
                headers: {
                    'Authorization': API_TOKEN
                },
                init: function () {
                    this.on("sending", function (file, xhr, formData) {
                        formData.append("_method", "PUT");
                    });
                }

            });
            console.log(API_TOKEN);
        });
    });
    $('#user').click(function () {
        setHeader();
        $.get('http://127.0.0.1:8000/api/user', function (response) {
            console.log(response);
        });
    });
    $('#invitation').click(function () {
        setHeader();
        $.post('http://127.0.0.1:8000/api/user/invitation', {
            email: "admin@test.com"
        }, function (response) {
            console.log(response);
        });
    });
    $('#invitationVerify').click(function () {
        setHeader();
        $.post('http://127.0.0.1:8000/api/user/invitation/verify', {
            code: "DMDDXZPI"
        }, function (response) {
            console.log(response);
        });
    });
    $('#changeEmail').click(function () {
        setHeader();
        $.post('http://127.0.0.1:8000/api/user/profile/update_email', {
            _method: 'PUT',
            email: "changed@email.com"
        }, function (response) {
            console.log(response);
        });
    });
    $('#changePassword').click(function () {
        setHeader();
        $.post('http://127.0.0.1:8000/api/user/profile/update_password', {
            _method: 'PUT',
            password: "changepassword",
            password_confirmation: "changepassword"
        }, function (response) {
            console.log(response);
        });
    });
    $('#getFamily').click(function () {
        setHeader();
        $.get('http://127.0.0.1:8000/api/user/home_button/family?params=firstname,lastname,address',
            function (response) {
                console.log(response);
            });
    });

</script>
</body>
</html>