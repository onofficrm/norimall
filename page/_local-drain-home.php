<?php
/**
 * 경기광주 권역별 하수구청소 랜딩 — 빌더 홈 렌더 + 권역 이름 주입
 *
 * 호출 전 설정:
 *   $local_dong_slug  (예: opo)
 *   $local_dong_name  (선택 — 없으면 복제 설정에서 조회)
 */
if (!isset($local_dong_slug)) {
    exit;
}

if (!defined('_GNUBOARD_')) {
    include_once dirname(__FILE__) . '/../common.php';
}

if (!defined('_GNUBOARD_')) {
    exit;
}

if (is_file(G5_PATH . '/_site.config.php')) {
    include_once G5_PATH . '/_site.config.php';
}

$local_dong_slug = preg_replace('/[^a-z0-9-]/', '', strtolower((string) $local_dong_slug));
$local_dong_name = isset($local_dong_name) ? trim(strip_tags((string) $local_dong_name)) : '';
$local_area_blurb = '';
$local_area_label = '';

if (function_exists('g5site_public_profile')) {
    $public_profile = g5site_public_profile();
    $profile_areas = isset($public_profile['localAreas']) && is_array($public_profile['localAreas'])
        ? $public_profile['localAreas']
        : array();
    foreach ($profile_areas as $profile_area) {
        if (isset($profile_area['slug'], $profile_area['name'])
            && (string) $profile_area['slug'] === $local_dong_slug) {
            $local_dong_name = trim(strip_tags((string) $profile_area['name']));
            if (!empty($profile_area['blurb'])) {
                $local_area_blurb = trim(strip_tags((string) $profile_area['blurb']));
            }
            if (!empty($profile_area['label'])) {
                $local_area_label = trim(strip_tags((string) $profile_area['label']));
            }
            break;
        }
    }
}

if ($local_dong_slug === '' || $local_dong_name === '') {
    http_response_code(404);
    exit('등록되지 않은 지역입니다.');
}

$project_id = function_exists('g5site_cfg') ? g5site_cfg('home_builder_bridge_id', 'gangdong-drain') : 'gangdong-drain';
$project_id = preg_replace('/[^a-z0-9_-]/i', '', (string) $project_id);
if ($project_id === '') {
    $project_id = 'gangdong-drain';
}

if (!is_file(G5_PLUGIN_PATH . '/onoff-builder-bridge/bootstrap.php')) {
    header('Location: /?dong=' . rawurlencode($local_dong_name));
    exit;
}

include_once G5_PLUGIN_PATH . '/onoff-builder-bridge/bootstrap.php';

if (!function_exists('onoff_builder_project_exists') || !onoff_builder_project_exists($project_id)) {
    header('Location: /?dong=' . rawurlencode($local_dong_name));
    exit;
}

$meta = function_exists('onoff_builder_get_import') ? onoff_builder_get_import($project_id) : null;
$entry = function_exists('onoff_builder_resolve_import_entry')
    ? onoff_builder_resolve_import_entry($project_id, $meta ? $meta : array())
    : 'index.html';
$index_file = function_exists('onoff_builder_resolve_import_index_file')
    ? onoff_builder_resolve_import_index_file($project_id, $entry)
    : '';

if ($index_file === '' || !is_file($index_file)) {
    header('Location: /?dong=' . rawurlencode($local_dong_name));
    exit;
}

$html = @file_get_contents($index_file);
if ($html === false || $html === '') {
    header('Location: /?dong=' . rawurlencode($local_dong_name));
    exit;
}

if (function_exists('onoff_builder_remove_base_tags')) {
    $html = onoff_builder_remove_base_tags($html);
}
if (function_exists('onoff_builder_rewrite_asset_paths')) {
    $html = onoff_builder_rewrite_asset_paths($html, $project_id, $entry);
}

$company = function_exists('g5site_cfg') ? g5site_cfg('company_name', '원진하수구') : '원진하수구';
$keyword_label = $local_area_label !== '' ? $local_area_label : ($local_dong_name . ' 하수구청소');
$page_title = $keyword_label . ' | ' . $company;
$page_desc = $local_area_blurb !== ''
    ? $local_area_blurb
    : ($local_dong_name . ' 하수구청소·싱크대·변기·배수구 막힘 전화 상담. 원진하수구가 경기광주 출동을 안내합니다.');
$canonical_path = isset($local_page_url) && $local_page_url !== ''
    ? (string) $local_page_url
    : '/page/local-' . $local_dong_slug . '.php';
$canonical = (defined('G5_URL') ? G5_URL : '') . $canonical_path;

/* 권역별 요약·FAQ (AEO) — 페이지마다 문장을 달리해 중복 콘텐츠를 줄입니다 */
$local_summary = $local_area_blurb !== ''
    ? $local_area_blurb
    : ($company . '는 ' . $local_dong_name . '에서 하수구·싱크대·변기 막힘과 배관 청소를 전화 상담으로 안내하는 하수구청소 업체입니다.');

$local_faqs = array(
    array(
        'q' => $local_dong_name . ' 하수구청소가 가능한가요?',
        'a' => $company . '는 ' . $local_dong_name . ' 및 경기광주 인근의 하수구청소·막힘·배수 상담이 가능합니다. 정확한 출동 여부는 위치와 시간에 따라 전화로 안내드립니다.',
    ),
    array(
        'q' => $local_dong_name . ' 하수구청소 비용은 얼마인가요?',
        'a' => '비용은 ' . $local_dong_name . ' 현장의 오염·막힘 정도, 배관 구조, 청소 범위에 따라 달라집니다. 전화로 증상을 알려주시면 가능한 범위에서 안내드립니다.',
    ),
    array(
        'q' => $local_dong_name . ' 싱크대·변기 막힘도 상담되나요?',
        'a' => '네. ' . $local_dong_name . ' 주방 싱크대, 화장실 변기, 배수구 악취·역류 등 다양한 배수 문제를 전화로 상담할 수 있습니다.',
    ),
    array(
        'q' => $local_dong_name . ' 밤·주말에도 전화 상담이 되나요?',
        'a' => '긴급 상황은 전화 상담 후 가능한 일정과 대응 여부를 안내드립니다. ' . $local_dong_name . ' 인근이면 출동 가능 여부를 함께 확인해 드립니다.',
    ),
);

if (function_exists('onoff_builder_inject_site_profile')) {
    $html = onoff_builder_inject_site_profile($html, $project_id, array(
        'activeArea' => $local_dong_name,
        'seoTitle' => $page_title,
        'seoDescription' => $page_desc,
        'mainKeyword' => $keyword_label,
        'secondaryKeywords' => array(
            $local_dong_name . ' 하수구막힘',
            $local_dong_name . ' 싱크대 막힘',
            $local_dong_name . ' 변기 막힘',
            $local_dong_name . ' 배수구 청소',
            '경기광주하수구청소',
        ),
        'canonical' => $canonical,
        'homeSummary' => $local_summary,
        'homeFaqs' => $local_faqs,
    ));
}

header('Content-Type: text/html; charset=utf-8');
echo $html;
exit;
