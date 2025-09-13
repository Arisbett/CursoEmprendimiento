
<html>
<head>
  <title>reCAPTCHA</title>
  <script type="text/javascript">
    var onloadCallback = function() {
      grecaptcha.render('html_element', {
        'sitekey' : '6LdkZ-kkAAAAAJ1ZcjAluIxsGCcPhXnrdhCSbeC4'
      });
    };
  </script>
</head>
<body>
  <form action="?" method="POST">
    <div id="html_element"></div>
    <br>
    <input type="submit" value="Submit">
  </form>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
      async defer>
  </script>
</body>
</html>
