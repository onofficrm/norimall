<?php
/**
 * 지역 SEO 사이트 복제 템플릿
 *
 * 사용법:
 * 1. 이 파일을 `_site.clone.config.php` 로 복사
 * 2. [사이트마다 변경] 블록만 지역·키워드에 맞게 수정
 * 3. [공통 유지] 블록의 전화번호는 전 사이트 동일하게 유지
 *
 * React 재빌드 없이 홈 CTA·SEO 메타·지역 목록에 반영됩니다.
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

return array(
    /* =========================================================
     * [공통 유지] — 복사 사이트 전부 동일
     * ========================================================= */
    'phone' => '010-4265-2634',
    'ceo_name' => '',
    'business_no' => '',
    'email' => '',
    'builder_project_id' => 'gangdong-drain',

    /* =========================================================
     * [사이트마다 변경] — 원진하수구 · 경기광주 예시
     * ========================================================= */
    'region_name' => '경기광주',
    'region_short' => '광주',
    'region_initial' => '원',
    'company_name' => '원진하수구',
    'address' => '',

    'site_name' => '원진하수구 | 경기광주하수구청소',
    'site_desc' => '경기광주 하수구청소·막힘·싱크대·변기 배수 문제 전화 상담',
    'seo_title' => '경기광주하수구청소 | 원진하수구',
    'seo_description' => '원진하수구는 경기광주하수구청소 전문. 오포·초월·곤지암 등 전 지역 전화 상담.',
    'main_keyword' => '경기광주하수구청소',
    'sub_keywords' => array(
        '경기광주 하수구막힘',
        '오포 하수구청소',
        '초월 하수구청소',
        '곤지암 하수구청소',
    ),
    'footer_desc' => '원진하수구 — 경기광주 하수구청소 전화 상담',

    'local_areas' => array(
        array('slug' => 'opo', 'name' => '오포', 'label' => '오포 하수구청소', 'url' => '/page/local-opo.php', 'blurb' => '오포 일대 아파트·상가 하수구청소 전화 상담'),
        array('slug' => 'chowol', 'name' => '초월', 'label' => '초월 하수구청소', 'url' => '/page/local-chowol.php', 'blurb' => '초월읍 주거·상가 배수 문제 안내'),
        array('slug' => 'gonjiam', 'name' => '곤지암', 'label' => '곤지암 하수구청소', 'url' => '/page/local-gonjiam.php', 'blurb' => '곤지암읍 주방·하수구 막힘 상담'),
    ),
    'area_spots' => array(
        '광주역 인근', '초월역 인근', '곤지암역 인근', '오포 고산',
    ),

    'reviews' => array(
        array(
            'area' => '오포',
            'title' => '싱크대 배수 청소 후 정상',
            'body' => '전화로 증상만 말씀드려도 작업 방향을 바로 안내해 주셨어요.',
            'rating' => 5,
        ),
        array(
            'area' => '초월',
            'title' => '욕실 악취 해결',
            'body' => '원인을 설명해 주시고 필요한 청소만 진행해 주셨습니다.',
            'rating' => 5,
        ),
    ),
);
