<?php 
header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
?>

<? foreach ($sitemap as $url) { ?>
  <url>
    <loc><?= 'https://frontendtools.net/v/exec?u='.$url['url'] ?></loc>
    <lastmod><?= strftime('%Y-%m-%d', strtotime($url['edition_date'])) ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.5</priority>
  </url>
<? } ?>

</urlset>