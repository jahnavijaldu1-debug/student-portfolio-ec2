<?php
declare(strict_types=1);
$pageTitle = 'Skills & Certifications';
require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/dynamodb.php';

$items = [];
$errorMessage = '';
try {
    $items = getPortfolioItems();
} catch (Throwable $e) {
    error_log('DynamoDB skills page error: ' . $e->getMessage());
    $errorMessage = 'Skills and certifications are temporarily unavailable. Check the DynamoDB table, AWS SDK, and EC2 IAM role.';
}

$skills = array_values(array_filter($items, static fn(array $item): bool => strtolower((string)($item['category'] ?? '')) === 'skill'));
$certifications = array_values(array_filter($items, static fn(array $item): bool => strtolower((string)($item['category'] ?? '')) === 'certification'));
?>
<section class="page-hero">
  <div class="container">
    <a class="back-link" href="index.php">← Back to Portfolio</a>
    <span class="eyebrow">What I know & what I've earned</span>
    <h1>Skills & <span class="accent">Certifications</span></h1>
    <p class="hero-copy centered">Portfolio items retrieved dynamically from Amazon DynamoDB using the AWS SDK for PHP.</p>
    <?php if ($errorMessage === ''): ?>
      <p class="status status-success">✓ Successfully queried Amazon DynamoDB</p>
    <?php else: ?>
      <p class="status status-error"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
  </div>
</section>
<section class="content-section">
  <div class="container">
    <?php if ($errorMessage !== ''): ?>
      <div class="notice"><h2>DynamoDB connection needs attention</h2><p><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p><p>Run <code>database/dynamodb-seed.json</code> items in the console, check the table name/region, and attach the EC2 IAM role described in the README.</p></div>
    <?php else: ?>
      <div class="section-head"><span class="eyebrow">Technology toolkit</span><h2>Technical <span class="accent">Skills</span></h2></div>
      <?php if ($skills): ?>
        <div class="cards-grid">
          <?php foreach ($skills as $item): ?>
            <article class="card">
              <div class="card-icon"><?= htmlspecialchars(strtoupper(substr((string)($item['name'] ?? 'S'), 0, 2)), ENT_QUOTES, 'UTF-8') ?></div>
              <h3><?= htmlspecialchars((string)($item['name'] ?? 'Skill'), ENT_QUOTES, 'UTF-8') ?></h3>
              <p><?= htmlspecialchars((string)($item['description'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
              <?php if (!empty($item['level'])): ?><span class="pill"><?= htmlspecialchars((string)$item['level'], ENT_QUOTES, 'UTF-8') ?></span><?php endif; ?>
            </article>
          <?php endforeach; ?>
        </div>
      <?php else: ?><p class="muted">No skill items found. Add category=Skill items to the DynamoDB table.</p><?php endif; ?>

      <div class="section-head section-gap"><span class="eyebrow">Credentials & learning</span><h2><span class="accent">Certifications</span></h2></div>
      <?php if ($certifications): ?>
        <div class="cards-grid">
          <?php foreach ($certifications as $item): ?>
            <article class="card">
              <div class="card-icon">✓</div>
              <h3><?= htmlspecialchars((string)($item['name'] ?? 'Certification'), ENT_QUOTES, 'UTF-8') ?></h3>
              <p><?= htmlspecialchars((string)($item['description'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
              <?php if (!empty($item['issuer'])): ?><p class="meta">Issuer: <?= htmlspecialchars((string)$item['issuer'], ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
              <?php if (!empty($item['issued_on'])): ?><p class="meta">Issued: <?= htmlspecialchars((string)$item['issued_on'], ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
              <?php if (!empty($item['certificate_url']) && filter_var($item['certificate_url'], FILTER_VALIDATE_URL)): ?><a class="text-link" href="<?= htmlspecialchars((string)$item['certificate_url'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">View certificate ↗</a><?php endif; ?>
            </article>
          <?php endforeach; ?>
        </div>
      <?php else: ?><p class="muted">No certification items found. Add category=Certification items to the DynamoDB table.</p><?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
