<?php
/**
 * 서비스 허브 — 경기광주하수구청소 의도별 안내
 */
include_once dirname(__FILE__) . '/_init.php';
include_once G5_PATH . '/_site.config.php';

$company = g5site_cfg('company_name', '원진하수구');
$main_kw = g5site_cfg('main_keyword', '경기광주하수구청소');
$phone = g5site_cfg('phone', '');
$tel = function_exists('g5site_tel_link') ? g5site_tel_link($phone) : ('tel:' . preg_replace('/[^0-9+]/', '', $phone));

$page_title = $main_kw . ' 서비스 | ' . $company;
$page_description = $company . '의 ' . $main_kw . ' 서비스 안내. 싱크대·변기·배수구·배관·상가 하수구청소를 전화로 상담합니다.';
$page_keywords = $main_kw . ',싱크대막힘,변기막힘,배수구청소,배관청소,상가하수구청소,원진하수구';
$page_canonical = (defined('G5_URL') ? G5_URL : '') . '/page/service.php';

$services = array(
    array('url' => '/page/service-sink.php', 'title' => '경기광주 싱크대막힘', 'desc' => '주방 느린 배수·기름때·악취'),
    array('url' => '/page/service-drain.php', 'title' => '경기광주 배수구청소', 'desc' => '욕실·베란다·세탁실 악취·역류'),
    array('url' => '/page/service-toilet.php', 'title' => '경기광주 변기막힘', 'desc' => '수위 상승·느린 배수·오수 배관'),
    array('url' => '/page/service-pipe.php', 'title' => '경기광주 배관청소', 'desc' => '반복 막힘·내부 오염 정리'),
    array('url' => '/page/service-commercial.php', 'title' => '경기광주 상가하수구청소', 'desc' => '음식점·카페·상가 주방·바닥 배수'),
);

$nearby_services = array(
    array('url' => '/page/yangpyeong-clean.php', 'title' => '양평구하수구청소', 'desc' => '양평·용문·지평 등 인근 하수구·배수 청소'),
    array('url' => '/page/yangpyeong-clog.php', 'title' => '양평구하수구막힘', 'desc' => '하수구·싱크대·변기 막힘·역류 전화 상담'),
);

$local_clog_services = array();
if (function_exists('g5site_public_profile')) {
    $profile = g5site_public_profile();
    $profile_areas = isset($profile['localAreas']) && is_array($profile['localAreas'])
        ? $profile['localAreas']
        : array();
    foreach ($profile_areas as $area) {
        if (empty($area['slug']) || empty($area['name'])) {
            continue;
        }
        if (strpos((string) $area['slug'], 'yangpyeong') === 0) {
            continue;
        }
        $clog_url = !empty($area['clog_url']) ? $area['clog_url'] : ('/page/local-' . $area['slug'] . '-clog.php');
        $clog_title = !empty($area['clog_label'])
            ? $area['clog_label']
            : (preg_replace('/[^0-9a-zA-Z가-힣]/u', '', explode('·', (string) $area['name'])[0]) . '하수구막힘');
        $local_clog_services[] = array(
            'url' => $clog_url,
            'title' => $clog_title,
            'desc' => $area['name'] . ' 하수구·싱크대·변기 막힘·역류 전화 상담',
        );
    }
}

g5_page_start($main_kw . ' 서비스');
?>
<div class="page-template page-service">
  <header class="page-hero reveal">
    <div class="page-inner">
      <p class="page-eyebrow">SERVICE HUB</p>
      <h1 class="page-title"><?php echo get_text($main_kw); ?> 서비스</h1>
      <p class="page-desc" data-speakable="true">
        <?php echo get_text($company); ?>는 경기광주에서 하수구·싱크대·변기·배수구·배관 청소를 전화 상담으로 안내합니다. 증상별 페이지에서 확인 순서와 FAQ를 먼저 살펴보세요.
      </p>
      <div class="page-cta__actions">
        <a href="<?php echo htmlspecialchars($tel, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">전화상담 <?php echo get_text($phone); ?></a>
        <a href="<?php echo G5_URL; ?>/#areas" class="btn btn-outline">권역별 안내</a>
      </div>
    </div>
  </header>

  <section class="page-section reveal">
    <div class="page-inner">
      <h2 class="page-section__title">증상별 안내</h2>
      <p class="page-section__desc">검색 의도에 맞는 페이지로 이동해 주세요. 모든 상담은 전화로 진행됩니다.</p>
      <div class="card-grid card-grid--auto">
        <?php foreach ($services as $item) { ?>
        <article class="base-card">
          <h3 class="base-card-title"><a href="<?php echo G5_URL . $item['url']; ?>"><?php echo get_text($item['title']); ?></a></h3>
          <p class="base-card-desc"><?php echo get_text($item['desc']); ?></p>
          <p><a href="<?php echo G5_URL . $item['url']; ?>" class="btn btn-outline">자세히 보기</a></p>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>

  <?php if ($local_clog_services) { ?>
  <section class="page-section reveal">
    <div class="page-inner">
      <h2 class="page-section__title">권역별 하수구막힘</h2>
      <p class="page-section__desc">경기광주 권역별 하수구막힘 키워드 페이지입니다. 증상과 위치를 전화로 알려주시면 확인 순서를 안내합니다.</p>
      <div class="card-grid card-grid--auto">
        <?php foreach ($local_clog_services as $item) { ?>
        <article class="base-card">
          <h3 class="base-card-title"><a href="<?php echo G5_URL . $item['url']; ?>"><?php echo get_text($item['title']); ?></a></h3>
          <p class="base-card-desc"><?php echo get_text($item['desc']); ?></p>
          <p><a href="<?php echo G5_URL . $item['url']; ?>" class="btn btn-outline">자세히 보기</a></p>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>

  <section class="page-section page-section--alt reveal">
    <div class="page-inner">
      <h2 class="page-section__title">인근 지역 키워드</h2>
      <p class="page-section__desc">경기광주와 인접한 양평구 검색 키워드도 별도 페이지로 안내합니다.</p>
      <div class="card-grid card-grid--auto">
        <?php foreach ($nearby_services as $item) { ?>
        <article class="base-card">
          <h3 class="base-card-title"><a href="<?php echo G5_URL . $item['url']; ?>"><?php echo get_text($item['title']); ?></a></h3>
          <p class="base-card-desc"><?php echo get_text($item['desc']); ?></p>
          <p><a href="<?php echo G5_URL . $item['url']; ?>" class="btn btn-outline">자세히 보기</a></p>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="page-section page-cta page-cta--dark reveal">
    <div class="page-inner page-cta__inner">
      <h2 class="page-cta__title"><?php echo get_text($main_kw); ?> 전화상담</h2>
      <p class="page-cta__desc">위치와 증상을 알려주시면 필요한 확인 항목을 바로 안내합니다.</p>
      <a href="<?php echo htmlspecialchars($tel, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary"><?php echo get_text($phone); ?></a>
    </div>
  </section>
</div>
<script type="application/ld+json">
<?php
echo json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => $page_title,
    'description' => $page_description,
    'url' => $page_canonical,
    'isPartOf' => array('@type' => 'WebSite', 'name' => $company),
), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
?>
</script>
<?php
g5_page_end();
