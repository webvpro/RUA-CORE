 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
  <title>Underbridge RPG Mobile Tools</title> 
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
   
  <script type="text/javascript" src="http://www.google.com/jsapi"></script>
 <script type="text/javascript">
    google.load('friendconnect', '0.8');
  </script>
  <script>
  
 	google.friendconnect.container.initOpenSocialApi({
    site: '<?=$gfc_site_id?>',
    onload: function(securityToken) {
    if (!window.timesloaded) {
      window.timesloaded = 1;
      google.friendconnect.requestSignOut();
    } else {
      window.timesloaded++;
    }
    if (window.timesloaded > 1) {
      window.top.location.href = "/ubrpgmobile";
    }
  }

  });
</script>
</head> 
<body> 

</body>
</html>