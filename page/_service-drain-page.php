<?php
/**
 * 서비스 의도 페이지 공통 템플릿 (경기광주 / 원진하수구)
 *
 * 호출 전 필수: $service_slug, $service_name, $service_keyword,
 * $service_description, $service_intro
 * 선택: $service_signs, $service_checks, $service_faqs
 */
if (!isset($service_slug, $service_name, $service_keyword, $service_description, $service_intro)) {
    exit;
}

include_once __DIR__ . '/_init.php';
include_once G5_PATH . '/_site.config.php';

$service_signs = isset($service_signs) && is_array($service_signs) ? $service_signs : array();
$service_checks = isset($service_checks) && is_array($service_checks) ? $service_checks : array();
$service_faqs = isset($service_faqs) && is_array($service_faqs) ? $service_faqs : array();

$region = function_exists('g5site_cfg') ? g5site_cfg('site_name', '원진하수구') : '원진하수구';
$company = function_exists('g5site_cfg') ? g5site_cfg('company_name', '원진하수구') : '원진하수구';
$main_kw = function_exists('g5site_cfg') ? g5site_cfg('main_keyword', '경기광주하수구청소') : '경기광주하수구청소';
$region_name = '경기광주';
if (function_exists('g5site_public_profile')) {
    $profile = g5site_public_profile();
    if (!empty($profile['regionName'])) {
        $region_name = (string) $profile['regionName'];
    }
}

$service_phone = g5site_cfg('phone', '');
$service_tel = function_exists('g5site_tel_link') ? g5site_tel_link($service_phone) : ('tel:' . preg_replace('/[^0-9+]/', '', $service_phone));
$page_title = $service_keyword . ' | ' . $company;
$page_description = $service_description;
$service_area_label = isset($service_area_served) && trim((string) $service_area_served) !== ''
    ? trim((string) $service_area_served)
    : $region_name;
$page_keywords = $service_keyword . ',' . $main_kw . ',원진하수구,' . $service_area_label . ' 하수구청소';
if (isset($service_canonical_path) && trim((string) $service_canonical_path) !== '') {
    $path = trim((string) $service_canonical_path);
    if ($path[0] !== '/') {
        $path = '/' . ltrim($path, '/');
    }
    $canonical_url = (defined('G5_URL') ? G5_URL : '') . $path;
} else {
    $canonical_url = (defined('G5_URL') ? G5_URL : '') . '/page/service-' . preg_replace('/[^a-z0-9-]/', '', $service_slug) . '.php';
}
$page_canonical = $canonical_url;

$local_areas = array();
if (function_exists('g5site_public_profile')) {
    $profile = g5site_public_profile();
    if (!empty($profile['localAreas']) && is_array($profile['localAreas'])) {
        $local_areas = $profile['localAreas'];
    }
}

if (!isset($related_services) || !is_array($related_services) || !$related_services) {
    $related_services = array(
        array('slug' => 'sink', 'name' => '싱크대·주방 배관 청소', 'url' => '/page/service-sink.php'),
        array('slug' => 'drain', 'name' => '욕실·배수구 청소', 'url' => '/page/service-drain.php'),
        array('slug' => 'toilet', 'name' => '변기 막힘 점검', 'url' => '/page/service-toilet.php'),
        array('slug' => 'commercial', 'name' => '상가·음식점 하수구청소', 'url' => '/page/service-commercial.php'),
        array('slug' => 'pipe', 'name' => '배관 청소', 'url' => '/page/service-pipe.php'),
        array('slug' => 'yangpyeong-clean', 'name' => '양평구하수구청소', 'url' => '/page/yangpyeong-clean.php'),
        array('slug' => 'yangpyeong-clog', 'name' => '양평구하수구막힘', 'url' => '/page/yangpyeong-clog.php'),
    );
}

