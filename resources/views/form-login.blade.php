<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>autologin</title>
</head>
<body>
<form method="POST" action="{{ route('login') }}" id="emailForm" class="formcontent">
    @csrf
    <input  id="email" value="{{$email}}"  type="text" name="email"  hidden>
    <input type="hidden" value="password" name="password" />
    <input type="checkbox" class="form-checkbox" name="remember" hidden checked>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</form>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById("emailForm").submit();
    });
</script>
</html>
