<?php
http_response_code(404);
$page_title       = 'Page Not Found | Chronexis';
$page_description = 'The page you are looking for does not exist or has moved.';
$page_canonical   = 'https://chronexis.com/404';
require 'header.php';
?>
<section style="min-height:100vh; display:flex; align-items:center; justify-content:center; text-align:center; padding:2rem;">
  <div>
    <p class="eyebrow">404</p>
    <div class="divider divider--center"></div>
    <h1 style="font-style:italic; margin-bottom:2rem;">The page you are looking for<br>does not exist here.</h1>
    <p style="color:var(--text-secondary); font-size:1.05rem; max-width:420px; margin:0 auto 3rem;">Some things are not meant to be found through searching. Return to the beginning.</p>
    <a href="/" class="btn btn-gold">Return to Chronexis</a>
  </div>
</section>
<?php require 'footer.php'; ?>