g5_page_start($service_name);
?>
<div class="page-template page-service">
  <header class="page-hero reveal">
    <div class="page-inner">
      <nav aria-label="현재 위치" class="page-breadcrumb" style="margin-bottom:1rem;font-size:0.875rem;opacity:.8;">
        <a href="<?php echo G5_URL; ?>/">홈</a> /
        <a href="<?php echo G5_URL; ?>/page/service.php"><?php echo get_text($main_kw); ?></a> /
        <span aria-current="page"><?php echo get_text($service_name); ?></span>
      </nav>
      <p class="page-eyebrow">WONJIN · <?php echo get_text($service_area_label); ?></p>
      <h1 class="page-title"><?php echo get_text($service_keyword); ?></h1>
      <p class="page-desc" data-speakable="true"><?php echo get_text($service_description); ?></p>
      <div class="page-cta__actions">
        <a href="<?php echo htmlspecialchars($service_tel, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">전화상담 <?php echo get_text($service_phone); ?></a>
        <a href="<?php echo G5_URL; ?>/#areas" class="btn btn-outline"><?php echo get_text($region_name); ?>·인근 권역</a>
      </div>
    </div>
  </header>

  <main>
    <section class="page-section reveal">
      <div class="page-inner page-inner--narrow">
        <h2 class="page-section__title"><?php echo get_text($service_name); ?>, 원인 확인이 먼저입니다</h2>
        <p class="page-section__desc"><?php echo get_text($service_intro); ?></p>

        <?php if ($service_signs) { ?>
        <h3 class="page-section__subtitle">이런 증상을 확인하세요</h3>
        <ul class="page-list">
          <?php foreach ($service_signs as $sign) { ?>
          <li><?php echo get_text($sign); ?></li>
          <?php } ?>
        </ul>
        <?php } ?>
      </div>
    </section>

    <section class="page-section page-section--alt reveal">
      <div class="page-inner page-inner--narrow">
        <h2 class="page-section__title"><?php echo get_text($company); ?> 확인 순서</h2>
        <?php if ($service_checks) { ?>
        <ol class="page-list">
          <?php foreach ($service_checks as $check) { ?>
          <li><?php echo get_text($check); ?></li>
          <?php } ?>
        </ol>
        <?php } ?>
        <p class="page-section__desc">배관 구조와 막힘 정도에 따라 작업 방식과 비용이 달라질 수 있습니다. 전화상담 후 현장에서 정확한 범위를 확인합니다.</p>
      </div>
    </section>

    <?php if ($service_faqs) { ?>
    <section class="page-section reveal" id="service-faq">
      <div class="page-inner page-inner--narrow">
        <h2 class="page-section__title"><?php echo get_text($service_name); ?> 자주 묻는 질문</h2>
        <div class="faq-list">
          <?php foreach ($service_faqs as $faq) { ?>
          <article class="faq-item" style="margin-bottom:1.25rem;padding:1.25rem;border:1px solid #e2e8f0;border-radius:1rem;background:#fff;">
            <h3 style="font-size:1.05rem;margin:0 0 .5rem;">Q. <?php echo get_text($faq['question']); ?></h3>
            <p style="margin:0;color:#475569;">A. <?php echo get_text($faq['answer']); ?></p>
          </article>
          <?php } ?>
        </div>
      </div>
    </section>
    <?php } ?>

    <?php if ($local_areas) { ?>
    <section class="page-section page-section--alt reveal">
      <div class="page-inner">
        <h2 class="page-section__title"><?php echo get_text($region_name); ?> 권역별 <?php echo get_text($service_name); ?></h2>
        <p class="page-section__desc">우리 동네 페이지에서 지역 키워드와 함께 전화상담 안내를 확인하세요.</p>
        <ul class="page-list" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:.75rem;list-style:none;padding:0;">
          <?php foreach ($local_areas as $area) {
              if (empty($area['name']) || empty($area['slug'])) {
                  continue;
              }
              if (strpos((string) $area['slug'], 'yangpyeong') === 0) {
                  continue;
              }
              $href = !empty($area['url']) ? $area['url'] : ('/page/local-' . $area['slug'] . '.php');
              $label = !empty($area['label']) ? $area['label'] : ($area['name'] . ' 하수구청소');
              $clog_href = !empty($area['clog_url']) ? $area['clog_url'] : ('/page/local-' . $area['slug'] . '-clog.php');
              $clog_label = !empty($area['clog_label']) ? $area['clog_label'] : (preg_replace('/[^0-9a-zA-Z가-힣]/u', '', explode('·', (string) $area['name'])[0]) . '하수구막힘');
              ?>
          <li>
            <div style="display:flex;flex-direction:column;gap:.45rem;padding:.85rem 1rem;border:1px solid #e2e8f0;border-radius:.85rem;background:#fff;">
              <a href="<?php echo htmlspecialchars($href, ENT_QUOTES, 'UTF-8'); ?>" style="font-weight:700;text-decoration:none;color:#0f172a;">
                <?php echo get_text($label); ?>
              </a>
              <a href="<?php echo htmlspecialchars($clog_href, ENT_QUOTES, 'UTF-8'); ?>" style="font-size:.875rem;font-weight:600;text-decoration:none;color:#ea580c;">
                <?php echo get_text($clog_label); ?> →
              </a>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </section>
    <?php } ?>

    <section class="page-section reveal">
      <div class="page-inner">
        <h2 class="page-section__title">관련 서비스</h2>
        <ul class="page-list" style="display:flex;flex-wrap:wrap;gap:.6rem;list-style:none;padding:0;">
          <?php foreach ($related_services as $rel) {
              if ($rel['slug'] === $service_slug) {
                  continue;
              }
              ?>
          <li>
            <a href="<?php echo G5_URL . $rel['url']; ?>" class="btn btn-outline" style="display:inline-block;"><?php echo get_text($rel['name']); ?></a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </section>

    <section class="page-section page-cta page-cta--dark reveal">
      <div class="page-inner page-cta__inner">
        <h2 class="page-cta__title"><?php echo get_text($service_keyword); ?> 전화상담</h2>
        <p class="page-cta__desc">현재 증상과 <?php echo get_text($service_area_label); ?> 내 위치를 알려주시면 확인해야 할 항목을 안내합니다.</p>
        <a href="<?php echo htmlspecialchars($service_tel, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">
          <?php echo get_text($service_phone); ?>
        </a>
      </div>
    </section>
  </main>
</div>

<script type="application/ld+json">
<?php
$service_schema = array(
    '@context' => 'https://schema.org',
    '@graph' => array(
        array(
            '@type' => 'Service',
            'name' => $service_keyword,
            'serviceType' => $service_name,
            'description' => $service_description,
            'areaServed' => array('@type' => 'Place', 'name' => $service_area_label),
            'provider' => array(
                '@type' => array('LocalBusiness', 'PlumbingService'),
                'name' => $company,
                'telephone' => $service_phone,
            ),
            'url' => $canonical_url,
        ),
        array(
            '@type' => 'BreadcrumbList',
            'itemListElement' => array(
                array('@type' => 'ListItem', 'position' => 1, 'name' => '홈', 'item' => (defined('G5_URL') ? G5_URL : '') . '/'),
                array('@type' => 'ListItem', 'position' => 2, 'name' => $main_kw, 'item' => (defined('G5_URL') ? G5_URL : '') . '/page/service.php'),
                array('@type' => 'ListItem', 'position' => 3, 'name' => $service_keyword, 'item' => $canonical_url),
            ),
        ),
    ),
);
if ($service_faqs) {
    $entities = array();
    foreach ($service_faqs as $faq) {
        $entities[] = array(
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => array('@type' => 'Answer', 'text' => $faq['answer']),
        );
    }
    $service_schema['@graph'][] = array('@type' => 'FAQPage', 'mainEntity' => $entities);
}
echo json_encode($service_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
?>
</script>
<?php
g5_page_end();
