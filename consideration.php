<?php
$page_title       = 'Private Inquiry — Consideration | Chronexis';
$page_description = 'Submit a private inquiry to Chronexis. Each inquiry is read in full by Serena Kiker, without delegation. The process is unhurried — because what is being assessed, on both sides, is not urgency. It is fit.';
$page_canonical   = 'https://chronexis.com/consideration';
$page_og_image    = 'https://images.pexels.com/photos/20771838/pexels-photo-20771838.jpeg?auto=compress&cs=tinysrgb&h=650&w=940';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = htmlspecialchars(trim($_POST['name']    ?? ''));
  $email   = htmlspecialchars(trim($_POST['email']   ?? ''));
  $context = htmlspecialchars(trim($_POST['context'] ?? ''));
  $area    = htmlspecialchars(trim($_POST['area']    ?? ''));
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));

  if ($name && $email && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $message) {
    $success = true;
  }
}

require 'header.php';
?>

<!-- ── PAGE HERO — LIGHT ─────────────────────────────────────── -->
<section class="page-hero">
  <div class="page-hero-content">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Chronexis</a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <span class="breadcrumb-current" aria-current="page">Consideration</span>
    </nav>
    <p class="eyebrow" style="color:var(--gold);">Access</p>
    <h1>Consideration</h1>
    <p class="page-lead">Entrance follows discernment.<br>On both sides.</p>
    <div class="page-hero-bar"></div>
  </div>
</section>

<!-- ── CONSIDERATION INTRO ──────────────────────────────────── -->
<section class="section section--white">
  <div class="container">
    <div class="consideration-layout">

      <!-- Left: Intro text -->
      <div class="consideration-text reveal-on-scroll">
        <p class="eyebrow">Private Inquiry</p>
        <div class="divider"></div>
        <h2>Those who find themselves here<br>rarely do so by accident.</h2>

        <p>Something has shifted. A question has become impossible to ignore. A moment has arrived that ordinary counsel was not built to meet.</p>
        <p>Chronexis operates on a deliberately constrained scale. The depth of attention this work requires cannot survive unlimited access. Each engagement is considered individually and with care. For that reason, the number of people Serena works with at any given time remains deliberately, unapologetically small.</p>
        <p>Some have been pointed in this direction by those who know this work firsthand — a word offered quietly, at the right moment, by those who understood what was needed.</p>
        <p>Others arrive without introduction, guided by something less nameable — a persistent sense that what they have been looking for exists, and that this may be where it is found.</p>
        <p>Both paths are equally valid. What matters is not how you arrived, but whether, having arrived, something here recognises what you have been carrying.</p>

        <div class="consideration-promise">
          <div class="consideration-promise-line"></div>
          <p>Some inquiries lead to a conversation.<br>Some conversations lead to work together.<br>The process is unhurried — because what is being assessed, on both sides, is not urgency. It is fit.</p>
        </div>

        <!-- Process steps -->
        <div class="consideration-steps">
          <div class="consideration-step">
            <span class="consideration-step-num">I</span>
            <div>
              <h4>You write</h4>
              <p>A private inquiry, in your own words, at your own pace. No template required.</p>
            </div>
          </div>
          <div class="consideration-step">
            <span class="consideration-step-num">II</span>
            <div>
              <h4>Serena reads</h4>
              <p>Every inquiry is read personally. No intake team. No algorithm. One person.</p>
            </div>
          </div>
          <div class="consideration-step">
            <span class="consideration-step-num">III</span>
            <div>
              <h4>A response follows</h4>
              <p>If there is alignment, a conversation is proposed. Quietly, directly, without ceremony.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Form -->
      <div class="consideration-form-wrap reveal-on-scroll delay-2">
        <?php if ($success): ?>
        <div class="form-success-state">
          <span class="gold-line"></span>
          <h3>Your inquiry has been received.</h3>
          <p>It will be read in full. The process is unhurried. If there is a fit on both sides, you will hear back directly — from Serena Kiker.</p>
          <p style="margin-top:1.5rem;">No confirmation number. No automated reply. Simply a real response, when the time is right.</p>
        </div>
        <?php else: ?>
        <div class="form-header">
          <p class="eyebrow">Your Inquiry</p>
          <div class="divider"></div>
          <p class="form-header-note">Write as briefly or as fully as feels right. There is no required format.</p>
        </div>
        <form class="form-inquiry" method="POST" action="/consideration">
          <div class="form-row">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="name" required placeholder="As you wish to be addressed">
            </div>
            <div class="form-group">
              <label for="email">Private Email</label>
              <input type="email" id="email" name="email" required placeholder="Where a response may reach you">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="context">How did you arrive here?</label>
              <select id="context" name="context">
                <option value="">Please indicate</option>
                <option value="referred">By private referral</option>
                <option value="search">Through my own search</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="form-group">
              <label for="area">Area of primary interest</label>
              <select id="area" name="area">
                <option value="">Select a dimension</option>
                <option value="vitality">Vitality</option>
                <option value="relational">Relational</option>
                <option value="leadership">Leadership</option>
                <option value="residence">Residence</option>
                <option value="mentorship">Mentorship</option>
                <option value="undecided">I am not yet certain</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="message">What brings you here</label>
            <textarea id="message" name="message" required placeholder="You may write as briefly or as fully as feels right. There is no required format. What matters is that it is true." style="min-height:200px;"></textarea>
          </div>
          <div class="form-footer">
            <p class="form-note">This inquiry will be read in full by Serena Kiker, without delegation. No information shared here will be disclosed to any third party. Ever.</p>
            <button type="submit" class="btn btn-charcoal">Submit Privately</button>
          </div>
        </form>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<!-- ── DISCRETION BAND ───────────────────────────────────────── -->
<div class="discretion-band reveal-on-scroll">
  <div class="container">
    <div class="discretion-items">
      <div class="discretion-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        <span>Absolute confidentiality</span>
      </div>
      <div class="discretion-sep"></div>
      <div class="discretion-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <span>Read personally by Serena Kiker</span>
      </div>
      <div class="discretion-sep"></div>
      <div class="discretion-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        <span>No urgency. No pressure.</span>
      </div>
      <div class="discretion-sep"></div>
      <div class="discretion-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span>No data shared with third parties</span>
      </div>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>