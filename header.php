<?php
// Header partial — Chronexis
$site_name = 'Chronexis';
$site_url  = 'https://chronexis.com';

$page_title       = $page_title       ?? 'Chronexis — Private Strategic Advisory';
$page_description = $page_description ?? 'Chronexis is a private strategic advisory practice offering holistic counsel across vitality, relational intelligence, leadership, residence and mentorship — with absolute discretion.';
$page_canonical   = $page_canonical   ?? $site_url . '/';
$page_og_image    = $page_og_image    ?? 'https://images.pexels.com/photos/6037566/pexels-photo-6037566.jpeg?auto=compress&cs=tinysrgb&h=650&w=940';

// Detect current page for active states
$current_uri = strtok($_SERVER['REQUEST_URI'], '?');
$current_uri = rtrim($current_uri, '/') ?: '/';

function nav_is_active(string $path, string $current): bool {
  if ($path === '/') return $current === '/';
  return str_starts_with($current, $path);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($page_canonical); ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($page_og_image); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($page_canonical); ?>">
  <meta property="og:site_name" content="Chronexis">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta name="twitter:image" content="<?php echo htmlspecialchars($page_og_image); ?>">

  <!-- Favicon -->
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90' fill='%23C9A96E'>◆</text></svg>">

  <!-- CSS -->
  <link rel="stylesheet" href="/styles.css">

  <!-- Schema.org -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Chronexis",
    "url": "<?php echo $site_url; ?>",
    "description": "Private strategic advisory practice — holistic counsel with absolute discretion.",
    "founder": {
      "@type": "Person",
      "name": "Serena Kiker"
    }
  }
  </script>
</head>
<body>

<?php
// Build nav data
$expertise_pages = [
  '/vitality'    => 'Vitality',
  '/relational'  => 'Relational',
  '/leadership'  => 'Leadership',
  '/residence'   => 'Residence',
  '/mentorship'  => 'Mentorship',
];
$practice_pages = [
  '/the-practice#mandate'    => 'Mandate',
  '/the-practice#foundation' => 'Foundation',
  '/the-practice#engagement' => 'Engagement',
];

$expertise_active = nav_is_active('/vitality', $current_uri)
  || nav_is_active('/relational', $current_uri)
  || nav_is_active('/leadership', $current_uri)
  || nav_is_active('/residence', $current_uri)
  || nav_is_active('/mentorship', $current_uri)
  || nav_is_active('/expertise', $current_uri);

$practice_active = nav_is_active('/the-practice', $current_uri);
?>

<nav class="site-nav" id="site-nav" role="navigation" aria-label="Main navigation">

  <!-- Logo -->
  <a href="/" class="nav-logo" aria-label="Chronexis — Home">Chron<span>e</span>xis</a>

  <!-- Desktop + Mobile links -->
  <ul class="nav-links" id="nav-links" role="menubar">

    <!-- The Practice (dropdown) -->
    <li class="nav-dropdown <?php echo $practice_active ? 'is-active' : ''; ?>" role="none">
      <button class="nav-dropdown-toggle"
              aria-haspopup="true"
              aria-expanded="false"
              aria-controls="dropdown-practice"
              type="button">
        <a href="/the-practice" tabindex="-1" class="<?php echo $practice_active ? 'nav-link-active' : ''; ?>">The Practice</a>
        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
          <path d="M2 3.5l3 3 3-3"/>
        </svg>
      </button>
      <div class="nav-dropdown-menu" id="dropdown-practice" role="menu">
        <a href="/the-practice#mandate"    role="menuitem">Mandate</a>
        <a href="/the-practice#foundation" role="menuitem">Foundation</a>
        <a href="/the-practice#engagement" role="menuitem">Engagement</a>
      </div>
    </li>

    <!-- Expertise (dropdown) -->
    <li class="nav-dropdown <?php echo $expertise_active ? 'is-active' : ''; ?>" role="none">
      <button class="nav-dropdown-toggle"
              aria-haspopup="true"
              aria-expanded="false"
              aria-controls="dropdown-expertise"
              type="button">
        <a href="/expertise" tabindex="-1" class="<?php echo $expertise_active ? 'nav-link-active' : ''; ?>">Expertise</a>
        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
          <path d="M2 3.5l3 3 3-3"/>
        </svg>
      </button>
      <div class="nav-dropdown-menu" id="dropdown-expertise" role="menu">
        <?php foreach ($expertise_pages as $href => $label): ?>
        <a href="<?php echo $href; ?>"
           role="menuitem"
           <?php echo nav_is_active($href, $current_uri) ? 'class="nav-dropdown-active"' : ''; ?>>
          <?php echo $label; ?>
        </a>
        <?php endforeach; ?>
      </div>
    </li>

    <!-- The Custodian -->
    <li role="none">
      <a href="/custodian"
         role="menuitem"
         class="<?php echo nav_is_active('/custodian', $current_uri) ? 'nav-link-active' : ''; ?>">
        The Custodian
      </a>
    </li>

    <!-- Private Inquiry (CTA) -->
    <li role="none">
      <a href="/consideration"
         class="nav-cta <?php echo nav_is_active('/consideration', $current_uri) ? 'nav-cta--active' : ''; ?>"
         role="menuitem">
        Private Inquiry
      </a>
    </li>

  </ul>

  <!-- Mobile toggle button -->
  <button class="nav-toggle" id="nav-toggle" aria-label="Open navigation menu" aria-expanded="false" aria-controls="nav-links" type="button">
    <span class="toggle-bar"></span>
    <span class="toggle-bar"></span>
    <span class="toggle-bar"></span>
  </button>

</nav>

<!-- Mobile overlay backdrop -->
<div class="nav-overlay" id="nav-overlay" aria-hidden="true"></div>